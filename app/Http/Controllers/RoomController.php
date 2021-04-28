<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'admin']);
    }

    public function create() {
        return view('admin.room.create');
    }

    public function store(Request $request) {
        $jacuzzi = ($request->input('jacuzzi') == 'on');
        $shower = ($request->input('shower') == 'on');
        $balcony = ($request->input('balcony') == 'on');
        $active = ($request->input('active') == 'on');
        Room::create([
            'code' => $request->input('code'),
            'model' => $request->input('model'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'floor' => $request->input('floor'),
            'n_adults' => $request->input('n_adults'),
            'n_children' => $request->input('n_children'),
            'n_baths' => $request->input('n_baths'),
            'jacuzzi' => $jacuzzi,
            'shower' => $shower,
            'balcony' => $balcony,
            'active' => $active,
        ]);
        return redirect()->back();
    }

    public function index() {
        $rooms = Room::all();
        return view('admin.rooms', compact('rooms'));
    }

    public function show(Room $room) {
        return view('admin.room.show', compact('room'));
    }

    public function edit(Room $room) {
        return view('admin.room.edit', compact('room'));
    }

    public function update(Request $request, Room $room) {
        $jacuzzi = ($request->input('jacuzzi') == 'on');
        $shower = ($request->input('shower') == 'on');
        $balcony = ($request->input('balcony') == 'on');
        $active = ($request->input('active') == 'on');
        $room->update([
            'code' => $request->input('code'),
            'model' => $request->input('model'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'floor' => $request->input('floor'),
            'n_adults' => $request->input('n_adults'),
            'n_children' => $request->input('n_children'),
            'n_baths' => $request->input('n_baths'),
            'jacuzzi' => $jacuzzi,
            'shower' => $shower,
            'balcony' => $balcony,
            'active' => $active,
        ]);
        $room->save();
        return redirect()->back();
    }

    public function destroy(Room $room) {
        $room->delete();
        return redirect()->route('room.index');
    }
}
