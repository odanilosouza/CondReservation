<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Unitpeople;
use App\Models\Unitvehicles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    public function getInfo($id)
    {
        $array = ['error' => ''];

        $unit = Unit::find($id);
        if ($unit) {

            $peoples = Unitpeople::where('id_unit', $id)->get();
            $vehicles = Unitvehicles::where('id_unit', $id)->get();

            foreach ($peoples as $pkey => $pValue) {
                $peoples[$pkey]['birthdate'] = date('d/m/Y', strtotime($pValue['birthdate']));

            }

            $array['peoples'] = $peoples;
            $array['Vehicles'] = $vehicles;

        } else {
            $array['error'] = 'Propriedade inexistente';
            return $array;
        }

        return $array;

    }

    public function addPerson($id, Request $request)
    {
        $array = ['error' => ''];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'birthdate' => 'required|date',

        ]);

        if ($validator->fails()) {
            $array['error'] = $validator->errors()->first();
            return $array;

        }

        $name = $request->input('name');
        $birthdate = $request->input('birthdate');

        $newPerson = new Unitpeople();
        $newPerson->id_unit = $id;
        $newPerson->name = $name;
        $newPerson->birthdate = $birthdate;
        $newPerson->save();

        return $array;

    }

    public function addVehicle($id, Request $request)
    {
        $array = ['error' => ''];

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'color' => 'required',
            'plate' => 'required',

        ]);

        if ($validator->fails()) {
            $array['error'] = $validator->errors()->first();
            return $array;
        }

        $title = $request->input('title');
        $color = $request->input('color');
        $plate = $request->input('plate');

        $newVehicle = new Unitvehicles();
        $newVehicle->id_unit = $id;
        $newVehicle->title = $title;
        $newVehicle->color = $color;
        $newVehicle->plate = $plate;
        $newVehicle->save();

        return $array;

    }

    public function removePerson($id, Request $request)
    {
        $array = ['error' => ''];

        $idItem = $request->input('id');
        if ($idItem) {
            Unitpeople::where('id', $idItem)->where('id_unit', $id)->delete();
        } else {
            $array['erro'] = 'ID inexistente';
            return $array;
        }
        return $array;

    }

    public function removeVehicle($id, Request $request)
    {
        $array = ['error' => ''];

        $idItem = $request->input('id');
        if ($idItem) {
            Unitvehicles::where('id', $idItem)->where('id_unit', $id)->delete();
        } else {
            $array['erro'] = 'ID inexistente';
            return $array;
        }
        return $array;
    }
}
