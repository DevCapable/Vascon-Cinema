<?php

namespace Modules\User\Http\Controllers;

use Nwidart\Modules\Routing\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\adminLog;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Models\AdminMessage;
use App\Models\Education;
use App\Models\Finance;
use App\Models\Agriculture;
use Modules\User\Entities\User;

use function Symfony\Component\VarDumper\Dumper\esc;

class AdminController extends Controller
{
    //
    /**
     * redirect to admin home
     */
    public function adminHome(Request $request)
    {
        $rules = ([
            'username' => 'required|',
            'password' => 'required'
        ]);
        $validator = validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            try {
                $username = $request->username;
                $password = $request->password;
                $adminName = user::where('adminName', $username)->first();
                if ($adminName) {
                    $hashpassword = $adminName->password;
                    // check validity of the password
                    $passwordCheck = Hash::check($password, $hashpassword);
                    if ($passwordCheck) {
                        $session = Session::put('admin', $adminName->adminName);
                        return view::make('User::adminHome')->with([
                            'session' => $session,
                            'adminName' => $adminName,
                        ]);
                    } else {
                        $error = Session::flash('error', 'Invalid login credentials.');
                        return redirect()->back()->withInput()->with($error);
                    }
                } else {
                    $error = Session::flash('error', 'Invalid login credentials.');
                    return redirect()->back()->withInput()->with($error);
                }
            } catch (\Exception $ex) {

                return redirect()->back('/');
            }
        }
    }

    public function manageEducation(Request $request)
    {
        $loggedInAdmin = $request->Session()->get('admin');
        $adminName = adminLog::where('adminName', $loggedInAdmin)->first();

        if ($adminName) {
            try {
                $educations = Education::where('status', '!=', '')->orderBy('id', 'asc')->paginate(4);;
                $unreadMessage = AdminMessage::where('status', 'unread')->count();
                $AdminInboxs = AdminMessage::where('status', 'unread')->orderBy('id', 'asc')->paginate(4);
                return view::make('admin.manageEducation')->with([
                    'adminName' => $adminName,
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'educations' => $educations
                ]);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Internal Error',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        }
    }
    public function manageAgriculture(Request $request)
    {
        $loggedInAdmin = $request->Session()->get('admin');
        $adminName = adminLog::where('adminName', $loggedInAdmin)->first();
        //dd($adminName);
        if ($adminName) {
            try {
                $agricultures = Agriculture::where('status', '!=', '')->orderBy('id', 'asc')->paginate(4);;
                //dd($agricultures);
                $unreadMessage = AdminMessage::where('status', 'unread')->count();
                $AdminInboxs = AdminMessage::where('status', 'unread')->orderBy('id', 'asc')->paginate(4);
                return view::make('admin.manageAgriculture')->with([
                    'adminName' => $adminName,
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'agricultures' => $agricultures
                ]);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Internal Error',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function manageFinance(Request $request)
    {
        $loggedInAdmin = $request->Session()->get('admin');
        $adminName = adminLog::where('adminName', $loggedInAdmin)->first();

        if ($adminName) {
            try {
                $finances = Finance::where('status', '!=', '')->orderBy('id', 'asc')->paginate(4);;
                $unreadMessage = AdminMessage::where('status', 'unread')->count();
                $AdminInboxs = AdminMessage::where('status', 'unread')->orderBy('id', 'asc')->paginate(4);
                return view::make('admin.manageFinance')->with([
                    'adminName' => $adminName,
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'finances' => $finances
                ]);
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Internal Error',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function createEducation(Request $request)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $adminName = adminLog::where('adminName', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $rules = [
                    'title' => 'required',
                    'content' => 'required|max:1000|min:15',
                    'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ];
                $Validator = Validator::make($request->all(), $rules);
                //DD($Validator);
                if ($Validator) {

                    $title = $request->title;
                    $content = $request->content;
                    // $picture= $request('image');
                    $picture = time() . '_' . $request->image->getClientOriginalName();
                    // dd($picture);
                    $request->image->move(public_path('images3'), $picture);
                    //DD($picture);
                    $createEducation = Education::create([
                        'adminName' => $adminName->adminName,
                        'title' => $title,
                        'content' => $content,
                        'picture' => 'images3/' . $picture,
                    ]);
                    if ($createEducation) {
                        $notification = array(
                            'message' => 'Created successfully!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'message' => 'can not create this Publication',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->with($notification);
                    }
                } else {
                    return redirect()->back()->to('/');
                }
            } catch (\Exception $ex) {
                dd($ex);
                $notification = array(
                    'message' => 'Internal Error',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Access not granted, Youi have to logg in first',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function createAgriculture(Request $request)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $adminName = adminLog::where('adminName', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $rules = [
                    'title' => 'required',
                    'content' => 'required|max:1000|min:15',
                    'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ];
                $Validator = Validator::make($request->all(), $rules);
                //DD($Validator);
                if ($Validator) {

                    $title = $request->title;
                    $content = $request->content;
                    // $picture= $request('image');
                    $picture = time() . '_' . $request->image->getClientOriginalName();
                    // dd($picture);
                    $request->image->move(public_path('images3'), $picture);
                    //DD($picture);
                    $createEducation = Agriculture::create([
                        'adminName' => $adminName->adminName,
                        'title' => $title,
                        'content' => $content,
                        'picture' => 'images3/' . $picture,
                    ]);
                    if ($createEducation) {
                        $notification = array(
                            'message' => 'Created successfully!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'message' => 'can not create this Publication',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->with($notification);
                    }
                } else {
                    return redirect()->back()->to('/');
                }
            } catch (\Exception $ex) {
               
                $notification = array(
                    'message' => 'Internal Error',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Access not granted, Youi have to logg in first',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function createFinance(Request $request)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $adminName = adminLog::where('adminName', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $rules = [
                    'title' => 'required',
                    'content' => 'required|max:1000|min:15',
                    'image' => 'required|file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ];
                $Validator = Validator::make($request->all(), $rules);
                //DD($Validator);
                if ($Validator) {

                    $title = $request->title;
                    $content = $request->content;
                    // $picture= $request('image');
                    $picture = time() . '_' . $request->image->getClientOriginalName();
                    // dd($picture);
                    $request->image->move(public_path('images3'), $picture);
                    //DD($picture);
                    $createEducation = Finance::create([
                        'adminName' => $adminName->adminName,
                        'title' => $title,
                        'content' => $content,
                        'picture' => 'images3/' . $picture,
                    ]);
                    if ($createEducation) {
                        $notification = array(
                            'message' => 'Created successfully!',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'message' => 'can not create this Publication',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->with($notification);
                    }
                } else {
                    return redirect()->back()->to('/');
                }
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Internal Error',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Access not granted, Youi have to logg in first',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function actionOnEducation(Request $request, $id)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $adminName = adminLog::where('adminName', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $find = Education::where('id', $id)->first();
                if ($find->status === 'unpublished') {
                    $publishOrUnpublish = Education::where('id', $id)->update([
                        'status' => 'published'
                    ]);
                    if ($publishOrUnpublish) {
                        $notification = array(
                            'message' => 'Content Published Successfully',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'message' => 'Error while trying to Unublished this content',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    }
                } else {

                    $publishOrUnpublish = Education::where('id', $id)->update([
                        'status' => 'unpublished'
                    ]);
                    if ($publishOrUnpublish) {
                        $notification = array(
                            'message' => 'Content Unublished Successfully',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'message' => 'Error while trying to Unublished this content',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    }
                }
            } catch (\Exception $ex) {
            }
        }
    }
    public function actionOnAgriculture(Request $request, $id)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $adminName = adminLog::where('adminName', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $find = Agriculture::where('id', $id)->first();
                if ($find->status === 'unpublished') {
                    $publishOrUnpublish = Agriculture::where('id', $id)->update([
                        'status' => 'published'
                    ]);
                    if ($publishOrUnpublish) {
                        $notification = array(
                            'message' => 'Content Published Successfully',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'message' => 'Error while trying to Unublished this content',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    }
                } else {

                    $publishOrUnpublish = Agriculture::where('id', $id)->update([
                        'status' => 'unpublished'
                    ]);
                    if ($publishOrUnpublish) {
                        $notification = array(
                            'message' => 'Content Unublished Successfully',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'message' => 'Error while trying to Unublished this content',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    }
                }
            } catch (\Exception $ex) {
            }
        }
    }

    public function actionOnFinance(Request $request, $id)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $adminName = adminLog::where('adminName', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $find = Finance::where('id', $id)->first();
                if ($find->status === 'unpublished') {
                    $publishOrUnpublish = Finance::where('id', $id)->update([
                        'status' => 'published'
                    ]);
                    if ($publishOrUnpublish) {
                        $notification = array(
                            'message' => 'Content Published Successfully',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'message' => 'Error while trying to Unublished this content',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    }
                } else {

                    $publishOrUnpublish = Finance::where('id', $id)->update([
                        'status' => 'unpublished'
                    ]);
                    if ($publishOrUnpublish) {
                        $notification = array(
                            'message' => 'Content Unublished Successfully',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'message' => 'Error while trying to Unublished this content',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    }
                }
            } catch (\Exception $ex) {
            }
        }
    }

    public function editEducation(Request $request, $id)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $adminName = adminLog::where('adminName', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $education = Education::where('id', $id)->first();
                //dd($education);
                $unreadMessage = AdminMessage::where('status', 'unread')->count();
                $AdminInboxs = AdminMessage::where('status', 'unread')->orderBy('id', 'asc')->paginate(4);
                return view::make('admin.editEducation')->with([
                    'education' => $education,
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'adminName' => $adminName
                ]);
            } catch (\Exception $ex) {

                $notification = array(
                    'message' => 'Error while trying to Unublished this content',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function updateEducation(Request $request)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $adminName = AdminLog::where('adminName', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $rules = [
                    'title' => 'required',
                    'content' => 'required',
                    'id' => 'required'

                ];
                $Validator = Validator::make($request->all(), $rules);
                if ($Validator) {
                    // collate the date here
                    $title = $request->title;
                    $content = $request->content;
                    $id = $request->id;
                    // now create
                    $update = Education::where('id', $id)->update([
                        'title' => $title,
                        'content' => $content
                    ]);
                    if ($update) {
                        $notification = array(
                            'message' => 'Updated Successfully',
                            'alert-type' => 'success'
                        );
                    } else {
                        $notification = array(
                            'message' => 'Can not Update Record please try again',
                            'alert-type' => 'error'
                        );
                    }
                    return redirect()->back()->with($notification);
                } else {
                    return redirect()->back()->withInput()->withErrors($Validator);
                }
            } catch (\EXception $ex) {
                $notification = array(
                    'message' => 'Internal Error',
                    'alert-type' => 'danger'
                );
                return abort('404');
            }
        } else {
            $notification = array(
                'message' => 'Access Denied, make sure you sign in',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function changeEducationImage(Request $request)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $adminName = adminLog::where('adminName', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $request->validate([
                    'image' => 'required|file|image|mimes:jpeg,jpg,svg,png,gif|max:2035',
                    'id' => 'required'
                ]);
                if ($request->image == "") {
                    $notification = array(
                        'message' => 'Please Chose an Image',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                } else {
                    // collate the data here
                    $picture = time() . '_' . $request->image->getClientOriginalName();
                    $request->image->move(public_path('images3'), $picture);
                    $id = $request->id;
                    $find = Education::where('id', $id)->first();
                    // update
                    $updatePicture = Education::where('id', $id)->update([
                        'picture' => 'images3/' . $picture
                    ]);
                    if (!empty($find->picture)) {
                        unlink($find->picture);
                    } else {
                        // update
                        $updatePicture = Education::where('id', $id)->update([
                            'picture' => 'images3/' . $picture
                        ]);
                        $notification = array(
                            'message' => 'Picture Changed Successfully',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    }
                    if ($updatePicture) {
                        $notification = array(
                            'message' => 'Picture Changed Successfully',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'message' => 'Error Occured while changing the image',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    }
                }
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Picture Changed Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function deleteEducation(Request $request, $id)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $adminName = adminLog::where('adminName', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $toDelete = Education::where('id', $id)->first();
                if (!empty($toDelete->picture)) {
                    unlink($toDelete->picture);
                } else {
                    Education::where('id', $id)->delete();
                    $notification = array(
                        'message' => 'Publication Deleted Successfully',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }
                Education::where('id', $id)->delete();
                $notification = array(
                    'message' => 'Publication Deleted Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
            }
        }
    }

    public function editAgriculture(Request $request, $id)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $adminName = adminLog::where('adminName', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $agriculture = Agriculture::where('id', $id)->first();
                $unreadMessage = AdminMessage::where('status', 'unread')->count();
                $AdminInboxs = AdminMessage::where('status', 'unread')->orderBy('id', 'asc')->paginate(4);
                return view::make('admin.editAgriculture')->with([
                    'agriculture' => $agriculture,
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'adminName' => $adminName
                ]);
            } catch (\Exception $ex) {

                $notification = array(
                    'message' => 'Error while trying to Unublished this content',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function updateAgriculture(Request $request)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $adminName = AdminLog::where('adminName', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $rules = [
                    'title' => 'required',
                    'content' => 'required',
                    'id' => 'required'

                ];
                $Validator = Validator::make($request->all(), $rules);
                if ($Validator) {
                    // collate the date here
                    $title = $request->title;
                    $content = $request->content;
                    $id = $request->id;
                    // now create
                    $update = Agriculture::where('id', $id)->update([
                        'title' => $title,
                        'content' => $content
                    ]);
                    if ($update) {
                        $notification = array(
                            'message' => 'Updated Successfully',
                            'alert-type' => 'success'
                        );
                    } else {
                        $notification = array(
                            'message' => 'Can not Update Record please try again',
                            'alert-type' => 'error'
                        );
                    }
                    return redirect()->back()->with($notification);
                } else {
                    return redirect()->back()->withInput()->withErrors($Validator);
                }
            } catch (\EXception $ex) {
                $notification = array(
                    'message' => 'Internal Error',
                    'alert-type' => 'danger'
                );
                return abort('404');
            }
        } else {
            $notification = array(
                'message' => 'Access Denied, make sure you sign in',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function changeAgricultureImage(Request $request)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $adminName = adminLog::where('adminName', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $request->validate([
                    'image' => 'required|file|image|mimes:jpeg,jpg,svg,png,gif|max:2035',
                    'id' => 'required'
                ]);
                if ($request->image == "") {
                    $notification = array(
                        'message' => 'Please Chose an Image',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                } else {
                    // collate the data here
                    $picture = time() . '_' . $request->image->getClientOriginalName();
                    $request->image->move(public_path('images3'), $picture);
                    $id = $request->id;
                    $find = Agriculture::where('id', $id)->first();
                    // update
                    $updatePicture = Agriculture::where('id', $id)->update([
                        'picture' => 'images3/' . $picture
                    ]);
                    if (!empty($find->picture)) {
                        unlink($find->picture);
                    } else {
                        // update
                        $updatePicture = Agriculture::where('id', $id)->update([
                            'picture' => 'images3/' . $picture
                        ]);
                        $notification = array(
                            'message' => 'Picture Changed Successfully',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    }
                    if ($updatePicture) {
                        $notification = array(
                            'message' => 'Picture Changed Successfully',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'message' => 'Error Occured while changing the image',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    }
                }
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Picture Changed Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function deleteAgriculture(Request $request, $id)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $adminName = adminLog::where('adminName', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $toDelete = Agriculture::where('id', $id)->first();
                if (!empty($toDelete->picture)) {
                    unlink($toDelete->picture);
                } else {
                    Agriculture::where('id', $id)->delete();
                    $notification = array(
                        'message' => 'Publication Deleted Successfully',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }
                Agriculture::where('id', $id)->delete();
                $notification = array(
                    'message' => 'Publication Deleted Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
            }
        }
    }

    public function editFinance(Request $request, $id)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $adminName = adminLog::where('adminName', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $finance = Finance::where('id', $id)->first();
                $unreadMessage = AdminMessage::where('status', 'unread')->count();
                $AdminInboxs = AdminMessage::where('status', 'unread')->orderBy('id', 'asc')->paginate(4);
                return view::make('admin.editFinance')->with([
                    'finance' => $finance,
                    'unreadMessage' => $unreadMessage,
                    'AdminInboxs' => $AdminInboxs,
                    'adminName' => $adminName
                ]);
            } catch (\Exception $ex) {

                $notification = array(
                    'message' => 'Error while trying to Unublished this content',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function updateFinance(Request $request)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $adminName = AdminLog::where('adminName', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $rules = [
                    'title' => 'required',
                    'content' => 'required',
                    'id' => 'required'

                ];
                $Validator = Validator::make($request->all(), $rules);
                if ($Validator) {
                    // collate the date here
                    $title = $request->title;
                    $content = $request->content;
                    $id = $request->id;
                    // now create
                    $update = Finance::where('id', $id)->update([
                        'title' => $title,
                        'content' => $content
                    ]);
                    if ($update) {
                        $notification = array(
                            'message' => 'Updated Successfully',
                            'alert-type' => 'success'
                        );
                    } else {
                        $notification = array(
                            'message' => 'Can not Update Record please try again',
                            'alert-type' => 'error'
                        );
                    }
                    return redirect()->back()->with($notification);
                } else {
                    return redirect()->back()->withInput()->withErrors($Validator);
                }
            } catch (\EXception $ex) {
                $notification = array(
                    'message' => 'Internal Error',
                    'alert-type' => 'danger'
                );
                return abort('404');
            }
        } else {
            $notification = array(
                'message' => 'Access Denied, make sure you sign in',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function changeFinanceImage(Request $request)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $adminName = adminLog::where('adminName', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $request->validate([
                    'image' => 'required|file|image|mimes:jpeg,jpg,svg,png,gif|max:2035',
                    'id' => 'required'
                ]);
                if ($request->image == "") {
                    $notification = array(
                        'message' => 'Please Chose an Image',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                } else {
                    // collate the data here
                    $picture = time() . '_' . $request->image->getClientOriginalName();
                    $request->image->move(public_path('images3'), $picture);
                    $id = $request->id;
                    $find = Finance::where('id', $id)->first();
                    // update
                    $updatePicture = Finance::where('id', $id)->update([
                        'picture' => 'images3/' . $picture
                    ]);
                    if (!empty($find->picture)) {
                        unlink($find->picture);
                    } else {
                        // update
                        $updatePicture = Finance::where('id', $id)->update([
                            'picture' => 'images3/' . $picture
                        ]);
                        $notification = array(
                            'message' => 'Picture Changed Successfully',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    }
                    if ($updatePicture) {
                        $notification = array(
                            'message' => 'Picture Changed Successfully',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    } else {
                        $notification = array(
                            'message' => 'Error Occured while changing the image',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    }
                }
            } catch (\Exception $ex) {
                $notification = array(
                    'message' => 'Picture Changed Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function deleteFinance(Request $request, $id)
    {
        $loggedInAdmin = $request->session()->get('admin');
        $adminName = adminLog::where('adminName', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $toDelete = Finance::where('id', $id)->first();
                if (!empty($toDelete->picture)) {
                    unlink($toDelete->picture);
                } else {
                    Finance::where('id', $id)->delete();
                    $notification = array(
                        'message' => 'Publication Deleted Successfully',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }
                Finance::where('id', $id)->delete();
                $notification = array(
                    'message' => 'Publication Deleted Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
            }
        }
    }
  
}

