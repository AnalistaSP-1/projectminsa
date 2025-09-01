<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\code_causas_death;
class CodeCausesDeathController extends Controller
{
  public function search(Request $request)
    {
        $searchTerm = $request->input('q', '');

        $results = code_causas_death::where('descripcion', 'LIKE', "%$searchTerm%")
            ->orWhere('cod', 'LIKE', "%$searchTerm%")
            ->limit(10)
->get(['cod',
 'descripcion as text'
]);
        return response()->json($results);
    }

    
}
