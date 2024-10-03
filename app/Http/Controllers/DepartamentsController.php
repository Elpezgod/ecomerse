<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartamentsRequest;
use App\Models\Departaments;
use App\Models\Specialty;
use Illuminate\Http\Request;
use League\CommonMark\Node\Block\Document;

class DepartamentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterValue = $request->input('filterValue');
    $departamentFilter = Departaments::where('name', 'LIKE', '%' . $filterValue . '%');
    
    // Usa el método `get()` para obtener los resultados de la consulta
    $departaments = $departamentFilter->get();
    
    return view('departament.index', [
        'departaments' => $departaments,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departament.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartamentsRequest $request)
    {
        $departaments = $request->all();
        Departaments::create($departaments);

        return redirect()->action([DepartamentsController::class, 'index'])
            ->with('succes-create','Departamento agregado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departaments $departaments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departaments $departaments)
    {
        return view('departament.edit', compact('departaments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartamentsRequest $request, Departaments $departaments)
    {
        $departaments->update([
            'name' => $request->name,
            
        ]);
        return redirect()->action([DepartamentsController::class, 'index'])
        ->with('succes-update','Departamento modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departaments $departaments)
    {
        $departaments->delete();
        return redirect()->action([DepartamentsController::class, 'index'])
        ->with('succes-delete','Departamento eliminado con exito');
    }

    public function toggleStatus(Departaments $departaments)
    {
        $departaments->update(['estatus' => !$departaments->estatus]);
        return back();
    }


}


