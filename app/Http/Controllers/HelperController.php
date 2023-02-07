<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Comuna;

class HelperController extends Controller
{
    public function getComunas(Request $request){
        $comunas = Comuna::select('comuna_id','comuna_nombre')
                    ->where('p.region_id',$request->region)
                    ->join('provincias as p','comunas.provincia_id', 'p.provincia_id')
                    ->join('regiones as r','p.region_id', 'r.region_id')
                    ->get();
        
        return response()->json($comunas);
    }
}
