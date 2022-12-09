<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeCreateRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employee::query()->latest()->paginate(20);
        return view('employees.index', ['employees' => $employees]);
    }

    public function create(): View
    {
        $companies = Company::query()->select('id', 'name')->get();
        return view('employees.create', ['companies' => $companies]);
    }

    public function store(EmployeeCreateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $employee = Employee::query()->create($data);
        return redirect()->route('employees.show', $employee);
    }

    public function show(Employee $employee)
    {
        return view('employees.show', ['employee' => $employee]);
    }

    public function edit(Employee $employee)
    {
        $companies = Company::query()->select('id', 'name')->get();
        return view('employees.edit', ['employee' => $employee, 'companies' => $companies]);
    }

    public function update(EmployeeUpdateRequest $request, Employee $employee): RedirectResponse
    {
        $employee->update($request->validated());
        return redirect()->route('employees.show', $employee);
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();
        return redirect()->route('employees.index');
    }

}
