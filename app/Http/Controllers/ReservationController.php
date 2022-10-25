<?php

namespace App\Http\Controllers;

use App\Models\Area;

class ReservationController extends Controller
{
    public function getReservations()
    {
        $array = ['erro' => ''];
        $daysHelper = ['Dom', 'Seg', 'Ter', 'Quar', 'Qui', 'Sex', 'Sab'];

        $areas = Area::where('allowed', 1)->get();

        foreach ($areas as $area) {
            $dayList = explode(',', $area['days']);

            $dayGroups = [];

            //Adicionando o primeiro dia
            $lastDay = intval(current($dayList));
            $dayGroups[] = $daysHelper[$lastDay];
            array_shift($dayList);

            //Adicionando dias relevantes

            //Adicionando o último dia
            $dayGroups[] = $daysHelper[end($dayList)];

            echo "AREA: " . $area['title'] . "\n";
            print_r($dayGroups);

            echo "\n ------------";

        }

        $array['list'] = $areas;
        return $array;

    }

}
