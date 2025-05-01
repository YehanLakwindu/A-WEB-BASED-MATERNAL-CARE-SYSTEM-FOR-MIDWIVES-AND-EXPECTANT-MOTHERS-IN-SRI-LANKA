<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthChecksAfter3Month;
use App\Models\HealthChecksAfter6Month;
use App\Models\HealthChecksAfter9Month;

class PregnancyCheckController extends Controller
{
    /**
     * Display a listing of the recent pregnancy checkups.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve recent checkups for each stage
        $threeMonthChecks = HealthChecksAfter3Month::latest()->take(5)->get();
        $sixMonthChecks = HealthChecksAfter6Month::latest()->take(5)->get();
        $nineMonthChecks = HealthChecksAfter9Month::latest()->take(5)->get();

        // Pass data to the Blade view
        return view('pregnancy_checks', compact('threeMonthChecks', 'sixMonthChecks', 'nineMonthChecks'));
    }

    /**
     * Show the form for creating a new checkup record.
     *
     * @param string $stage
     * @return \Illuminate\View\View
     */
    public function create($stage)
    {
        return view('create_check', compact('stage'));
    }

    /**
     * Store a newly created checkup record in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $stage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $stage)
    {
        // Validate the input data
        $validated = $request->validate([
            'mother_id' => 'required|string|max:10',
            'checkup_date' => 'required|date',
            'weight' => 'required|string|max:50',
            'blood_pressure' => 'required|string|max:255',
            'glucose_level' => 'required|string|max:50',
            'hemoglobin_level' => 'required|string|max:50',
            'notes' => 'nullable|string',
        ]);

        // Determine the model to use based on the stage
        if ($stage === '3-month') {
            HealthChecksAfter3Month::create($validated);
        } elseif ($stage === '6-month') {
            HealthChecksAfter6Month::create($validated);
        } elseif ($stage === '9-month') {
            $validated['risk_of_complications'] = $request->input('risk_of_complications', 'Unknown');
            HealthChecksAfter9Month::create($validated);
        } else {
            return redirect()->route('pregnancy-checks.index')->withErrors('Invalid stage provided.');
        }

        return redirect()->route('pregnancy-checks.index')->with('success', 'Checkup record created successfully!');
    }
}
