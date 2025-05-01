<?php

namespace App\Http\Controllers;

use App\Models\HealthChecksAfter3Month;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\HealthChecksAfter3MonthRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class HealthChecksAfter3MonthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $healthChecksAfter3Months = HealthChecksAfter3Month::paginate();

        return view('health-checks-after3-month.index', compact('healthChecksAfter3Months'))
            ->with('i', ($request->input('page', 1) - 1) * $healthChecksAfter3Months->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $healthChecksAfter3Month = new HealthChecksAfter3Month();

        return view('health-checks-after3-month.create', compact('healthChecksAfter3Month'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HealthChecksAfter3MonthRequest $request): RedirectResponse
    {
        HealthChecksAfter3Month::create($request->validated());

        return Redirect::route('health-checks-after3-months.index')
            ->with('success', 'HealthChecksAfter3Month created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $healthChecksAfter3Month = HealthChecksAfter3Month::find($id);

        return view('health-checks-after3-month.show', compact('healthChecksAfter3Month'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $healthChecksAfter3Month = HealthChecksAfter3Month::find($id);

        return view('health-checks-after3-month.edit', compact('healthChecksAfter3Month'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HealthChecksAfter3MonthRequest $request, HealthChecksAfter3Month $healthChecksAfter3Month): RedirectResponse
    {
        $healthChecksAfter3Month->update($request->validated());

        return Redirect::route('health-checks-after3-months.index')
            ->with('success', 'HealthChecksAfter3Month updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        HealthChecksAfter3Month::find($id)->delete();

        return Redirect::route('health-checks-after3-months.index')
            ->with('success', 'HealthChecksAfter3Month deleted successfully');
    }
}
