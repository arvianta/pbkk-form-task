<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Experience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ExperienceController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function getExperiences()
    {
        $experiences = Experience::paginate(25);


        return view('experiences', ['experiences' => $experiences]);
    }

    public function addExperience(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:50',
            'employment_type' => 'required|string|in:Contract,Full-time,Part-time,Internship',
            'company_name' => 'required|string|max:50',
            'location' => 'required|string|max:50',
            'location_type' => 'required|string|in:On-site,Hybrid,Remote',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'documentation' => 'required|file|max:2048|mimes:jpg,jpeg,png',
            'rating' => 'required|numeric|min:2.50|max:99.99',
        ]);

        if ($request->hasFile('documentation')) {
            $file = $request->file('documentation');

            $path = Storage::putFile('/images', $file);

            $experience = new Experience($validatedData);

            $experience->documentation = $path;

            $experience->save();

            return redirect()->route('experiences');
        }

        // Handle the case when no file is uploaded
        return back()->withInput()->withErrors(['documentation' => 'Please select a file.']);
    }

    public function updateForm($id)
    {
        $experience = Experience::findOrFail($id);
        return view('edit', compact('experience'));
    }

    
    public function updateExperience(Request $request, $id)
    {
        $experience = Experience::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:50',
            'employment_type' => 'required|string|in:Contract,Full-time,Part-time,Internship',
            'company_name' => 'required|string|max:50',
            'location' => 'required|string|max:50',
            'location_type' => 'required|string|in:On-site,Hybrid,Remote',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'documentation' => 'required|max:2048|mimes:jpg,jpeg,png',
            'rating' => 'required|numeric|min:2.50|max:99.99',
        ]);

        $experience->update($validatedData);

        return redirect('/experiences');
    }


    public function deleteExperience($id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();

        return redirect('/experiences');
    }
}
