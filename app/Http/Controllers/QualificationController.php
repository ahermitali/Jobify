<?php

namespace App\Http\Controllers;

use App\Models\Qualification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\QueryException;

class QualificationController extends Controller
{
    public function index()
    {
        $qualifications = Qualification::all();
        return view('admin.qualifications.index', compact('qualifications'));
    }

    public function create()
    {
        return view('admin.qualifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:qualifications|max:255',
        ]);

        try{Qualification::create($request->all());

        return redirect()->route('qualification.index')->with('success', 'Qualification added successfully!');
        }catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Unexpected error: ' . $e->getMessage());
        }
    }

    public function edit(Qualification $qualification, $id)
    {
        $qualification = Qualification::findOrFail($id);
        return view('admin.qualifications.edit', compact('qualification'));
    }

    public function update(Request $request, Qualification $qualification, $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', Rule::unique('qualifications')->ignore($id)],
        ]);

        try {
            $qualification = Qualification::findOrFail($id);
            $qualification->update([
                'name' => $request->name,
            ]);

            return redirect()->route('qualification.index')->with('success', 'Qualification updated successfully!');
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Database error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Unexpected error: ' . $e->getMessage());
        }
    }

    public function destroy(Qualification $qualification, $id)
    {
        $qualification = Qualification::findOrFail($id);
        $qualification->delete();
        return redirect()->route('qualification.index')->with('success', 'Qualification deleted successfully!');
    }
}
