<?php

namespace App\Http\Controllers;

use App\Models\Rad;
use Illuminate\Http\Request;

class RadController extends Controller
{
    public function save(Request $request){
        $rad = new Rad();
        $rad->value = $request->valor;
        $rad->date = $request->data;
        $rad->time= $request->hora;

        $rad->save();

        return response('Success', 200);

    }
}
