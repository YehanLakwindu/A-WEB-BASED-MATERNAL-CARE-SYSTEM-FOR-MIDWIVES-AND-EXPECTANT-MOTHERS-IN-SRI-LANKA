<?php

// app/Http/Controllers/UserController.php

// app/Http/Controllers/PatientController.php
// app/Http/Controllers/PatientController.php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the patients.
     *
     * @return \Illuminate\View\View
     */ public function index(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');

        // Retrieve users based on the search query
        $users = User::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->get(); // Use paginate() if you want to paginate the results

        return view('users.indexp', compact('users', 'search'));
    }
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
}
