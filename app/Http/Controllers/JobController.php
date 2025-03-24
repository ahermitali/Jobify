<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\Qualification;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Jobs::all();
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        $qualifications = Qualification::all();
        $categories = Categories::all();
        return view('admin.jobs.create', compact('qualifications', 'categories'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'jobtitle' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'qualification' => 'required|array',
            'category' => 'required|string|max:255',
            'responsibilities' => 'nullable|array',
            'jobdesc' => 'nullable|string',
            'companyname' => 'required|string|max:255',
            'company_location' => 'required|string|max:255',
            'website' => 'nullable|regex:/^(https?:\/\/)?(www\.)?[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}(\/.*)?$/',
            'companydescription' => 'nullable|string',
        ]);

        try {
            
            Jobs::create([
                'jobtitle' => $request->jobtitle,
                'salary' => $request->salary,
                'location' => $request->location,
                'qualification' => json_encode($request->qualification),
                'category' => $request->category,
                'responsibilities' => json_encode($request->responsibilities),
                'jobdesc' => strip_tags($request->jobdesc),
                'companyname' => $request->companyname,
                'company_location' => $request->company_location,
                'website' => $request->website,
                'companydescription' => strip_tags($request->companydescription),
            ]);

            return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Unexpected error: ' . $e->getMessage());
        }
    }

    public function show(Jobs $job, $id)
    {
        return view('jobs.show', compact('job'));
    }

    public function edit(Jobs $job, $id)
    {
        $job = Jobs::findOrFail($id);

        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, Jobs $job, $id)
    {
        $request->validate([
            'jobtitle' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'responsibilities' => 'nullable|array',
            'jobdesc' => 'nullable|string',
            'companyname' => 'required|string|max:255',
            'company_location' => 'required|string|max:255',
            'website' => 'nullable|url',
            'companydescription' => 'nullable|string',
        ]);

        try {
            $job = Jobs::findOrFail($id);

            $job->update([
                'jobtitle' => $request->jobtitle,
                'salary' => $request->salary,
                'location' => $request->location,
                'qualification' => $request->qualification,
                'category' => $request->category,
                'responsibilities' => json_encode($request->responsibilities),
                'jobdesc' => $request->jobdesc,
                'companyname' => $request->companyname,
                'company_location' => $request->company_location,
                'website' => $request->website,
                'companydescription' => $request->companydescription,
            ]);

            return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Unexpected error: ' . $e->getMessage());
        }
    }

    public function destroy(Jobs $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }
}
