<?php

namespace App\Http\Controllers;

use App\Models\BabyVaccination;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BabyVaccinationRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BabyVaccinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $motherId = $request->input('mother_id'); // Get the `mother_id` from the request
        $vaccineName = $request->input('vaccine_name'); // Get the `vaccine_name` from the request

        // Fetch baby vaccinations, optionally filtering by `mother_id` and `vaccine_name`
        $babyVaccinations = BabyVaccination::when($motherId, function ($query, $motherId) {
            $query->whereHas('baby', function ($q) use ($motherId) {
                $q->where('mother_id', 'like', '%' . $motherId . '%'); // Join and filter by mother_id
            });
        })
            ->when($vaccineName, function ($query, $vaccineName) {
                $query->where('vaccine_name', $vaccineName); // Filter by vaccine_name
            })
            ->with('baby') // Ensure baby details are loaded
            ->paginate();

        return view('baby-vaccination.index', compact('babyVaccinations'))
            ->with('i', ($request->input('page', 1) - 1) * $babyVaccinations->perPage());
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $babyVaccination = new BabyVaccination();

        return view('baby-vaccination.create', compact('babyVaccination'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BabyVaccinationRequest $request): RedirectResponse
    {
        BabyVaccination::create($request->validated());

        return Redirect::route('baby-vaccinations.index')
            ->with('success', 'BabyVaccination created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $babyVaccination = BabyVaccination::find($id);

        return view('baby-vaccination.show', compact('babyVaccination'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $babyVaccination = BabyVaccination::find($id);

        return view('baby-vaccination.edit', compact('babyVaccination'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BabyVaccinationRequest $request, BabyVaccination $babyVaccination): RedirectResponse
    {
        $babyVaccination->update($request->validated());

        return Redirect::route('baby-vaccinations.index')
            ->with('success', 'BabyVaccination updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        BabyVaccination::find($id)->delete();

        return Redirect::route('baby-vaccinations.index')
            ->with('success', 'BabyVaccination deleted successfully');
    }
}
