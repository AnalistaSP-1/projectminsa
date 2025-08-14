<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Clinic;
use App\Models\Role;

class UserController extends Controller
{

public function __construct()
{
// $this->middleware('role:admin');
  $this->middleware('permission:listuser', ['only' => ['index', 'show','create','store',]]);


}


//​🔱​🐵​PAGE Listado de Usuarios​🔱​🐵​
    public function index(){
        // return view('User.list');
$usuarios = User::with('roles')->get(); // Trae todos los usuarios con sus roles
$roles = Role::all(); // aquí traes los roles
$clinics = Clinic::all(); // AÑADIR ESTA LÍNEA

// return view('User.list', compact('usuarios', 'clinics', 'roles'));
return view('Screen.User_edit.list', [
    'users' => $usuarios,
    'clinics' => $clinics,
    'roles' => $roles
]);

}
//​🔱​🐵​PAGE Listado de Usuarios​🔱​🐵​


//​🔱​🐵​PAGE CREACION DE USUARIOS​🔱​🐵​
    public function create(){
        $clinics = Clinic:: all();
        $roles = Role::all(); // aquí traes los roles
        return view('Screen.User_edit.users_create', compact('clinics', 'roles'));
    }
//​🔱​🐵​PAGE CREACION DE USUARIOS​🔱​🐵​



public function store(Request $request)
{   
    $request->validate([
        // 'role_id' => 'required|exists:roles,id',
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'email' => 'required|email|max:255|unique:users,email',
        'cmp' => 'nullable|string|max:255',
        'active' => 'required|boolean',
        'password' => 'required|string|confirmed|min:6',
        'clinics' => 'required|array',
        'clinics.*' => 'exists:clinics,id',
        'active' => 'required|boolean',

    ]);

    // Guardar usuario y almacenar en $user
    $user = User::create([
        'name' => $request->name,
        'document_number' => $request->document_number,
        'username' => $request->username,
        'email' => $request->email,
        'cmp' => $request->cmp,
        'active' => $request->active,
        'password' => bcrypt($request->password),
        //  'role_id' => $request->role_id, //

    ]);
$user->assignRole($request->role);

    // Sincronizar clínicas
    // $user->clinics()->sync($request->clinic_ids);
$user->clinics()->sync($request->clinics);


    return redirect()->route('users.index')->with('success', 'Usuario creado correctamente');
// $roles = Role::all(); // o con where si solo quieres ciertos roles
//     $clinics = Clinic::all(); // como ya lo haces
//     return view('users.create', compact('roles', 'clinics'));
//
}


//​🔱​🐵​PAGE ACTUALIZACION DE USUARIOS​🔱​🐵​

public function update(Request $request, $id)
{
    $usuario = User::findOrFail($id);

    // Validar los datos que vienen del formulario
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $usuario->id,
        'dni' => 'nullable|string|max:20',
        // 'role_id' => 'required|exists:roles,id',
        'clinics' => 'nullable|array',
        'clinics.*' => 'exists:clinics,id',
    ]);

    // Actualizar los datos del usuario
    $usuario->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'document_number' => $request->input('dni'),
        // 'role_id' => $request->input('role_id'),
        'active' => $request->input('active'), 
    ]);

if ($request->has('role_id')) {
$role = Role::find($request->input('role_id'));

if ($role) {
    $usuario->syncRoles($role->name); // Actualiza el rol del usuario
}
}

    // Sincronizar las clínicas (relación muchos a muchos)
    if ($request->has('clinics')) {
        $usuario->clinics()->sync($request->input('clinics'));
    } else {
        // Si no se seleccionó ninguna clínica, se eliminan todas las relaciones
        $usuario->clinics()->sync([]);
    }

    return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
}


//​🔱​🐵​PAGE ACTUALIZACION DE USUARIOS​🔱​🐵​




public function actualizarPerfil(Request $request)
{
    $usuario = User::findOrFail(auth()->id()); // SOLUCIÓN AQUÍ

    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,' . $usuario->id,
        'email' => 'required|email|max:255|unique:users,email,' . $usuario->id,
        'document_number' => 'nullable|string|max:20',
        'cmp' => 'nullable|string|max:255',
    ]);

    $usuario->update([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'document_number' => $request->document_number,
        'cmp' => $request->cmp,
    ]);

    return redirect()->route('perfil')->with('success', 'Perfil actualizado correctamente.');
}


//​🔱​🐵​PAGE  PERFIL​🔱​🐵​

public function perfil()
{
    $user = auth()->user(); // Obtiene al usuario autenticado
    return view('Screen.User_edit.perfil1', compact('user')); // Devuelve la vista con los datos del usuario
}
public function edit($id)
{
$user = User::findOrFail($id);
    $roles = Role::all(); // Asegúrate de importar tu modelo Role
    $clinics = Clinic::all(); // Asegúrate de importar tu modelo Clinic

return view('Screen.User_edit.users_edit', compact('user', 'roles', 'clinics'));
}


}

