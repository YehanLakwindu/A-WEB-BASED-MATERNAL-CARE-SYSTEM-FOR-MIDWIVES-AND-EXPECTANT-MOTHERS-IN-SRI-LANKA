<?php

namespace App\Http\Controllers;

use App\Models\Midwife;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MidwifeRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MidwifeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $midwives = Midwife::paginate();

        return view('midwife.index', compact('midwives'))
            ->with('i', ($request->input('page', 1) - 1) * $midwives->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $midwife = new Midwife();

        return view('midwife.create', compact('midwife'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MidwifeRequest $request): RedirectResponse
    {
        // Automatically generate the midwife_id
        $midwifeId = 'MD' . str_pad(Midwife::count() + 1001, 4, '0', STR_PAD_LEFT);

        // Add midwife_id to validated data
        $validatedData = $request->validated();
        $validatedData['midwife_id'] = $midwifeId;

        // Store the data
        Midwife::create($validatedData);

        return Redirect::route('midwives.index')
            ->with('success', 'Midwife created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $midwife = Midwife::find($id);

        return view('midwife.show', compact('midwife'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $midwife = Midwife::find($id);

        return view('midwife.edit', compact('midwife'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MidwifeRequest $request, Midwife $midwife): RedirectResponse
    {
        $midwife->update($request->validated());

        return Redirect::route('midwives.index')
            ->with('success', 'Midwife updated successfully');
    }

    public function destroy(Midwife $midwife): RedirectResponse
    {
        $midwife->delete();

        return Redirect::route('midwives.index')
            ->with('success', 'Midwife deleted successfully');
    }
}
