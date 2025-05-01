<?php

namespace App\Http\Controllers;

use App\Models\Mothersdata;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;

class DigitalIdController extends Controller
{
    // Show the Digital ID page with QR code
    public function showDigitalId(Request $request)
    {
        // Retrieve mother_id from the query parameter
        $mother_id = $request->query('mother_id');

        // If mother_id is missing, return 404
        if (!$mother_id) {
            abort(404, 'Mother ID not found');
        }

        // Find the mother by ID
        $mother = Mothersdata::where('id', $mother_id)->firstOrFail();
        $profilePicture = $mother->profilePicture; // Get profile picture

        // Generate QR code using Endroid QR Code
        $qrCode = new QrCode(route('mother.digitalId', ['mother_id' => $mother->id]));
        $writer = new PngWriter();
        $qrCodeImage = $writer->write($qrCode)->getString();

        // Convert QR code image to base64
        $qrCodeBase64 = base64_encode($qrCodeImage);

        // Return the digital ID view with mother data
        return view('digital_id.show', compact('mother', 'profilePicture', 'qrCodeBase64'));
    }


    // Download Digital ID as a PDF
    public function downloadDigitalId($mother_id)
    {
        $mother = Mothersdata::findOrFail($mother_id);  // Get mother data
        $profilePicture = $mother->profilePicture;      // Get the associated profile picture

        // Generate QR code using Endroid QR Code
        $qrCode = new QrCode(route('mother.digitalId', ['mother_id' => $mother->id]));
        $writer = new PngWriter();
        $qrCodeImage = $writer->write($qrCode)->getString();

        // Convert QR code image to base64
        $qrCodeBase64 = base64_encode($qrCodeImage);

        // Load the view and pass data to the PDF
        $pdf = PDF::loadView('digital_id.pdf', compact('mother', 'profilePicture', 'qrCodeBase64'));

        // Return the PDF as a downloadable file
        return $pdf->download('digital_id_' . $mother->id . '.pdf');
    }
}
