<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Entities\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Modules\Cinema\Entities\Lekki;
use Modules\Cinema\Entities\Ajah;
use Modules\Cinema\Entities\Ikeja;
use Nwidart\Modules\Facades\Module;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('user::index');
    }


    /**
     * AUTHENTICATE USER BEFORE GETTING ACCESS.
     * @param Request $request
     * @param int $id
     * 
     * @return Renderable
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
                $adminName = user::where('username', $username)->first();
                // dd($adminName);
                if ($adminName) {
                    $hashpassword = $adminName->password;
                    // check validity of the password
                    $passwordCheck = Hash::check($password, $hashpassword);
                    if ($passwordCheck) {
                        // $session = Session::push('admin', $adminName->adminName);
                        // $session =  $request->Session()->put('admin', $adminName->username);
                        $session = Session::put('admin', $adminName->username);
                        // dd(session());
                        return view::make('user::adminHome')->with([
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
                dd($ex);
                return redirect()->back('/');
            }
        }
    }

    /**
     * MANAGE MOVIE ON AJAH CINEMA.
     * @param Request $request
     * @param int $id
     * RENDERS THE AVAILABLE RECORDS
     * @return Renderable
     */
    public function manageAjahCinema(Request $request)
    {
        $loggedInAdmin = $request->Session()->get('admin');
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        // dd($adminName);
        if ($adminName) {
            try {
                $ajaBranch = Ajah::where('status', '!=', '')->orderBy('id', 'asc')->paginate(4);;
                return view::make('user::manageAjahCinema')->with([
                    'adminName' => $adminName,
                    'ajaBranch' => $ajaBranch
                ]);
            } catch (\Exception $ex) {
                dd($ex);
                $notification = array(
                    'message' => 'Internal Error',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    /**
     * CREATE MOVIE ON AJAH CINEMA.
     * @param Request $request
     * @param int $id
     * RENDERS THE AVAILABLE RECORDS
     * @return Renderable
     */
    public function createAjahCinema(Request $request)
    {

        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $rules = [
                    'time' => 'required',
                    'date' => 'required',
                    'caption' => 'required|max:1000|min:15',
                    'details' => 'required|max:1000|min:15',
                    'movie' => 'required|file|video|mimes:mp4|max:5048',
                ];
                $Validator = Validator::make($request->all(), $rules);
                //DD($Validator);
                if ($Validator) {
                    $details = $request->details;
                    $caption = $request->caption;
                    $time = $request->time;
                    $date = $request->date;
                    $movie = $request->movie;
                    // $movie= $request('Movie');
                    if ($movie == "") {
                        echo 'You can not Publish Null object';
                    } else {
                        $movie = time() . '_' . $request->movie->getClientOriginalName();
                        // dd($movie);
                        $request->movie->move(public_path('Cinema/ajahCinema'), $movie);
                        //DD($movie);
                        $createlekkiCinema = Ajah::create([
                            'admin' => $adminName->username,
                            'caption' => $caption,
                            'details' => $details,
                            'time' => $time,
                            'date' => $date,
                            'movie' => 'Cinema/ajahCinema/' . $movie,
                        ]);
                        if ($createlekkiCinema) {
                            $notification = array(
                                'message' => 'Created successfully!',
                                'alert-type' => 'success'
                            );
                            return redirect()->back()->with($notification);
                        } else {
                            $notification = array(
                                'message' => 'can not create this Cinema',
                                'alert-type' => 'error'
                            );
                            return redirect()->back()->with($notification);
                        }
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
    
    /**
     * MANAGE MOVIE ON IKEJA CINEMA.
     * @param Request $request
     * @param int $id
     * RENDERS THE AVAILABLE RECORDS
     * @return Renderable
     */
    public function manageIkejaCinema(Request $request)
    {
        $loggedInAdmin = $request->Session()->get('admin');
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        // dd($adminName);
        if ($adminName) {
            try {
                $ajaBranch = Ikeja::where('status', '!=', '')->orderBy('id', 'asc')->paginate(4);;
                return view::make('user::manageIkejaCinema')->with([
                    'adminName' => $adminName,
                    'ajaBranch' => $ajaBranch
                ]);
            } catch (\Exception $ex) {
                dd($ex);
                $notification = array(
                    'message' => 'Internal Error',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    /**
     * CREATE MOVIE ON IKEJA CINEMA.
     * @param Request $request
     * @param int $id
     * RENDERS THE AVAILABLE RECORDS
     * @return Renderable
     */
    public function createIkejaCinema(Request $request)
    {

        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        // dd($adminName);
        if ($adminName) {
            try {
                $rules = [
                    'time' => 'required',
                    'date' => 'required',
                    'caption' => 'required|max:1000|min:15',
                    'details' => 'required|max:1000|min:15',
                    'movie' => 'required|file|video|mimes:mp4,mp3|max:5048',
                ];
                $Validator = Validator::make($request->all(), $rules);
                //DD($Validator);
                if ($Validator) {

                    $caption = $request->caption;
                    $time = $request->time;
                    $details = $request->details;
                    $date = $request->date;
                    $movie = $request->movie;
                    // $movie= $request('Movie');
                    if ($movie == "") {
                        echo 'You can not Publish Null object';
                    } else {
                        $moviename = time() . '_' . $request->movie->getClientOriginalName();
                        // dd($movie);
                        $request->movie->move(public_path('Cinema/ikejaCinema'), $moviename);

                        $createIkejaCinema = Ikeja::create([
                            'admin' => $adminName->username,
                            'caption' => $caption,
                            'details' => $details,
                            'time' => $time,
                            'date' => $date,
                            'movie' => 'Cinema/ikejaCinema/' . $moviename,
                        ]);
                        if ($createIkejaCinema) {
                            session()->flash('success', 'Record created successfully');
                            $notification = array(
                                'message' => 'Created successfully!',
                                'alert-type' => 'success'
                            );
                            return redirect()->back()->with($notification);
                        } else {
                            $error = Session::flash('error', 'Can not create this record at this time, please try again.');
                            return back()->with($error); 
                            $notification = array(
                                'message' => 'can not create this Movie',
                                'alert-type' => 'error'
                            );
                            return redirect()->back()->with($notification);
                        }
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

     /**
     * MANAGE MOVIE ON LEKKI CINEMA.
     * @param Request $request
     * @param int $id
     * RENDERS THE AVAILABLE RECORDS
     * @return Renderable
     */
    public function manageLekkiCinema(Request $request)
    {
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        // dd($adminName);
        if ($adminName) {
            try {
                $lekkiBranch = Lekki::where('status', '!=', '')->orderBy('id', 'asc')->paginate(4);;
                return view::make('user::manageLekkiCinema')->with([
                    'adminName' => $adminName,
                    'lekkiBranch' => $lekkiBranch
                ]);
            } catch (\Exception $ex) {
                dd($ex);
                $notification = array(
                    'message' => 'Internal Error',
                    'alert-type' => 'danger'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    public function createLekkiCinema(Request $request)
    {
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $rules = [
                    'time' => 'required',
                    'date' => 'required',
                    'caption' => 'required|max:1000|min:15',
                    'details' => 'required|max:1000|min:15',
                    'movie' => 'required|file|video|mimes:mp4,mp3|max:5048',
                ];
                $Validator = Validator::make($request->all(), $rules);
                //DD($Validator);
                if ($Validator) {

                    $caption = $request->caption;
                    $time = $request->time;
                    $details = $request->details;
                    $date = $request->date;
                    $movie = $request->movie;
                    // $movie= $request('Movie');
                    if ($movie == "") {
                        echo 'You can not Publish Null object';
                    } else {
                        $movie = time() . '_' . $request->movie->getClientOriginalName();
                        // dd($movie);
                        $request->movie->move(public_path('Cinema/lekkiCinema'), $movie);
                       // $request->movie->move(Module::getModulePath('user/public/ajaCinema'), $movie);
                        //DD($movie) 
                        $createlekkiCinema = Lekki::create([
                            'admin' => $adminName->username,
                            'caption' => $caption,
                            'details' => $details,
                            'time' => $time,
                            'date' => $date,
                            'movie' => 'Cinema/lekkiCinema/' . $movie
                        ]);
                        if ($createlekkiCinema) {
                            $notification = array(
                                'message' => 'Created successfully!',
                                'alert-type' => 'success'
                            );
                            return redirect()->back()->with($notification);
                        } else {
                            $notification = array(
                                'message' => 'can not create this Movie',
                                'alert-type' => 'error'
                            );
                            return redirect()->back()->with($notification);
                        }
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




    /**
     * PUBLISH CINEMA ON AJAH CINEMA.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function actionOnAjahCinema(Request $request, $id)
    {
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $find = Ajah::where('id', $id)->first();
                if ($find->status === 'unpublished') {
                    $publishOrUnpublish = Ajah::where('id', $id)->update([
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
                            'message' => 'Error while trying to Unpublished this content',
                            'alert-type' => 'success'
                        );
                        return redirect()->back()->with($notification);
                    }
                } else {

                    $publishOrUnpublish = Ajah::where('id', $id)->update([
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

    /**
     * PUBLISH CINEMA ON IKEJA CINEMA.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function actionOnIkejaCinema(Request $request, $id)
    {
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $find = Ikeja::where('id', $id)->first();
                if ($find->status === 'unpublished') {
                    $publishOrUnpublish = Ikeja::where('id', $id)->update([
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

                    $publishOrUnpublish = Ikeja::where('id', $id)->update([
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

    /**
     * PUBLISH CINEMA ON LEKKI CINEMA.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function actionOnLekkiCinema(Request $request, $id)
    {
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $find = Lekki::where('id', $id)->first();
                if ($find->status === 'unpublished') {
                    $publishOrUnpublish = Lekki::where('id', $id)->update([
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

                    $publishOrUnpublish = Lekki::where('id', $id)->update([
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
    /**
     * EDIT AJAH CINEMA.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function editAjahCinema(Request $request, $id)
    {
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $ajahBranch = Ajah::where('id', $id)->first();
               // dd($ajahBranch);
                return view::make('user::editAjahCinema')->with([
                    'ajahBranch' => $ajahBranch,
                    'adminName' => $adminName
                ]);
            } catch (\Exception $ex) {
                dd($ex);
                $notification = array(
                    'message' => 'Error while trying to Unublished this content',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    /**
     * UPDATE MOVIE ON AJAH CINEMA.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function updateAjahCinema(Request $request)
    {
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $rules = [
                    'caption' => 'required',
                    'details' => 'required',
                    'id' => 'required'

                ];
                $Validator = Validator::make($request->all(), $rules);
                if ($Validator) {
                    // collate the date here
                    $caption = $request->caption;
                    $details = $request->details;
                    $id = $request->id;
                    // now create
                    $update = Ajah::where('id', $id)->update([
                        'caption' => $caption,
                        'details' => $details,
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
    /**
     * CHANGE MOVIE ON AJAH CINEMA.
     * @param Request $request
     * @param int $id
     * WITH THE UNIQUE ID
     * @return Renderable
     */
    public function changeAjahCinemaMovie(Request $request)
    {
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $rules =[
                    'movie' => 'required|file|video|mimes:mp4|max:5048',
                    'id' => 'required',
                ];
                $Validator = Validator::make($request->all(), $rules);
               // dd($Validator);
                if ($Validator){
                    $movie = $request->movie;
                   // dd($movie);
                    if ($movie == "") {
                        echo 'Please Choose a Movie';
                        $notification = array(
                            'message' => 'Please Chose an Movie',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->with($notification);
                    } else {
                        // collate the data here
                        $movieName = time() . '_' . $request->movie->getClientOriginalName();
                        $request->movie->move(public_path('Cinema/ajahCinema'), $movieName);
                        $id = $request->id;
                        $find = Ajah::where('id', $id)->first();
                        // update
                        $updatemovie = Ajah::where('id', $id)->update([
                            'movie' => 'Cinema/ajahCinema/' . $movieName
                        ]);
                        if (!empty($find->movie)) {
                            unlink($find->movie);
                        } else {
                            // update
                            $updatemovie = Ajah::where('id', $id)->update([
                                'movie' => 'Cinema/ajahCinema/' . $movieName
                            ]);
                            $notification = array(
                                'message' => 'movie Changed Successfully',
                                'alert-type' => 'success'
                            );
                            return redirect()->back()->with($notification);
                        }
                        if ($updatemovie) {
                            $notification = array(
                                'message' => 'movie Changed Successfully',
                                'alert-type' => 'success'
                            );
                            return redirect()->back()->with($notification);
                        } else {
                            $notification = array(
                                'message' => 'Error Occured while changing the Movie',
                                'alert-type' => 'success'
                            );
                            return redirect()->back()->with($notification);
                        }
                    }
                }else{
                    return redirect()->back()->withInput()->withErrors($Validator);
                }
            } catch (\Exception $ex) {
                dd($ex);
                $notification = array(
                    'message' => 'movie Changed Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    /**
     * DELETE CINEMA ON AJAH CINEMA.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function deleteAjahCinema(Request $request, $id)
    {
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $toDelete = Ajah::where('id', $id)->first();
                if (!empty($toDelete->movie)) {
                    unlink($toDelete->movie);
                } else {
                    Ajah::where('id', $id)->delete();
                    $notification = array(
                        'message' => 'Movie Deleted Successfully',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }
                Ajah::where('id', $id)->delete();
                $notification = array(
                    'message' => 'Movie Deleted Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
                dd($ex);
            }
        }
    }

    /**
     * EDIT IKEJA CINEMA.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function editIkejaCinema(Request $request, $id)
    {
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $ikejaBranch = Ikeja::where('id', $id)->first();
                return view::make('user::editIkejaCinema')->with([
                    'ikejaBranch' => $ikejaBranch,
                    'adminName' => $adminName
                ]);
            } catch (\Exception $ex) {
                dd($ex);
                $notification = array(
                    'message' => 'Error while trying to Unublished this content',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    /**
     * UPDATE MOVIE ON IKEJA CINEMA.
     * @param Request $request
     * @param int $id
     * USING THE UNIQUE ID
     * @return Renderable
     */
    public function updateIkejaCinema(Request $request)
    {
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $rules = [
                    'title' => 'required',
                    'caption' => 'required',
                    'id' => 'required'

                ];
                $Validator = Validator::make($request->all(), $rules);
                if ($Validator) {
                    // collate the date here
                    $title = $request->title;
                    $caption = $request->caption;
                    $id = $request->id;
                    // now create
                    $update = Ikeja::where('id', $id)->update([
                        'title' => $title,
                        'caption' => $caption
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

     /**
     * CHANGE MOVIE ON IKEJA CINEMA.
     * @param Request $request
     * @param int $id
     * USING THE UNIQUE ID
     * @return Renderable
     */
    public function changeIkejaCinemaMovie(Request $request)
    {
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $rules =[
                    'movie' => 'required|file|video|mimes:mp4|max:5048',
                    'id' => 'required',
                ];
                $Validator = Validator::make($request->all(), $rules);
               // dd($Validator);
                if ($Validator){
                    $movie = $request->movie;
                   // dd($movie);
                    if ($movie == "") {
                        echo 'Please Choose a Movie';
                        $notification = array(
                            'message' => 'Please Chose an Movie',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->with($notification);
                    } else {
                        // collate the data here
                        $movieName = time() . '_' . $request->movie->getClientOriginalName();
                        $request->movie->move(public_Path('Cinema/ikejaCinema'), $movieName);
                        $id = $request->id;
                        $find = Ajah::where('id', $id)->first();
                        // update
                        $updatemovie = Ikeja::where('id', $id)->update([
                            'movie' => 'Cinema/ikejaCinema/' . $movieName
                        ]);
                        if (!empty($find->movie)) {
                            unlink($find->movie);
                        } else {
                            // update
                            $updatemovie = Ajah::where('id', $id)->update([
                                'movie' => 'Cinema/ikejaCinema' . $movieName
                            ]);
                            $notification = array(
                                'message' => 'movie Changed Successfully',
                                'alert-type' => 'success'
                            );
                            return redirect()->back()->with($notification);
                        }
                        if ($updatemovie) {
                            $notification = array(
                                'message' => 'movie Changed Successfully',
                                'alert-type' => 'success'
                            );
                            return redirect()->back()->with($notification);
                        } else {
                            $notification = array(
                                'message' => 'Error Occured while changing the Movie',
                                'alert-type' => 'success'
                            );
                            return redirect()->back()->with($notification);
                        }
                    }
                }else{
                    return redirect()->back()->withInput()->withErrors($Validator);
                }
            } catch (\Exception $ex) {
                dd($ex);
                $notification = array(
                    'message' => 'movie Changed Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

     /**
     * DELETE MOVIE ON IKEJA CINEMA.
     * @param Request $request
     * @param int $id
     * USING THE UNIQUE ID
     * @return Renderable
     */
    public function deleteIkejaCinema(Request $request, $id)
    {
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $toDelete = Ikeja::where('id', $id)->first();
                if (!empty($toDelete->movie)) {
                    unlink($toDelete->movie);
                } else {
                    Ikeja::where('id', $id)->delete();
                    $notification = array(
                        'message' => 'Movie Deleted Successfully',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }
                Ikeja::where('id', $id)->delete();
                $notification = array(
                    'message' => 'Movie Deleted Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
            }
        }
    }

     /**
     * EDIT MOVIE ON LEKKI CINEMA.
     * @param Request $request
     * @param int $id
     * USING THE UNIQUE ID
     * @return Renderable
     */
    public function editLekkiCinema(Request $request, $id)
    {
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $likkeBranch = Lekki::where('id', $id)->first();
                return view::make('admin.editlikkeCinema')->with([
                    'likkeBranch' => $likkeBranch,
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
     /**
     * UPDATE MOVIE ON LEKKI CINEMA.
     * @param Request $request
     * @param int $id
     * USING THE UNIQUE ID
     * @return Renderable
     */
    public function updateLekkiCinema(Request $request)
    {
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $rules = [
                    'title' => 'required',
                    'caption' => 'required',
                    'id' => 'required'

                ];
                $Validator = Validator::make($request->all(), $rules);
                if ($Validator) {
                    // collate the date here
                    $title = $request->title;
                    $caption = $request->caption;
                    $id = $request->id;
                    // now create
                    $update = Lekki::where('id', $id)->update([
                        'title' => $title,
                        'caption' => $caption
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

     /**
     * CHAGE MOVIE ON LEKKI CINEMA.
     * @param Request $request
     * @param int $id
     * USING THE UNIQUE ID
     * @return Renderable
     */
    public function changeLekkiCinemaMovie(Request $request)
    {
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $rules =[
                    'movie' => 'required|file|video|mimes:mp4|max:5048',
                    'id' => 'required',
                ];
                $Validator = Validator::make($request->all(), $rules);
               // dd($Validator);
                if ($Validator){
                    $movie = $request->movie;
                   // dd($movie);
                    if ($movie == "") {
                        echo 'Please Choose a Movie';
                        $notification = array(
                            'message' => 'Please Chose an Movie',
                            'alert-type' => 'error'
                        );
                        return redirect()->back()->with($notification);
                    } else {
                        // collate the data here
                        $movieName = time() . '_' . $request->movie->getClientOriginalName();
                        $request->movie->move(public_path('Cinema/lekkiCinema'), $movieName);
                        $id = $request->id;
                        $find = Ajah::where('id', $id)->first();
                        // update
                        $updatemovie = Lekki::where('id', $id)->update([
                            'movie' => 'Cinema/lekkiCinema/' . $movieName
                        ]);
                        if (!empty($find->movie)) {
                            unlink($find->movie);
                        } else {
                            // update
                            $updatemovie = Ajah::where('id', $id)->update([
                                'movie' => 'Cinema/lekkiCinema/' . $movieName
                            ]);
                            $notification = array(
                                'message' => 'movie Changed Successfully',
                                'alert-type' => 'success'
                            );
                            return redirect()->back()->with($notification);
                        }
                        if ($updatemovie) {
                            $notification = array(
                                'message' => 'movie Changed Successfully',
                                'alert-type' => 'success'
                            );
                            return redirect()->back()->with($notification);
                        } else {
                            $notification = array(
                                'message' => 'Error Occured while changing the Movie',
                                'alert-type' => 'success'
                            );
                            return redirect()->back()->with($notification);
                        }
                    }
                }else{
                    return redirect()->back()->withInput()->withErrors($Validator);
                }
            } catch (\Exception $ex) {
                dd($ex);
                $notification = array(
                    'message' => 'movie Changed Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

     /**
     * DELETE MOVIE ON LEKKI CINEMA.
     * @param Request $request
     * @param int $id
     * USING THE UNIQUE ID
     * @return Renderable
     */
    public function deleteLekkiCinema(Request $request, $id)
    {
        $loggedInAdmin = Session::get('admin');
        $adminName = user::where('username', $loggedInAdmin)->first();
        if ($adminName) {
            try {
                $toDelete = Lekki::where('id', $id)->first();
                if (!empty($toDelete->movie)) {
                    unlink($toDelete->movie);
                } else {
                    Lekki::where('id', $id)->delete();
                    $notification = array(
                        'message' => 'Movie Deleted Successfully',
                        'alert-type' => 'success'
                    );
                    return redirect()->back()->with($notification);
                }
                Lekki::where('id', $id)->delete();
                $notification = array(
                    'message' => 'Movie Deleted Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } catch (\Exception $ex) {
            }
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin');
        $request->session()->regenerate();
        return redirect()->to('/user');
    }
}
