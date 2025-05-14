<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feria;
use App\Models\Emprendedor;

class FeriaController extends Controller
{
    /**
     * Muestra el listado de ferias.
     */
    public function index()
    {
        $ferias = Feria::with('emprendedores')->get(); // Carga también los emprendedores
        return view('ferias.index', compact('ferias'));
    }

    /**
     * Muestra el formulario para registrar una nueva feria.
     */
    public function create()
    {
        $emprendedores = Emprendedor::all();
        return view('ferias.create', compact('emprendedores'));
    }

    /**
     * Guarda una nueva feria y sus emprendedores asociados.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date',
            'lugar' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'emprendedores' => 'nullable|array',
            'emprendedores.*' => 'exists:emprendedors,id',
        ]);

        $feria = Feria::create($validated);

        if ($request->has('emprendedores')) {
            $feria->emprendedores()->attach($validated['emprendedores']);
        }

        return redirect()->route('ferias.index')->with('success', 'Feria registrada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */

     public function edit(Feria $feria)
    {
        $emprendedores = Emprendedor::all();
        return view('ferias.edit', compact('feria', 'emprendedores'));
    }

    public function update(Request $request, Feria $feria)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date',
            'lugar' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'emprendedores' => 'nullable|array',
            'emprendedores.*' => 'exists:emprendedors,id',
        ]);

        $feria->update($validated);
        $feria->emprendedores()->sync($validated['emprendedores'] ?? []);

        return redirect()->route('ferias.index')->with('success', 'Feria actualizada.');
    }

    public function destroy(Feria $feria)
    {
        $feria->delete();
        return redirect()->route('ferias.index')->with('success', 'Feria eliminada.');
    }
}