<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beat;
use App\Models\CustomerType;
use App\Models\Region;
use App\Models\URole;
use App\Models\Customer;
use App\Models\state;
use App\Models\district;
use App\Models\area;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class BeatController extends Controller
{
    public function index()
    {
        $beats = Beat::with(['state', 'district'])->get();
        $user = Auth::user();
        return view('beats.index', compact('beats'), ['user' => $user]);
    }
 
    public function create()
    {
        $regions = Region::select('region_zone')->distinct()->get();
        $roles = URole::all();
        $user = Auth::user();
        $types = CustomerType::all();
        return view('beats.create', compact('regions', 'roles', 'types'), ['user' => $user]);
    }

    public function store(Request $request)
    {

        $validCustomerTypes = CustomerType::pluck('customer_type')->toArray();
        $request->validate([
            'region_zone_id' => 'required|exists:regions,region_zone',
            'state_id' => 'nullable|exists:regions,id',
            'district_id' => 'nullable|exists:regions,id',
            'area' => 'nullable|string|max:255|exists:regions,id',
            'emp_role_id' => 'required|exists:u_roles,id',
            'customer_type' => ['required'],
            'customer_name' => 'required|string|max:255',
            'beat_1' => 'nullable|string|max:255',
            'beat_2' => 'nullable|string|max:255',
            'beat_3' => 'nullable|string|max:255',
            'beat_4' => 'nullable|string|max:255',
            'beat_5' => 'nullable|string|max:255',
            'beat_6' => 'nullable|string|max:255',
            'beat_7' => 'nullable|string|max:255',
            'beat_8' => 'nullable|string|max:255',
            'beat_9' => 'nullable|string|max:255',
            'beat_10' => 'nullable|string|max:255',
            'beat_11' => 'nullable|string|max:255',
            'beat_12' => 'nullable|string|max:255',
        ]);

        Beat::create($request->all());
        return redirect()->route('beats.index')->with('success', 'Beat created successfully.');
    }


    public function show(Beat $beat)
    {
        $user = Auth::user(); 
        return view('beats.show', compact('beat'), ['user' => $user]);
    }

    public function edit(Beat $beat)
    {
        $states = State::all();


        $districts = District::all();
        $areas = Area::all();
        $regions = Region::select('region_zone')->distinct()->get();
        $roles = URole::all();
        $user = Auth::user();
        $types = CustomerType::all();
        return view('beats.edit', compact('beat', 'states', 'districts', 'areas', 'regions', 'roles', 'types'), ['user' => $user]);
    }

    public function update(Request $request, Beat $beat)
    {
        $beat->update($request->all());
        return redirect()->route('beats.index');
    }

    public function destroy(Beat $beat)
    {
        $beat->delete();
        return redirect()->route('beats.index');
    }
    public function getStates($zoneId)
    {
        // Fetch states based on the selected region zone
        $states = Region::where('region_zone', $zoneId)
            ->select('state')
            ->distinct()
            ->pluck('state', 'state'); // Pluck the state as both key and value to avoid duplicates

        return response()->json($states);
    }

    public function getDistricts($stateName)
    {
        // Log the incoming state name
        Log::info("Fetching districts for state: " . $stateName);

        // Fetch districts based on the selected state name
        $districts = Region::where('state', $stateName)->distinct()->pluck('district', 'id');

        // Log if districts were found
        if ($districts->isEmpty()) {
            Log::info("No districts found for state: " . $stateName);
        }

        return response()->json($districts);
    }



    public function getAreas($districtName)
    {
        Log::info("Fetching areas for district: " . $districtName);
        $areas = Region::where('district', $districtName)->distinct()->pluck('area', 'id');

        if ($areas->isEmpty()) {
            Log::info("No areas found for district: " . $districtName);
        }

        return response()->json($areas);
    }


    public function costumerdropdown(Request $request)

    {

        $data['customers'] = Customer::where("customer_type", $request->customer_id)

            ->get(["customer_name", "id"]);
        return response()->json($data);
    }
}
