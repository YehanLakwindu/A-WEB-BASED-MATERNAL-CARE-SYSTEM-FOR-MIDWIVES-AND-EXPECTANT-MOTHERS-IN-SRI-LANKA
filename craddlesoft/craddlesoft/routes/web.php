<?php


use Illuminate\Support\Facades\Route;


use App\Http\Controllers\APOController;

use App\Http\Controllers\PDFController;

use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MidwifeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\WhatsAppController;
use App\Http\Controllers\DigitalIdController;
use App\Http\Controllers\BabyDetailController;
use App\Http\Controllers\MotherInfoController;
use App\Http\Controllers\MothersdataController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\MotherDetailsController;
use App\Http\Controllers\HealthTrackingController;
use App\Http\Controllers\PregnancyCheckController;
use App\Http\Controllers\ProfilePictureController;
use App\Http\Controllers\BabyVaccinationController;
use App\Http\Controllers\BabyHealthCheckupController;
use App\Http\Controllers\HealthChecksAfter3MonthController;
use App\Http\Controllers\HealthChecksAfter6MonthController;
use App\Http\Controllers\HealthChecksAfter9MonthController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about'); // Assuming you have the about.blade.php in the resources/views directory
})->name('about');

Route::get('/features', function () {
    return view('features');
})->name('features');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::post('/contact/submit', [ContactController::class, 'store'])->name('contact.submit');
// Route to view the stored contact data
Route::get('/view-contacts', [ContactController::class, 'showContacts'])->name('view.contacts');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('users/{user}/confirm-delete', [UserController::class, 'confirmDelete'])->name('users.confirmDelete');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

require __DIR__ . '/auth.php';
Route::middleware(['auth'])->group(function () {
    // Add route for displaying patients
    Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');


    Route::group(['middleware' => ['auth', 'role:admin']], function () {
        Route::resource('users', UserController::class);
    });

    Route::group(['middleware' => ['auth', 'role:admin|midwives|mother|mohdoctor']], function () {
        Route::resource('mothersdatas', MothersdataController::class);
        Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('generate.pdf');
        Route::resource('doctors', DoctorController::class);

        Route::get('whatsapp', [WhatsAppController::class, 'index']);
        Route::post('whatsapp', [WhatsAppController::class, 'store'])->name('whatsapp.post');
        Route::get('whatsapp', [WhatsAppController::class, 'index'])->name('whatsapp.index');

        Route::get('/send-mail', [MailController::class, 'index'])->name('mail.index');
        Route::post('/send-mail', [MailController::class, 'send'])->name('mail.send');

        Route::resource('health-checks-after9-months', HealthChecksAfter9MonthController::class);


        Route::resource('health-checks-after6-months', HealthChecksAfter6MonthController::class);


        Route::resource('health-checks-after3-months', HealthChecksAfter3MonthController::class);


        // Main Portfolio Page
        Route::get('/pregnancy-checks', [PregnancyCheckController::class, 'index'])->name('pregnancy-checks.index');

        // Create Routes for Specific Stages
        Route::get('/pregnancy-checks/create/{stage}', [PregnancyCheckController::class, 'create'])->name('pregnancy-checks.create');

        // Store Routes for Specific Stages
        Route::post('/pregnancy-checks/store/{stage}', [PregnancyCheckController::class, 'store'])->name('pregnancy-checks.store');


        Route::get('/mother/{motherId}/details', [MotherDetailsController::class, 'getMotherDetails']);

        Route::get('/mother-details', [MotherDetailsController::class, 'showForm'])->name('mother.details.form');


        // Route to fetch and display details
        Route::post('/mother-details', [MotherDetailsController::class, 'fetchDetails'])->name('mother.details.fetch');


        Route::get('/mother/{id}/medical-report', [PDFController::class, 'generateMedicalReport'])->name('mother.medical.report');


        Route::resource('baby-details', BabyDetailController::class);

        Route::resource('baby-vaccinations', BabyVaccinationController::class);

        // Route to display the form
        Route::get('/baby-vaccination-report', function () {
            return view('babyvaccination.form');
        })->name('babyvaccination.form');


        // Route to handle PDF generation based on mother_id
        Route::get('/baby-vaccination-report/generate', [PDFController::class, 'generateVaccinationReportByMotherId'])
            ->name('babyvaccination.report');

        Route::get('/baby-vaccination-report', function () {
            return view('babyvaccination.form');
        })->name('babyvaccination.form');


        Route::resource('baby-health-checkups', BabyHealthCheckupController::class);


        Route::get('/enter-mother-id', [ProfilePictureController::class, 'showMotherIdForm'])
            ->name('mother.id-form');

        Route::get('/mothersdatas/{mother_id}/profile-picture', [ProfilePictureController::class, 'showUploadForm'])
            ->name('profile.uploadForm');

        Route::post('/mothersdatas/{mother_id}/profile-picture', [ProfilePictureController::class, 'store'])
            ->name('profile.store');



        // Show Digital ID page
        Route::get('/digital-id', [DigitalIdController::class, 'showDigitalId'])->name('mother.digitalId');


        // Download Digital ID as PDF
        Route::get('/digital-id/{mother_id}/download', [DigitalIdController::class, 'downloadDigitalId'])->name('mother.downloadDigitalId');

        Route::get('/triposha', function () {
            return view('triposha'); // Make sure this matches the name of your view
        })->name('triposha');


        Route::resource('midwives', MidwifeController::class);
        Route::delete('midwives/{midwife}', [MidwifeController::class, 'destroy'])->name('midwives.destroy');

        Route::resource('schedules', ScheduleController::class);
    });


    Route::controller(FullCalenderController::class)->group(function () {
        Route::get('fullcalender', 'index')->name('fullcalendar');
        Route::post('fullcalenderAjax', 'ajax');


        Route::get('/events', [FullCalenderController::class, 'fetch']);  // Fetch all events
        Route::post('/events', [FullCalenderController::class, 'store']);  // Store a new event
    });



    Route::middleware('auth')->group(function () {
        Route::get('motherapo', [ApoController::class, 'appointments'])->name('motherapo');
    });
});
