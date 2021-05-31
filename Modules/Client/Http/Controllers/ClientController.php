<?php

namespace Modules\Client\Http\Controllers;

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

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function index(Request $request)
    {
        try {
            $lekkiCinema = Lekki::where('status', 'published')->orderBy('created_at', 'desc')->simplePaginate(3);
            $ajahCinema = Ajah::where('status', 'published')->orderBy('created_at', 'desc')->simplePaginate(3);
            $ikejaCinema = Ikeja::where('status', 'published')->orderBy('created_at', 'desc')->simplePaginate(3);
            return view::make('client::index')->with([
                'lekkiCinema' => $lekkiCinema,
                'ajahCinema' => $ajahCinema,
                'ikejaCinema' => $ikejaCinema
            ]);
        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->back()->to('index');
        }
    }
    // Get publication on ajahCinema
    public function ajahCinema(Request $request)
    {
        try {
            $ajahCinema = Ajah::where('status', 'published')->orderBy('created_at', 'asc')->simplePaginate(2);
            return view::make('client::ajahcinema')->with([
                'ajahCinema' => $ajahCinema
            ]);
        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->back()->to('/');
        }
    }
    // Get publication on IkejahCinema
    public function ikejaCinema(Request $request)
    {
        try {
            $ikejaCinema = Ikeja::where('status', 'published')->orderBy('created_at', 'asc')->simplePaginate(2);
            return view::make('client::ikejaCinema')->with([
                'ikejaCinema' => $ikejaCinema
            ]);
        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->back()->to('/');
        }
    }
    // Get publication on LekkiCinema
    public function lekkiCinema(Request $request)
    {
        try {
            $lekkiCinema = Lekki::where('status', 'published')->orderBy('created_at', 'asc')->simplePaginate(2);
            return view::make('client::lekkiCinema')->with([
                'lekkiCinema' => $lekkiCinema
            ]);
        } catch (\Exception $ex) {
            dd($ex);
            return redirect()->back()->to('/');
        }
    }
    /**
     * read and check out the show times of a movie in ajah cinema
     * read briefly on what about the movie.
     * @return Renderable
     */

    public function readAjahCinema(Request $request, $id)
    {
        try {
            $toRead = Ajah::where('id', $id)->first();
            if ($toRead) {
                return view::make('client::read-ajahCinema')->with([
                    'toRead' => $toRead
                ]);
            }
        } catch (\Exception $ex) {
        }
    }
    /**
     * read and check out the show times of a movie in ikeja cinema
     * read briefly on what about the movie.
     * @return Renderable
     */
    public function readIkejaCinema(Request $request, $id)
    {
        try {
            $toRead = Ikeja::where('id', $id)->first();
            if ($toRead) {
                return view::make('client::read-ikejaCinema')->with([
                    'toRead' => $toRead
                ]);
            }
        } catch (\Exception $ex) {
        }
    }
    /**
     * read and check out the show times of a movie in lekki cinema
     * read briefly on what about the movie.
     * @return Renderable
     */
    public function readLekkiCinema(Request $request, $id)
    {
        try {
            $toRead = Lekki::where('id', $id)->first();
            if ($toRead) {
                return view::make('client::read-lekkiCinema')->with([
                    'toRead' => $toRead
                ]);
            }
        } catch (\Exception $ex) {
        }
    }

    public function contactUs(Request $request)
    {
        try {
           
                return view::make('client::contactUs');
            
        } catch (\Exception $ex) {
        }
    }

    public function aboutUs(Request $request)
    {
        try {
           
                return view::make('client::aboutUs');
            
        } catch (\Exception $ex) {
        }
    }
}
