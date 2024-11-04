<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beat;
use App\Models\Region;
use App\Models\URole;
use Illuminate\Support\Facades\Auth;

class BeatController extends Controller
{
    public function index()
    {
        $beats = Beat::all();
        $user = Auth::user();
        return view('beats.index', compact('beats'), ['user' => $user]);
    }

    public function create()
    {
        $regions = Region::select('region_zone')->distinct()->get();
        $roles = URole::all();
        $user = Auth::user();
        return view('beats.create', compact('regions', 'roles'), ['user' => $user]);
    }

    public function store(Request $request)
    {
        Beat::create($request->all());
        return redirect()->route('beats.index');
    }

    public function show(Beat $beat)
    {
        $user = Auth::user();
        return view('beats.show', compact('beat'), ['user' => $user]);
    }

    public function edit(Beat $beat)
    {
        $regions = Region::all();
        $roles = URole::all();
        $user = Auth::user();
        return view('beats.edit', compact('beat', 'regions', 'roles'), ['user' => $user]);
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
        $states = Region::where('region_zone', $zoneId)->pluck('state', 'id');
        return response()->json($states);
    }
}
