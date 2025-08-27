<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\topography_codes;
class TopographyControlador extends Controller
{
    //
    public function search(Request $request)
    {
          $searchTerm = $request->input('q', '');

        $topo = topography_codes::where('description', 'LIKE', "$searchTerm%")
            ->orWhere('cod', 'LIKE', "$searchTerm%")
            ->limit(10)
            ->get()
            ->map(function ($item){
return[
  'id' => $item->cod,       // ← aquí va el código real
            'text' => $item->description
        ];
            });
            return response()->json($topo);
        }}