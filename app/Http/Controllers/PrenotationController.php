<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class PrenotationController extends Controller
{

    public $date_start;
    public $date_end;
    public $n_adults;
    public $n_children;

    public function index(Request $request){

        if(!empty($request->all())){
            $this->date_start = $request->date_start;
            $this->date_end = $request->date_end;
            $this->n_adults = explode(',', $request->n_adults[0]);
            $this->n_children = explode(',' , $request->n_children[0]);
            $this->n_rooms = $request->n_rooms;

            // dd($this->n_adults[1]);
            if($this->n_rooms == 1){
                $booking = Room::where('n_adults' , '>=' , $this->n_adults[0])->where('n_children' , '>=' , $this->n_children[0])->get();
                if(!$booking->count() > 0){
                    $booking = false;
                }
                // dd($booking);
                return view('prenotation.index', compact('booking'));
            }elseif ($this->n_rooms > 1){

                $this->multipleRooms();
            }
        }else{
            return view('prenotation.index');
        }
    }

    public function multipleRooms(){
        $booking = Array();

        for ($i=0; $i < $this->n_rooms; $i++) { 
            $booking[] = Room::where('n_adults' , '>=' , $this->n_adults[$i])->where('n_children' , '>=' , $this->n_children[$i])->get();
        }
        dd($booking);
        return view('prenotation.index', compact('booking'));
    }

}
