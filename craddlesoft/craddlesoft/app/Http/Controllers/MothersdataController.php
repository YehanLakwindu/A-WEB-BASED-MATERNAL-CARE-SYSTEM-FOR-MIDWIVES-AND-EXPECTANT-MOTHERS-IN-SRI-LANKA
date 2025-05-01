<?php

namespace App\Http\Controllers;

use App\Models\Mothersdata;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MothersdataRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MothersdataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // Get the search query from the request
        $search = $request->input('search');

        // Retrieve mothersdata based on the search query
        $mothersdatas = Mothersdata::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->paginate(); // Use paginate() for paginated results

        // Pass data to the view
        return view('mothersdatas.index', compact('mothersdatas', 'search'))
            ->with('i', ($request->input('page', 1) - 1) * $mothersdatas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $mothersdata = new Mothersdata();

        return view('mothersdatas.create', compact('mothersdata'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MothersdataRequest $request): RedirectResponse
    {
        // Store the validated request data in the database
        $mothersdata = Mothersdata::create([
            'full_name' => $request->input('full_name'),
            'national_id' => $request->input('national_id'),
            'date_of_birth' => $request->input('date_of_birth'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'nearest_landmark' => $request->input('nearest_landmark'),
            'husband_name' => $request->input('husband_name'),
            'husband_contact' => $request->input('husband_contact'),
            'husband_occupation' => $request->input('husband_occupation'),
            'stimated_delivery_date' => $request->input('stimated_delivery_date'),
            'last_menstrual_period' => $request->input('last_menstrual_period'),
            'previous_pregnancy_history' => $request->input('previous_pregnancy_history'),
            'known_medical_conditions' => $request->input('known_medical_conditions'),
            'current_health_status' => $request->input('current_health_status'),
            'blood_type' => $request->input('blood_type'),
            'rh_factor' => $request->input('rh_factor'),
            'chronic_illnesses' => $request->input('chronic_illnesses'),
            'allergies' => $request->input('allergies'),
            'previous_surgeries' => $request->input('previous_surgeries'),
            'occupation' => $request->input('occupation'),
            'current_weigh' => $request->input('current_weigh'),
            'mother_contact_number' => $request->input('mother_contact_number'),
        ]);


        // Redirect to the index page with a success message
        return Redirect::route('mothersdatas.index')
            ->with('success', 'Mother data created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $mothersdata = Mothersdata::find($id);

        return view('mothersdatas.show', compact('mothersdata'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $mothersdata = Mothersdata::find($id);

        return view('mothersdatas.edit', compact('mothersdata'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'national_id' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'email' => 'required|string|email|max:255|unique:mothersdatas,email,' . $id, // Ensure unique email for the same ID
            'address' => 'required|string|max:255',
            'nearest_landmark' => 'nullable|string|max:255',
            'husband_name' => 'nullable|string|max:255',
            'husband_contact' => 'nullable|string|max:15',
            'husband_occupation' => 'nullable|string|max:255',
            'stimated_delivery_date' => 'nullable|date',
            'last_menstrual_period' => 'nullable|date',
            'previous_pregnancy_history' => 'nullable|string|max:255',
            'known_medical_conditions' => 'nullable|string|max:255',
            'current_health_status' => 'nullable|string|max:255',
            'blood_type' => 'nullable|string|max:5',
            'rh_factor' => 'nullable|string|max:10',
            'chronic_illnesses' => 'nullable|string|max:255',
            'allergies' => 'nullable|string|max:255',
            'previous_surgeries' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'current_weigh' => 'nullable|string|max:6',
            'mother_contact_number' => 'nullable|string|max:15',
        ]);

        // Find the mother's data record by its ID
        $mothersdata = Mothersdata::findOrFail($id);

        // Update the mother's data using validated input from the request
        $mothersdata->update([
            'full_name' => $request->input('full_name'),
            'national_id' => $request->input('national_id'),
            'date_of_birth' => $request->input('date_of_birth'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'nearest_landmark' => $request->input('nearest_landmark'),
            'husband_name' => $request->input('husband_name'),
            'husband_contact' => $request->input('husband_contact'),
            'husband_occupation' => $request->input('husband_occupation'),
            'stimated_delivery_date' => $request->input('stimated_delivery_date'),
            'last_menstrual_period' => $request->input('last_menstrual_period'),
            'previous_pregnancy_history' => $request->input('previous_pregnancy_history'),
            'known_medical_conditions' => $request->input('known_medical_conditions'),
            'current_health_status' => $request->input('current_health_status'),
            'blood_type' => $request->input('blood_type'),
            'rh_factor' => $request->input('rh_factor'),
            'chronic_illnesses' => $request->input('chronic_illnesses'),
            'allergies' => $request->input('allergies'),
            'previous_surgeries' => $request->input('previous_surgeries'),
            'occupation' => $request->input('occupation'),
            'current_weigh' => $request->input('current_weight'),
            'mother_contact_number' => $request->input('mother_contact_number'),
        ]);

        // Redirect back to the index page with a success message
        return redirect()->route('mothersdatas.index')->with('success', 'Mother data updated successfully!');
    }




    public function destroy($id): RedirectResponse
    {
        Mothersdata::find($id)->delete();

        return Redirect::route('mothersdatas.index')
            ->with('success', 'Mothersdata deleted successfully');
    }
}
