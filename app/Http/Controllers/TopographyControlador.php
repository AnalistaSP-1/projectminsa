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

    $diagnostics = topography_codes::where('description', 'LIKE', "%$searchTerm%")
        ->orWhere('code', 'LIKE', "%$searchTerm%")
        ->limit(10)
        ->get([
            'code as id',      // Select2 espera "id"
            'description as text' // Select2 espera "text"
        ]);

    return response()->json($diagnostics);
    }

}
