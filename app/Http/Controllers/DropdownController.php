<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beat;
use App\Models\CustomerType;
use App\Models\Region;
use App\Models\state;
use App\Models\area;
use App\Models\district;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class DropdownController extends Controller
{
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("region_zone_id", $request->country_id)
            ->get(["state", "id"]);
        return response()->json($data);
    }


    public function fetchDistic(Request $request)
    {
        $data['districts'] = district::where("state_id", $request->state_id)
            ->get(["district", "id"]);
        return response()->json($data);
    }
    public function fetchArea(Request $request)
    {
        $data['area'] = area::where("district_id", $request->district_id)
            ->get(["area", "id"]);
        return response()->json($data);
    }
}
