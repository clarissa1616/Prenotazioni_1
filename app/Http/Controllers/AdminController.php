<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index() {
        return view('admin.home');
    }

    public function rooms() {
        $rooms = Room::all();
        return view('admin.rooms', compact('rooms'));
    }

    public function plans() {
        $plans = Plan::all();
        return view('admin.plans', compact('plans'));
    }

    public function users() {
        $users = User::where('email', '!=', 'admin@prenotazioni.it')->where('id', '!=', Auth::id())->get();
        return view('admin.users', compact('users'));
    }

    public function updateUser(User $user) {
        if ($user->role == 'admin') {
            $user->role = 'user';
        } else {
            $user->role = 'admin';
        }
        $user->save();
        return redirect()->back();
    }
}
