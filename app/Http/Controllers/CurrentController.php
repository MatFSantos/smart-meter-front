<?php

namespace App\Http\Controllers;

use App\Models\Current;
use Illuminate\Http\Request;

class CurrentController extends Controller
{
    public function save(Request $request){
        $current = new Current();
        $current->value = $request->valor;
        $current->date = $request->data;
        $current->time= $request->hora;

        $current->save();

        return response('Success', 200);

    }
}
