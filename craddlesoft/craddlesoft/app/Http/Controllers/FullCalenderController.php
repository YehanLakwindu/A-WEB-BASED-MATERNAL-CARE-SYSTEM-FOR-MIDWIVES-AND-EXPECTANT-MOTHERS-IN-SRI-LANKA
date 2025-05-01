<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Http\JsonResponse;

class FullCalenderController extends Controller
{
    /**
     * Display the calendar view or return events via AJAX.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
        }

        return view('fullcalender');
    }

    /**
     * Handle AJAX CRUD operations.
     */
    public function ajax(Request $request): JsonResponse
    {
        switch ($request->type) {
            case 'add':
                $event = Event::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'update':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = Event::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                return response()->json(['message' => 'Invalid action.'], 400);
        }
    }

    /**
     * Store a new event.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
        ]);

        $event = Event::create([
            'title' => $validated['title'],
            'start' => $validated['start'],
            'end' => $validated['end'],
        ]);

        return response()->json(['message' => 'Event Created Successfully!']);
    }

    /**
     * Fetch all events.
     */
    public function fetch()
    {
        $events = Event::all();
        return response()->json($events);
    }

    /**
     * Check if the date already has an appointment.
     */
    public function checkDate(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'date' => 'required|date',
        ]);

        $exists = Event::whereDate('start', $validated['date'])->exists();

        if ($exists) {
            return response()->json([
                'exists' => true,
                'message' => 'This date already has an appointment.',
            ]);
        }

        return response()->json([
            'exists' => false,
            'message' => 'This date is available for a new appointment.',
        ]);
    }
}
