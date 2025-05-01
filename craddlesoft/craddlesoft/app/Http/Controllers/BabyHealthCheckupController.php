<?php

namespace App\Http\Controllers;

use App\Models\BabyHealthCheckup;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BabyHealthCheckupRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BabyHealthCheckupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = BabyHealthCheckup::query();

        // Filter by Mother ID
        if ($request->has('mother_id') && !empty($request->input('mother_id'))) {
            $query->whereHas('baby', function ($q) use ($request) {
                $q->where('mother_id', $request->input('mother_id'));
            });
        }

        // Filter by Timeframe
        if ($request->has('timeframe') && !empty($request->input('timeframe'))) {
            $timeframe = $request->input('timeframe');
            $now = now();

            switch ($timeframe) {
                case '1_week':
                    $query->where('checkup_date', '>=', $now->subWeek());
                    break;
                case '2_weeks':
                    $query->where('checkup_date', '>=', $now->subWeeks(2));
                    break;
                case '1_month':
                    $query->where('checkup_date', '>=', $now->subMonth());
                    break;
                case '2_months':
                    $query->where('checkup_date', '>=', $now->subMonths(2));
                    break;
                case '3_months':
                    $query->where('checkup_date', '>=', $now->subMonths(3));
                    break;
            }
        }

        $babyHealthCheckups = $query->paginate(10);

        return view('baby-health-checkup.index', compact('babyHealthCheckups'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $babyHealthCheckup = new BabyHealthCheckup();

        return view('baby-health-checkup.create', compact('babyHealthCheckup'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BabyHealthCheckupRequest $request): RedirectResponse
    {
        BabyHealthCheckup::create($request->validated());

        return Redirect::route('baby-health-checkups.index')
            ->with('success', 'BabyHealthCheckup created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $babyHealthCheckup = BabyHealthCheckup::find($id);

        return view('baby-health-checkup.show', compact('babyHealthCheckup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $babyHealthCheckup = BabyHealthCheckup::find($id);

        return view('baby-health-checkup.edit', compact('babyHealthCheckup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BabyHealthCheckupRequest $request, BabyHealthCheckup $babyHealthCheckup): RedirectResponse
    {
        $babyHealthCheckup->update($request->validated());

        return Redirect::route('baby-health-checkups.index')
            ->with('success', 'BabyHealthCheckup updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        BabyHealthCheckup::find($id)->delete();

        return Redirect::route('baby-health-checkups.index')
            ->with('success', 'BabyHealthCheckup deleted successfully');
    }
}
