<?php

namespace App\Http\Controllers;

use App\Models\HealthChecksAfter6Month;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\HealthChecksAfter6MonthRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class HealthChecksAfter6MonthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $healthChecksAfter6Months = HealthChecksAfter6Month::paginate();

        return view('health-checks-after6-month.index', compact('healthChecksAfter6Months'))
            ->with('i', ($request->input('page', 1) - 1) * $healthChecksAfter6Months->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $healthChecksAfter6Month = new HealthChecksAfter6Month();

        return view('health-checks-after6-month.create', compact('healthChecksAfter6Month'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HealthChecksAfter6MonthRequest $request): RedirectResponse
    {
        HealthChecksAfter6Month::create($request->validated());

        return Redirect::route('health-checks-after6-months.index')
            ->with('success', 'HealthChecksAfter6Month created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $healthChecksAfter6Month = HealthChecksAfter6Month::find($id);

        return view('health-checks-after6-month.show', compact('healthChecksAfter6Month'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $healthChecksAfter6Month = HealthChecksAfter6Month::find($id);

        return view('health-checks-after6-month.edit', compact('healthChecksAfter6Month'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HealthChecksAfter6MonthRequest $request, HealthChecksAfter6Month $healthChecksAfter6Month): RedirectResponse
    {
        $healthChecksAfter6Month->update($request->validated());

        return Redirect::route('health-checks-after6-months.index')
            ->with('success', 'HealthChecksAfter6Month updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        HealthChecksAfter6Month::find($id)->delete();

        return Redirect::route('health-checks-after6-months.index')
            ->with('success', 'HealthChecksAfter6Month deleted successfully');
    }
}
