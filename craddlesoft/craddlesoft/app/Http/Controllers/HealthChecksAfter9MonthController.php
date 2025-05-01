<?php

namespace App\Http\Controllers;

use App\Models\HealthChecksAfter9Month;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\HealthChecksAfter9MonthRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class HealthChecksAfter9MonthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $healthChecksAfter9Months = HealthChecksAfter9Month::paginate();

        return view('health-checks-after9-month.index', compact('healthChecksAfter9Months'))
            ->with('i', ($request->input('page', 1) - 1) * $healthChecksAfter9Months->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $healthChecksAfter9Month = new HealthChecksAfter9Month();

        return view('health-checks-after9-month.create', compact('healthChecksAfter9Month'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HealthChecksAfter9MonthRequest $request): RedirectResponse
    {
        HealthChecksAfter9Month::create($request->validated());

        return Redirect::route('health-checks-after9-months.index')
            ->with('success', 'HealthChecksAfter9Month created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $healthChecksAfter9Month = HealthChecksAfter9Month::find($id);

        return view('health-checks-after9-month.show', compact('healthChecksAfter9Month'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $healthChecksAfter9Month = HealthChecksAfter9Month::find($id);

        return view('health-checks-after9-month.edit', compact('healthChecksAfter9Month'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HealthChecksAfter9MonthRequest $request, HealthChecksAfter9Month $healthChecksAfter9Month): RedirectResponse
    {
        $healthChecksAfter9Month->update($request->validated());

        return Redirect::route('health-checks-after9-months.index')
            ->with('success', 'HealthChecksAfter9Month updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        HealthChecksAfter9Month::find($id)->delete();

        return Redirect::route('health-checks-after9-months.index')
            ->with('success', 'HealthChecksAfter9Month deleted successfully');
    }
}
