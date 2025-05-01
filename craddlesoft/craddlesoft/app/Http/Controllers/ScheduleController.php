<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ScheduleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $schedules = Schedule::paginate();

        return view('schedule.index', compact('schedules'))
            ->with('i', ($request->input('page', 1) - 1) * $schedules->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $schedule = new Schedule();

        return view('schedule.create', compact('schedule'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ScheduleRequest $request): RedirectResponse
    {
        Schedule::create($request->validated());

        return Redirect::route('schedules.index')
            ->with('success', 'Schedule created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $schedule = Schedule::find($id);

        return view('schedule.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $schedule = Schedule::find($id);

        return view('schedule.edit', compact('schedule'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ScheduleRequest $request, Schedule $schedule): RedirectResponse
    {
        $schedule->update($request->validated());

        return Redirect::route('schedules.index')
            ->with('success', 'Schedule updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Schedule::find($id)->delete();

        return Redirect::route('schedules.index')
            ->with('success', 'Schedule deleted successfully');
    }
}
