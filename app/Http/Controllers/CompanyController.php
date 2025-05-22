<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $companies = Company::paginate(config('pagination.count'));
        return view('admin.companies.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companies.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        /** @var Request $request */
        $data = $request->validated();
       // image uploading
        // 1- get image

        $image = $request->image;
        // 2- change it's current name
        $newImageName = time() . '-' . $image->getClientOriginalName();
        // 3- move image to my project
        $image->storeAs('companies', $newImageName, 'public');
        // 4- save new name to database record
        $data['image'] = $newImageName;

        Company::create($data);
        return to_route('admin.companies.index')->with('success',__('keywords.record_created_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('admin.companies.show',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('admin.companies.edit',get_defined_vars());

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        /** @var Request $request */
        $data = $request->validated();
        if ($request->hasFile('image')) {
                // image uploading
                // 0- delete old image
                Storage::delete("public/companies/$company->image");
                // 1- get image
                $image = $request->image;
                // 2- change it's current name
                $newImageName = time() . '-' . $image->getClientOriginalName();
                // 3- move image to my project
                $image->storeAs('companies', $newImageName, 'public');
                // 4- save new name to database record
                $data['image'] = $newImageName;
            }
       $company->update($data);
        return to_route('admin.companies.index')->with('success',__('keywords.record_updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return to_route('admin.companies.index')->with('success',__('keywords.record_deleted_success'));
    }
}
