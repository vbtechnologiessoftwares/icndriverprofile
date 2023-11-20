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

        /*$latitude='52.1900';
        $longitude='1.0000';
        $a=Location::selectRaw(
            "*,
            ( 6371 * 
                ACOS( 
                    COS( RADIANS( latitude ) ) * 
                    COS( RADIANS( $latitude ) ) * 
                    COS( RADIANS( $longitude ) - 
                    RADIANS( longitude ) ) + 
                    SIN( RADIANS( latitude ) ) * 
                    SIN( RADIANS( $latitude ) ) 
                ) 
            ) AS distance
        ")
        ->having('distance','<=',30)
        ->orderBy('distance','asc');
        return response()->json($a->paginate(20));*/
    }
    public function listLocationsNear(Request $request)
    {

        if($request->has('location_near_id') && $request->location_near_id !="")
        {
            $q=Location::where('locationid',$request->location_near_id)->first();
            if($q){
                $latitude=$q->latitude;
                $longitude=$q->longitude;
                $distance=$request->distance;
                $a=Location::selectRaw(
                    "*,
                    ( 6371 * 
                        ACOS( 
                            COS( RADIANS( latitude ) ) * 
                            COS( RADIANS( $latitude ) ) * 
                            COS( RADIANS( $longitude ) - 
                            RADIANS( longitude ) ) + 
                            SIN( RADIANS( latitude ) ) * 
                            SIN( RADIANS( $latitude ) ) 
                        ) 
                    ) AS distance
                ")
                ->having('distance','<=',$distance)
                ->orderBy('distance','asc');
               
                return response()->json($a->paginate(40));
            }else{
                //return $this->listLocations($request);
                return response()->json(array());
            }  
        }
        else{
            //return $this->listLocations($request);
            return response()->json(array());
        }
    }



    public function storeLocations(Request $request)
    {
        //dd($request->all());
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
