<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feria;
use App\Models\Emprendedor;

class EmprendedorController extends Controller
{
    /**
     * Muestra el listado de emprendedores.
     */
    public function index()
    {
        $emprendedores = Emprendedor::with('ferias')->get();
        return view('emprendedores.index', compact('emprendedores'));
    }

    /**
     * Muestra el formulario para registrar un nuevo emprendedor.
     */
    public function create()
    {
        $ferias = Feria::all();
        return view('emprendedores.create', compact('ferias'));
    }

    /**
     * Guarda un nuevo emprendedor en la base de datos.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'telefono' => 'required|string|max:50',
        'rubro' => 'required|string|max:255',
        'ferias' => 'nullable|array',
        'ferias.*' => 'exists:ferias,id',
        ]);

        $emprendedor = Emprendedor::create($validated);

        if ($request->has('ferias')) {
            $emprendedor->ferias()->attach($validated['ferias']);
        }

        return redirect()->route('emprendedores.index')->with('success', 'Emprendedor registrado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    
     public function edit(Emprendedor $emprendedor)
    {
        $ferias = Feria::all();
        return view('emprendedores.edit', compact('emprendedor', 'ferias'));
    }

    public function update(Request $request, Emprendedor $emprendedor)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
            'rubro' => 'required|string|max:255',
            'ferias' => 'nullable|array',
            'ferias.*' => 'exists:ferias,id',
        ]);

        $emprendedor->update($validated);
        $emprendedor->ferias()->sync($validated['ferias'] ?? []);

        return redirect()->route('emprendedores.index')->with('success', 'Emprendedor actualizado.');
    }

    public function destroy(Emprendedor $emprendedor)
    {
        $emprendedor->delete();
        return redirect()->route('emprendedores.index')->with('success', 'Emprendedor eliminado.');
    }
}