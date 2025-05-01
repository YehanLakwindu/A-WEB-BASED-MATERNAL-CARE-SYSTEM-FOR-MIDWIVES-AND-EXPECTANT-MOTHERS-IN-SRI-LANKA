<?php

namespace App\Http\Controllers;

use App\Models\BabyDetail;
use App\Models\Mothersdata;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\BabyHealthCheckup;

class PDFController extends Controller
{
    /**
     * Generate and download a sample PDF.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {
        // Fetch mother's data using the dynamic ID
        $mothersdata = Mothersdata::find($id);

        // Check if data exists
        if (!$mothersdata) {
            return redirect()->back()->with('error', 'No data found for the specified ID.');
        }

        // Generate the PDF using the view and data
        $pdf = Pdf::loadView('pdf', compact('mothersdata'));

        // Adjust paper size and orientation if necessary
        $pdf->setPaper('A4', 'portrait');

        // Return the PDF download
        return $pdf->download('pdf' . $id . '.pdf');
    }

    /**
     * Generate and download a final medical report for a mother.
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function generateMedicalReport($id)
    {
        // Fetch mother's data along with health tracking details
        $mothersdata = Mothersdata::with([
            'healthTrackingsAfter3Month',
            'healthTrackingsAfter6Month',
            'healthTrackingsAfter9Month',
        ])->find($id);

        // Check if the mother exists
        if (!$mothersdata) {
            return redirect()->back()->with('error', 'No data found for the specified ID.');
        }

        // Generate the PDF using the view and data
        $pdf = Pdf::loadView('pdf.medical_report', compact('mothersdata'));

        // Set paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        // Return the PDF download
        return $pdf->download('Medical_Report_' . $id . '.pdf');
    }

    /**
     * Generate and download a vaccination report for all babies linked to a mother ID.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function generateVaccinationReportByMotherId(Request $request)
    {
        $motherId = $request->input('mother_id'); // Get the mother_id from the request

        // Fetch all babies and their vaccinations for the given mother ID
        $babies = BabyDetail::with('vaccinations')->where('mother_id', $motherId)->get();

        // Check if babies exist for the mother
        if ($babies->isEmpty()) {
            return redirect()->route('babyvaccination.form')
                ->with('error', 'No baby data found for the specified Mother ID.');
        }

        // Generate the PDF using the view and data
        $pdf = Pdf::loadView('pdf.vaccination_report', compact('babies'));

        // Set paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        // Return the PDF download
        return $pdf->download('Vaccination_Report_Mother_' . $motherId . '.pdf');
    }


    /**
     * Generate a PDF of baby health details for a specific mother.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function downloadBabyHealthPDF(Request $request)
    {
        // Validate the mother_id input
        $request->validate([
            'mother_id' => 'required|exists:mothersdata,id'
        ]);

        // Fetch mother's data along with associated babies and their health checkups
        $mothersdata = Mothersdata::with(['babies.healthCheckups'])->find($request->input('mother_id'));

        // Check if mother has babies and health checkups
        if (!$mothersdata || $mothersdata->babies->isEmpty()) {
            return redirect()->back()->with('error', 'No baby health data found for the specified Mother ID.');
        }

        // Generate PDF using the view and data
        $pdf = Pdf::loadView('pdf.baby_health_checkups', compact('mothersdata'));

        // Return the PDF as a downloadable file
        return $pdf->download('Baby_Health_Checkups_Mother_' . $mothersdata->id . '.pdf');
    }
}
