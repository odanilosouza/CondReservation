<?php

namespace App\Http\Controllers;

use App\Models\Area;

class ReservationController extends Controller
{
    public function getReservations()
    {
        $array = ['erro' => ''];
        $daysHelper = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'];

        $areas = Area::where('allowed', 1)->get();

        foreach ($areas as $area) {
            $dayList = explode(',', $area['days']);

            $dayGroups = [];

            //Adicionando o primeiro dia
            $lastDay = intval(current($dayList));
            $dayGroups[] = $daysHelper[$lastDay];
            array_shift($dayList);
            //Adicionando dias relevantes

            foreach ($dayList as $day) {
                if (intval($day) != $lastDay + 1) {
                    // $dayGroups[] = $daysHelper[$lastDay];
                    // $dayGroups[] = $daysHelper[$day];
                }

                $lastDay = intval($day);
            }

            //Juntando as datas dia 01 e 02
            $close = 0;
            $dates = '';
            foreach ($dayGroups as $group) {
                if ($close === 0) {
                    $dates .= $group;
                } else {
                    $dates .= '-' . $group . ',';
                }
                $close = 1 - $close;

            }
            $dates = explode(',', $dates);
            array_pop($dates);

            //Adicionando o último dia
            // $dayGroups[] = $daysHelper[end($dayList)];

            echo "AREA: " . $area['title'] . "\n";
            print_r($dates);
            echo "\n --------------";

        }

        $array['list'] = $areas;
        return $array;

    }

}
