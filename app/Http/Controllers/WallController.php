<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wall;
use App\Models\Walllikes;

class WallController extends Controller
{
    public function getAll()
    {
        $array = ['error' => '', 'list' => []];

        $user = auth()->user();

        $walls = Wall::all();

        foreach ($walls as $wallKey => $wallValue) {
            $walls[$wallKey]['likes'] = 0;
            $walls[$wallKey]['liked'] = false;

            $likes = Walllikes::where('id_wall', $wallValue['id'])->count();
            $walls[$wallKey]['likes'] = $likes;

            $meLikes = Walllikes::where('id_wall', $wallValue['id'])
                ->where('id_user', $user['id'])
                ->count();

            if ($meLikes > 0) {
                $walls[$wallKey]['liked'] = true;
            }

        }

        $array['list'] = $walls;

        return $array;

    }

    public function like($id)
    {
        $array = ['error' => ''];

        $user = auth()->user();

        $meLikes = Walllikes::where('id_wall', $id)
            ->where('id_user', $user['id'])
            ->count();

        if ($meLikes > 0) {
            //remover o like
            WallLikes::where('id_wall', $id)
                ->where('id|_user', $user['id'])
                ->delete();

            $array['liked'] = false;
        } else {
            //Adicionar o like
            $newLike = new Walllikes();
            $newLike->id_wall = $id;
            $newLike->id_user = $user['id'];
            $newLike->save();
            $array['liked'] = true;
        }

        $array['likes'] = Walllikes::where('id_wall', $id)->count();

        return $array;

    }
}
