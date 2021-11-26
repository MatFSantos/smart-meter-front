<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Current;
use App\Models\Power;
use App\Models\Energy;
use App\Models\Voltage;
use App\Models\PlateTemperature;
use App\Models\RoomTemperature;
use App\Models\Rad;

class GraphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function atualizer(){
        $energies = Energy::all();
        $currents = Current::all();
        $powers = Power::all();
        $voltages = Voltage::all();
        $roomTemp = RoomTemperature::all();
        $plateTemp = PlateTemperature::all();

        $energiesValue = [];
        $time = [];
        foreach ($energies as $energie) {
            $energiesValue[] = $energie->value;
            $time[] = $energie->time;
        }

        $currentsValue = [];
        foreach ($currents as $current) {
            $currentsValue[] = $current->value;
        }

        $powersValue = [];
        foreach ($powers as $power) {
            $powersValue[] = $power->value;
        }

        $voltagesValue = [];
        foreach ($voltages as $voltage) {
            $voltagesValue[] = $voltage->value;
        }

        $roomTempValue = [];
        foreach ($roomTemp as $temp) {
            $roomTempValue[] = $temp->value;
        }

        $plateTempValue = [];
        foreach ($plateTemp as $temp) {
            $plateTempValue[] = $temp->value;
        }

        return response()->json([
            'energia'  => $energiesValue,
            'corrente' => $currentsValue,
            'potencia' => $powersValue,
            'tensao'   => $voltagesValue,
            'temperatura_ambiente' => $roomTempValue,
            'temperatura_placa'    => $plateTempValue,
            'tempo' => $time
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
