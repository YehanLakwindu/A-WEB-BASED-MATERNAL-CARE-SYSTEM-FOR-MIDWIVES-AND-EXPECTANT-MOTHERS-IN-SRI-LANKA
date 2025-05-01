<?php

namespace App\Http\Controllers;

use App\Models\BabyDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BabyDetailRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BabyDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $babyDetails = BabyDetail::paginate();

        return view('baby-detail.index', compact('babyDetails'))
            ->with('i', ($request->input('page', 1) - 1) * $babyDetails->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $babyDetail = new BabyDetail();

        return view('baby-detail.create', compact('babyDetail'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BabyDetailRequest $request): RedirectResponse
    {
        BabyDetail::create($request->validated());

        return Redirect::route('baby-details.index')
            ->with('success', 'BabyDetail created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $babyDetail = BabyDetail::find($id);

        return view('baby-detail.show', compact('babyDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $babyDetail = BabyDetail::find($id);

        return view('baby-detail.edit', compact('babyDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BabyDetailRequest $request, BabyDetail $babyDetail): RedirectResponse
    {
        $babyDetail->update($request->validated());

        return Redirect::route('baby-details.index')
            ->with('success', 'BabyDetail updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        BabyDetail::find($id)->delete();

        return Redirect::route('baby-details.index')
            ->with('success', 'BabyDetail deleted successfully');
    }
}
