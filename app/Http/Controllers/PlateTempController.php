<?php

namespace App\Http\Controllers;

use App\Models\PlateTemperature;
use Illuminate\Http\Request;

class PlateTempController extends Controller
{
    public function save(Request $request){
        $PlateTemp = new PlateTemperature();
        $PlateTemp->value = $request->valor;
        $PlateTemp->date = $request->data;
        $PlateTemp->time= $request->hora;

        $PlateTemp->save();

        return response('Success', 200);

    }
}
