<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\UsuarioUpdateRequest;
use App\Models\Departaments;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        $filterValue = $request->input('filterValue');
    $usuariosFilter = User::role('Trabajador')
                        ->where('name', 'LIKE', '%' . $filterValue . '%');
    
    // Usa el método `get()` para obtener los resultados de la consulta
    $usuarios = $usuariosFilter->get();
    
    return view('usuarios.index', [
        'usuarios' => $usuarios,
    ]);
    }

    public function create()
    {
        $departaments = Departaments::all();
        return view('usuarios.create', compact('departaments'));

    }

    public function store(UsuarioRequest $request)
    {
        $usuario = $request->all();
        $user = User::create($usuario);
        $user->roles()->sync(3);

        $user->Departaments()->attach($request->input('departament'));

        return redirect()->action([UsuarioController::class, 'index'])
            ->with('succes-create','Trabajador agregado con exito');
    }

    public function show(User $usuarios){
        $usuario = User::find($usuarios->id);

        // $departaments = $usuarios->Departaments()->select('name')->get();
    
        return view('usuarios.show', compact('usuarios' ));
    }    


    public function edit(User $usuarios){
        // $departaments = Departaments::all();
        return view('usuarios.edit', compact('usuarios'));
    }

    public function update(UsuarioUpdateRequest $request, User $usuarios)
    {
        $usuarios = User::find($usuarios->id);
        if(!$usuarios){
            abort(404, 'Trabajador no encontrado');
        }else
        {
            $usuarios->update([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                
            ]);
        }
        return redirect()->action([UsuarioController::class, 'index'])
        ->with('succes-update','Trabajador modificado con exito');
    }

    public function destroy(User $usuarios)
    {
        $usuarios->delete();
        return redirect()->action([UsuarioController::class, 'index'])
        ->with('succes-delete','Trabajador eliminado con exito');
    }


}
