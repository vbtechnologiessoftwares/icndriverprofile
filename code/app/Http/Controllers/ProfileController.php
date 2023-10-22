<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function listLocations(Request $request)
    {
        info("Request data: ". json_encode($request->all()));
        $locations = Location::query();
        if ( $request->filled('search') ){
            $locations->where('town','like', "%{$request->search}%");
        }

        return response()->json($locations->paginate(20));
    }

    public function storeLocations(Request $request)
    {
        $data = $request->validate([
            'locations' => 'array|min:1',
            'locations.*' => 'exists:locations_master,locationid',
        ]);

        $driver = auth()->user();

        $savedLocationIds = $driver->locations->pluck('locationid')->toArray();
        $newLocationIds = array_unique( array_merge($savedLocationIds, $request->locations));

        $driver->locations()->sync($newLocationIds);

        return response()->json([
            'status' => true,
            'message' => 'Successfull',
        ]);
    }


    public function deleteLocations(Request $request)
    {
        $data = $request->validate([
            'locations' => 'array|min:1',
            'locations.*' => 'exists:locations_master,locationid',
        ]);

        $driver = auth()->user();
        $driver->locations()->detach($data['locations']);

        return response()->json([
            'status' => true,
            'message' => 'Successfull',
        ]);

    }

 
}
