<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Listar todos los empleados
     */
    public function index()
    {
        return response()->json(Employee::all());
    }

    /**
     * Guardar un nuevo empleado
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:employees,email',
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string|max:255',
            'position' => 'required|string|max:100',
            'salary'   => 'required|numeric',
            'skills'   => 'nullable|array',
        ]);

        // Convertir skills a JSON si es un array
        if (isset($validated['skills']) && is_array($validated['skills'])) {
            $validated['skills'] = json_encode($validated['skills']);
        }

        $employee = Employee::create($validated);

        return response()->json($employee, 201);
    }

    /**
     * Mostrar un empleado por id
     */
    public function show(Employee $employee)
    {
        return response()->json($employee);
    }

    /**
     * Actualizar un empleado
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'name'     => 'sometimes|string|max:255',
            'email'    => 'sometimes|email|unique:employees,email,' . $employee->id,
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string|max:255',
            'position' => 'sometimes|string|max:100',
            'salary'   => 'sometimes|numeric',
            'skills'   => 'nullable|array',
        ]);

        if (isset($validated['skills']) && is_array($validated['skills'])) {
            $validated['skills'] = json_encode($validated['skills']);
        }

        $employee->update($validated);

        return response()->json($employee);
    }

    /**
     * Eliminar un empleado
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(null, 204);
    }

    
}
