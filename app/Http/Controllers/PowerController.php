<?php

namespace App\Http\Controllers;

use App\Models\Power;
use Illuminate\Http\Request;

class PowerController extends Controller
{
    public function save(Request $request){
        $power = new Power();
        $power->value = $request->valor;
        $power->date = $request->data;
        $power->time= $request->hora;

        $power->save();

        return response('Success', 200);

    }
}
