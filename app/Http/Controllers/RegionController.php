<?php
// app/Http/Controllers/RegionController.php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\State;
use App\Models\district;
use App\Models\area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\region_type;

class RegionController extends Controller
{
    public function index()
    {
        $regions = Region::paginate(5);
        $user = Auth::user();
        return view('regions.index', compact('regions'), ['user' => $user]);
    }

    public function create()
    {
        $user = Auth::user();
        $regions_type = region_type::all();
        return view('regions.create', compact('regions_type', 'user'));
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'region_zone' => 'required',
            'state' => 'required', // State name
            'district' => 'required', // District name
            'area' => 'nullable|string', // Area name can be null
            'bzone' => 'nullable|string', // bzone can be null
            'latitude' => 'nullable|numeric', // Latitude can be null
            'longitude' => 'nullable|numeric', // Longitude can be null
        ]);

        // Check if the state with region_zone already exists
        $state = State::where('state', $request->state_name)
            ->where('region_zone_id', $request->region_zone)
            ->first();

        // If state does not exist, create it
        if (!$state) {
            $state = State::create([
                'state' => $request->state_name,
                'region_zone_id' => $request->region_zone
            ]);
        }

        // Create a new district or find existing district
        $district = District::firstOrCreate(
            ['district' => $request->district_name], // Find district by name
            ['state_id' => $state->id] // If not found, create a new one with state_id
        );

        // Create a new area if provided and does not exist yet
        if ($request->area) {
            $area = Area::where('district_id', $district->id)
                ->where('area', $request->area)
                ->first();

            // If area does not exist, create it
            if (!$area) {
                Area::create([
                    'district_id' => $district->id, // Store district ID
                    'area' => $request->area, // Store area name
                    'bzone' => $request->bzone, // Store bzone if provided
                    'latitude' => $request->latitude, // Store latitude if provided
                    'longitude' => $request->longitude, // Store longitude if provided
                ]);
            }
        }

        // Create a new region
        Region::create([
            'region_zone' => $request->region_zone,
            'state' => $request->state_name, // Store state name
            'district' => $request->district_name, // Store district name
            'area' => $request->area, // Store area if provided
            'bzone' => $request->bzone, // Store bzone if provided
            'latitude' => $request->latitude, // Store latitude if provided
            'longitude' => $request->longitude, // Store longitude if provided
        ]);

        return redirect()->route('regions.index')->with('success', 'Region created successfully.');
    }





    public function edit(Region $region)
    {
        $user = Auth::user();
        return view('regions.edit', compact('region'), ['user' => $user]);
    }

    public function update(Request $request, Region $region)
    {
        $request->validate([
            'state' => 'required',
            'district' => 'required',
        ]);

        $region->update($request->all());
        return redirect()->route('regions.index')->with('success', 'Region updated successfully.');
    }

    public function destroy(Region $region)
    {
        // Set `region_id` to null for all employees associated with this region
        Employee::where('region_id', $region->id)->update(['region_id' => null]);

        // Now you can safely delete the region
        $region->delete();

        return redirect()->route('regions.index')->with('success', 'Region deleted successfully.');
    }


    protected $apiKey = '579b464db66ec23bdd000001c5d494b67b12417971849d01c63d59bd'; // Your API Key
    protected $baseApiUrl = 'https://api.data.gov.in/resource/5d36676e-b692-4e62-b5e8-38aa9a48724c';

    public function fetchStates()
    {
        $response = Http::get("{$this->baseApiUrl}?api-key={$this->apiKey}&format=json&limit=1000");

        if ($response->successful()) {
            $records = $response->json()['records'];

            // Extracting unique states and their codes
            $states = [];
            foreach ($records as $record) {
                $state = $record['name_of_the_state_union_territory_and_districts'];
                $stateCode = $record['state_code'];

                if (!isset($states[$stateCode])) {
                    $states[$stateCode] = $state; // Map state code to state name
                }
            }

            return response()->json($states);
        }

        return response()->json([
            'error' => 'Unable to fetch states',
            'status' => $response->status(),
            'message' => $response->body()
        ], 500);
    }


    public function fetchDistricts($stateCode) // Assuming you're passing the state code
    {
        $response = Http::get("{$this->baseApiUrl}?api-key={$this->apiKey}&format=json&limit=1000");

        if ($response->successful()) {
            $records = $response->json()['records'];

            // Filtering districts for the provided state code
            $districts = [];
            foreach ($records as $record) {
                if ($record['state_code'] === $stateCode) {
                    $districts[] = [
                        'name' => $record['name_of_the_state_union_territory_and_districts'],
                        'code' => $record['district_code']
                    ];
                }
            }

            return response()->json($districts);
        }

        return response()->json([
            'error' => 'Unable to fetch districts',
            'status' => $response->status(),
            'message' => $response->body()
        ], 500);
    }
    // app/Http/Controllers/RegionController.php

    public function fetchStatesByRegion($regionZone)
    {
        // Define the region zones and corresponding states in India
        $regions = [
            'North' => ['Jammu and Kashmir', 'Punjab', 'Haryana', 'Uttarakhand', 'Himachal Pradesh'],
            'South' => ['Andhra Pradesh', 'Karnataka', 'Kerala', 'Tamil Nadu', 'Telangana'],
            'East' => ['West Bengal', 'Odisha', 'Bihar', 'Jharkhand', 'Assam'],
            'West' => ['Maharashtra', 'Goa', 'Gujarat', 'Rajasthan', 'Madhya Pradesh']
        ];

        // Fetch states based on region
        $states = $regions[$regionZone] ?? [];

        return response()->json($states);
    }

    public function fetchDistrictsByState($state)
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY');

        // Make an API call to fetch places for the specified state
        $response = Http::get("https://maps.googleapis.com/maps/api/geocode/json", [
            'address' => $state,
            'region' => 'IN',
            'key' => $apiKey
        ]);

        $districts = [];

        if ($response->successful()) {
            $results = $response->json()['results'] ?? [];

            foreach ($results as $result) {
                foreach ($result['address_components'] as $component) {
                    // Extract districts (administrative_area_level_2)
                    if (in_array('administrative_area_level_2', $component['types'])) {
                        $districts[] = $component['long_name'];
                    }
                }
            }
        }

        // Remove duplicates and return unique district names
        $districts = array_unique($districts);

        return response()->json($districts);
    }
}
