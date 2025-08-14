<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Clinic;
use App\Models\EpidocsClinic;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        $sedes = Clinic::where('active', 1)->pluck('name', 'id');
        return view('auth.login', compact('sedes'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Verificar si el usuario está activo
            if (!$user->active) {
                Auth::logout();
                return back()->withErrors(['username' => 'El usuario no está activo.']);
            }

            // Verificar si tiene acceso a la sede seleccionada
            $acceso = EpidocsClinic::where('doctor_id', $user->id)
                ->where('clinic_id', $request->input('sedeId'))
                ->first();

            if (!$acceso) {
                Auth::logout();
                return back()->withErrors(['sedeId' => 'No tienes acceso a esta clínica.']);
            }

            // Todo correcto, guardar sede en la sesión
            $request->session()->put('sedeId', $request->sedeId);

//  if ($user->hasRole('epidemiologo')) {
//             return redirect()->route('epidemiologo.dashboard');
//         } elseif ($user->hasRole('admin')) {
//             return redirect()->route('welcome'); // o route('admin.dashboard') si lo tienes
//         } elseif ($user->hasRole('superadmin')) {
//             return redirect()->route('welcome'); // o route('superadmin.dashboard') si lo tienes
//         }


return redirect()->route('welcome');
        }

        return back()->withErrors([
            'username' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
