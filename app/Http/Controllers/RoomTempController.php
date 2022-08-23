<?php

namespace App\Http\Controllers;

use App\Models\RoomTemperature;
use Illuminate\Http\Request;

class RoomTempController extends Controller
{
    public function save(Request $request){
        $roomTemp = new RoomTemperature();
        $roomTemp->value = $request->valor;
        $roomTemp->date = $request->data;
        $roomTemp->time= $request->hora;

        $roomTemp->save();

        return response('Success', 200);

    }
}
