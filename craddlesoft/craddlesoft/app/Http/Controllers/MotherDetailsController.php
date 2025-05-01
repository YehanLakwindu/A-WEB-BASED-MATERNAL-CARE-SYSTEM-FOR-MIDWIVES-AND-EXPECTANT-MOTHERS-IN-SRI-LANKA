<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mothersdata;

class MotherDetailsController extends Controller
{
    /**
     * Show the form to input mother's ID.
     */
    public function showForm()
    {
        return view('mother_details.form');
    }

    /**
     * Handle the form submission and display month-wise details.
     */
    public function fetchDetails(Request $request)
    {
        $request->validate([
            'mother_id' => 'required|string|exists:mothersdatas,id',
        ]);

        // Fetch the mother and her health tracking details
        $mother = Mothersdata::with([
            'healthTrackingsAfter3Month',
            'healthTrackingsAfter6Month',
            'healthTrackingsAfter9Month',
        ])->where('id', $request->mother_id)->first();

        // Pass the data to the Blade view
        return view('mother_details.details', compact('mother'));
    }
}
