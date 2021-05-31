<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\Finance;
use App\Models\Agriculture;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use App\Models\email;
use App\Models\AdminMessage;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        try {
            $agriculture = Agriculture::where('status', 'published')->orderBy('created_at', 'desc')->simplePaginate(3);
            $education = Education::where('status', 'published')->orderBy('created_at', 'desc')->simplePaginate(3);
            $finance = Finance::where('status', 'published')->orderBy('created_at', 'desc')->simplePaginate(3);
            return view::make('index')->with([
                'agriculture' => $agriculture,
                'education' => $education,
                'finance' => $finance
            ]);
        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->back()->to('index');
        }
    }
    // Get publication on Education
    public function educationPubliction(Request $request)
    {
        try {
            $educationPublication = Education::where('status', 'published')->orderBy('created_at', 'asc')->simplePaginate(2);
            return view::make('education')->with([
                'educationPublication' => $educationPublication
            ]);
        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->back()->to('/');
        }
    }
    // Get publication on Education
    public function agriculturePubliction(Request $request)
    {
        try {
            $agriculturePublication = Agriculture::where('status', 'published')->orderBy('created_at', 'asc')->simplePaginate(2);
            return view::make('agriculture')->with([
                'agriculturePublication' => $agriculturePublication
            ]);
        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->back()->to('/');
        }
    }
    // Get publication on Education
    public function financePubliction(Request $request)
    {
        try {
            $financePublication = Finance::where('status', 'published')->orderBy('created_at', 'asc')->simplePaginate(2);
            return view::make('finance')->with([
                'financePublication' => $financePublication
            ]);
        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->back()->to('/');
        }
    }

    public function readEducation(Request $request, $id)
    {
        try {
            $toRead = Education::where('id', $id)->first();
            if ($toRead) {
                return view::make('read-education')->with([
                    'toRead' => $toRead
                ]);
            }
        } catch (\Exception $ex) {
        }
    }

    public function readAgriculture(Request $request, $id)
    {
        try {
            $toRead = Agriculture::where('id', $id)->first();
            if ($toRead) {
                return view::make('read-agriculture')->with([
                    'toRead' => $toRead
                ]);
            }
        } catch (\Exception $ex) {
        }
    }

    public function readFinance(Request $request, $id)
    {
        try {
            $toRead = Finance::where('id', $id)->first();
            if ($toRead) {
                return view::make('read-finance')->with([
                    'toRead' => $toRead
                ]);
            }
        } catch (\Exception $ex) {
        }
    }
    // get email from client
    public function clientEmail(Request $request)
    {
        try {
            $rules = [
                'email' => 'required|email',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            } else {
                $email = $request->email;
                // create data
                $createEmail = email::updateOrCreate([
                    'email' => $email,
                ]);
                if ($createEmail) {
                    $notification = array(
                        'message' => 'Thanks For Suscribing to our news letter',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                } else {
                    $notification = array(
                        'message' => 'Sorry an Error Occured While Susbcribing, please wait while we fix this',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
            }
        } catch (\Exception $ex) {
            $notification = array(
                'message' => 'Internal Error Occured',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }
    // get message from client 
    public function clientMessage(Request $request)
    {
        try {
            $rules = [
                'name' => 'required',
                'message' => 'required|max:20000',
                'email' => 'required|email',
                'phone' => 'required'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            } else {
                $message = $request->message;
                $email = $request->email;
                $phone = $request->phone;
                $name = $request->name;
                $sendMessage = AdminMessage::updateOrCreate([
                    'details' => $message,
                    'email' => $email,
                    'phone' => $phone,
                    'from_who' => $name
                ]);
                if ($sendMessage) {
                    $notification = array(
                        'message' => 'Thanks, Message Sent successfully',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                } else {
                    $notification = array(
                        'message' => 'Can not send this message at this time, please try again latter',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
            }
        } catch (\Exception $ex) {
            dd($ex);
            $notification = array(
                'message' => 'Internal Error Occured',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
