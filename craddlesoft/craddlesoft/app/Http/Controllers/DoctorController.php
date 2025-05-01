<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DoctorRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $doctors = Doctor::paginate();

        return view('doctor.index', compact('doctors'))
            ->with('i', ($request->input('page', 1) - 1) * $doctors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $doctor = new Doctor();

        return view('doctor.create', compact('doctor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DoctorRequest $request): RedirectResponse
    {
        Doctor::create($request->validated());

        return Redirect::route('doctors.index')
            ->with('success', 'Doctor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $doctor = Doctor::find($id);

        return view('doctor.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $doctor = Doctor::find($id);

        return view('doctor.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DoctorRequest $request, Doctor $doctor): RedirectResponse
    {
        $doctor->update($request->validated());

        return Redirect::route('doctors.index')
            ->with('success', 'Doctor updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Doctor::find($id)->delete();

        return Redirect::route('doctors.index')
            ->with('success', 'Doctor deleted successfully');
    }
}
