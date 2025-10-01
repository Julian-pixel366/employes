<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = Employee::query();

        if ($request->has('email') && $request->email) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->has('min') && $request->has('max')) {
            $query->whereBetween('salary', [$request->min, $request->max]);
        }

        $employees = $query->paginate(10);

        return Inertia::render('Employees/Index', [
            'employees' => $employees,
            'filters' => $request->only(['email', 'min', 'max']),
        ]);
    }

    public function show(Employee $employee)
    {
        return Inertia::render('Employees/Show', [
            'employee' => $employee,
        ]);
    }
}
