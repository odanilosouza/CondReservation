<?php

namespace App\Http\Controllers;

use App\Models\Area;

class ReservationController extends Controller
{
    public function getReservation()
    {
        $array = ['erro' => ''];

        $areas = Area::where('allowed', 1)->get();

        $array['list'] = $areas;

        return $array;
    }
}
