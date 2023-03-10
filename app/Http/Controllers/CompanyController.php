<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::query()->get();

        return CompanyResource::collection($companies)->all();
    }

    public function store(CompanyRequest $request)
    {
        $company = Company::query()->create([
            'name' => $request->input('name'),
            'director' => $request->input('director'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'phone' => $request->input('phone')

        ]);

        return new CompanyResource($company);
    }

    public function view(Company $company)
    {
        return new CompanyResource($company);
    }

    public function update(Company $company, CompanyRequest $request)
    {
        $company->query()->update([
            'name' => $request->input('name'),
            'director' => $request->input('director'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'phone' => $request->input('phone')

        ]);

        return new CompanyResource($company);
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return response()->json()->setStatusCode(204);
    }
}
