<?php

// app/Http/Controllers/StateController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StateController extends Controller
{
    public function getStatesByRegion()
    {
        $states = [
            "'01" => "JAMMU & KASHMIR",
            "'02" => "HIMACHAL PRADESH",
            "'03" => "PUNJAB",
            "'04" => "CHANDIGARH",
            "'05" => "UTTARAKHAND",
            "'06" => "HARYANA",
            "'07" => "NCT OF DELHI",
            "'08" => "RAJASTHAN",
            "'09" => "UTTAR PRADESH",
            "'10" => "BIHAR",
            "'11" => "SIKKIM",
            "'12" => "ARUNACHAL PRADESH",
            "'13" => "NAGALAND",
            "'14" => "MANIPUR",
            "'15" => "MIZORAM",
            "'16" => "TRIPURA",
            "'17" => "MEGHALAYA",
            "'18" => "ASSAM",
            "'19" => "WEST BENGAL",
            "'20" => "JHARKHAND",
            "'21" => "ORISSA",
            "'22" => "CHHATTISGARH",
            "'23" => "MADHYA PRADESH",
            "'24" => "GUJARAT",
            "'25" => "DAMAN & DIU",
            "'26" => "DADRA & NAGAR HAVELI",
            "'27" => "MAHARASHTRA",
            "'28" => "ANDHRA PRADESH",
            "'29" => "KARNATAKA",
            "'30" => "GOA",
            "'31" => "LAKSHADWEEP",
            "'32" => "KERALA",
            "'33" => "TAMIL NADU",
            "'34" => "PUDUCHERRY",
            "'35" => "ANDAMAN & NICOBAR ISLANDS"
        ];

        // Group states by region
        $regions = [
            'North' => [
                "'01",
                "'02",
                "'03",
                "'04",
                "'05",
                "'06",
                "'07",
                "'08",
                "'09"
            ],
            'East' => [
                "'10",
                "'11",
                "'16",
                "'17",
                "'18",
                "'19",
                "'20",
                "'21"
            ],
            'South' => [
                "'28",
                "'29",
                "'30",
                "'31",
                "'32",
                "'33",
                "'34",
                "'35"
            ],
            'West' => [
                "'23",
                "'24",
                "'25",
                "'26",
                "'27"
            ]
        ];

        $groupedStates = [];

        foreach ($regions as $region => $stateKeys) {
            foreach ($stateKeys as $key) {
                if (isset($states[$key])) {
                    $groupedStates[$region][] = $states[$key];
                }
            }
        }

        return response()->json($groupedStates);
    }
}
