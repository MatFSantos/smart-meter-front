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
        $energyTime = [];
        foreach ($energies as $energie) {
            $energiesValue[] = $energie->value;
            $energyTime[] = $energie->time;
        }

        $currentsValue = [];
        $currentTime = [];
        foreach ($currents as $current) {
            $currentsValue[] = $current->value;
            $currentTime[] = $current->time;
        }

        $powersValue = [];
        $powerTime = [];
        foreach ($powers as $power) {
            $powersValue[] = $power->value;
            $powerTime[] = $power->time;
        }

        $voltagesValue = [];
        $voltageTime = [];
        foreach ($voltages as $voltage) {
            $voltagesValue[] = $voltage->value;
            $voltageTime[] = $voltage->time;
        }

        $roomTempValue = [];
        $roomTempTime = [];
        foreach ($roomTemp as $temp) {
            $roomTempValue[] = $temp->value;
            $roomTempTime[] = $temp->time;
        }

        $plateTempValue = [];
        $plateTempTime = [];
        foreach ($plateTemp as $temp) {
            $plateTempValue[] = $temp->value;
            $plateTempTime[] = $temp->time;
        }

        return response()->json([
            'energia'  => [$energiesValue, $energyTime],
            'corrente' => [$currentsValue, $currentTime],
            'potencia' => [$powersValue, $powerTime],
            'tensao'   => [$voltagesValue,$voltageTime],
            'temperatura_ambiente' => [$roomTempValue, $roomTempTime],
            'temperatura_placa'    => [$plateTempValue, $plateTempTime],
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
