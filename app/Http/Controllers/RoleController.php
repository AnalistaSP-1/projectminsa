<?php
namespace App\Http\Controllers;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
class RoleController extends Controller
{
    function __construct()
    {
        // Middleware opcional para permisos
           $this->middleware('permission:listuser', ['only' => ['index', 'show','create','store',]]);

    }

    public function index(Request $request): View
    {
        $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('Screen.Page_edit.roles', compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        $permission = Permission::get();
        return view('Screen.Page_edit.roles_create', compact('permission'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $permissionsID = array_map(
            function($value) { return (int)$value; },
            $request->input('permission')
        );

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($permissionsID);

        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }

    public function show($id): View
    {
        $role = Role::findOrFail($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        // Cambiado para coincidir con tu estructura de carpetas
        return view('Screen.Page_edit.roles_show', compact('role','rolePermissions'));
        
    }

    public function edit($id): View
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        // Cambiado para coincidir con tu estructura de carpetas
        return view('Screen.Page_edit.roles_edit', compact('role','permission','rolePermissions'));
    }
public function update(Request $request, $id): RedirectResponse
{
    $this->validate($request, [
        'name' => 'required',
        'permission' => 'required',
    ]);

    $role = Role::find($id);
    $role->name = $request->input('name');
    $role->save();
// dd($request->input('permission'));
    // Sin conversión a enteros, pasamos directamente los permisos
    $role->syncPermissions($request->input('permission'));

    return redirect()->route('roles.index')
                    ->with('success','Rol actualizado correctamente');
}


    public function destroy($id): RedirectResponse
    {
        Role::find($id)->delete(); // Mejor usar el modelo que DB::table
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}