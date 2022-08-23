<?php

namespace App\Http\Controllers;

use App\Models\Voltage;
use Illuminate\Http\Request;

class VoltageController extends Controller
{
    public function save(Request $request){
        $voltage = new Voltage();
        $voltage->value = $request->valor;
        $voltage->date = $request->data;
        $voltage->time= $request->hora;

        $voltage->save();

        return response('Success', 200);

    }
}
