<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\morphology_codes;

class MorfologiaControlador extends Controller
{
 public function search (Request $request){

              $searchTerm = $request->input('q', '');
              $morfo = morphology_codes::where(
                'descripcion', 'LIKE' ,"$searchTerm%")
                ->orWhere('cod','LIKE',"$searchTerm%")
                ->Limit(10)
                ->get()
                ->map(function($item){
                    return[
                        'id' => $item->cod,
                        'text'=>$item->descripcion
                    ];

                });
                return response()->json($morfo);
              


 }
}
