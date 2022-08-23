<?php

namespace App\Http\Controllers;

use App\Models\Current;
use App\Models\Energy;
use App\Models\PlateTemperature;
use App\Models\Power;
use App\Models\Rad;
use App\Models\RoomTemperature;
use App\Models\Voltage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function clearDb(){
        Current::Truncate();
        Energy::Truncate();
        PlateTemperature::Truncate();
        Power::Truncate();
        Rad::Truncate();
        RoomTemperature::Truncate();
        Voltage::Truncate();

        return response('success', 200);
    }
}
