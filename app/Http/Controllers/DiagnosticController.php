<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnostic;
class DiagnosticController extends Controller
{
     public function search(Request $request)
    {
        $searchTerm = $request->input('q', '');

        $diagnostics = Diagnostic::where('description', 'LIKE', "%$searchTerm%")
            ->orWhere('code', 'LIKE', "%$searchTerm%")
            ->limit(10)
            ->get(['code as id', 'description as text']);

        return response()->json($diagnostics);
    }
}
