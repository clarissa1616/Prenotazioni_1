<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prenotation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function generateCode() {
        $code = "";
        for ($i=0; $i<8; $i++) {
            $char = rand(0,35);
            if ($char < 10) {
                $code = $code . $char;
            } else {
                $char += 55;
                $code = $code . chr($char);
            }
        }
        if (Prenotation::where('code', $code)->get()->count() == 0) {
            return $code;
        } else {
            return self::generateCode();
        }
    }

    public static function getPrice($people, $nights, $rooms, $plan) {
        if (is_numeric($people) && is_numeric($nights) && is_array($rooms) && count($rooms) > 0 && isset($rooms[0]->price) && isset($plan->price)) {
            $price = $plan->price * $people * $nights;
            foreach ($rooms as $room) {
                $price += $nights * $room->price;
            }
            return $price;
        } else {
            return false;
        }
    }

    public static function getPriceByPrenotation(Prenotation $prenotation) {
        $people = $prenotation->n_adults + $prenotation->n_children;
        $nights = $prenotation->getNights();
        $rooms = $prenotation->rooms;
        $plan = $prenotation->plan;
        return self::getPrice($people, $nights, $rooms, $plan);
    }

    public function getPriceOfThis() {
        return self::getPriceByPrenotation($this);
    }

    public function getNights() {
        // TODO
        // get nights number from start_date & checkout_date
        return 0;
    }

    public function plan() {
        return $this->belongsTo(Plan::class);
    }

    public function rooms() {
        return $this->belongsToMany(Room::class);
    }
}
