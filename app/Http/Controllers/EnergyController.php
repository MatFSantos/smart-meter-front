<?php

namespace App\Http\Controllers;

use App\Models\Energy;
use Illuminate\Http\Request;

class EnergyController extends Controller
{
    public function save(Request $request){
        $energy = new Energy();
        $energy->value = $request->valor;
        $energy->date = $request->data;
        $energy->time= $request->hora;

        $energy->save();

        return response('Success', 200);

    }
}
