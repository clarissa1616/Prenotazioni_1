<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function indexRooms()
    {
        return view('rooms.index');
    }
    public function overview()
    {
        return view('rooms.overview');
    }
    public function lacorteRoom()
    {
        return view('rooms.lacorte');
    }
    public function ilborgoRoom()
    {
        return view('rooms.ilborgo');
    }
    public function lavillaRoom()
    {
        return view('rooms.lavilla');
    }
}
