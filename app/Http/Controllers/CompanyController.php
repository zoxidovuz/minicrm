<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CompanyController extends Controller
{
    public function index(): View
    {
        $companies = Company::query()->latest()->paginate(10);
        return view('companies.index', ['companies' => $companies]);
    }

    public function create(): View
    {
        return view('companies.create');
    }

    public function store(CompanyCreateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if ($request->hasFile('logo')) {
            $request->file('logo')?->store('public/companies');
            $data['logo'] = $request->file('logo')?->hashName();
        }
        $company = Company::query()->create($data);

        return redirect()->route('companies.show', $company);
    }

    public function show(Company $company): View
    {
        return view('companies.show', ['company' => $company]);
    }

    public function edit(Company $company): View
    {
        return view('companies.edit', ['company' => $company]);
    }

    public function update(CompanyUpdateRequest $request, Company $company): RedirectResponse
    {
        $company->update($request->validated());
        return redirect()->route('companies.show', $company);
    }

    public function destroy(Company $company): RedirectResponse
    {
        $company->delete();
        return redirect()->route('companies.index');
    }
}
