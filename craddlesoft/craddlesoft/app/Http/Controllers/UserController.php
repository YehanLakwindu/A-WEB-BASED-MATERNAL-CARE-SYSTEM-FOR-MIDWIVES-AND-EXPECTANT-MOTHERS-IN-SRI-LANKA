<?php

namespace App\Http\Controllers;

use Rules\Password;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');

        // Retrieve users based on the search query
        $users = User::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->with('roles')
            ->get(); // Use paginate() if you want to paginate the results

        return view('users.index', compact('users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',  // Confirmed ensures password_confirmation field is validated
            'role' => 'required|string',
        ]);

        // Create the new user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);  // Encrypt the password before saving it
        $user->syncRoles($request->role);  // Assign the role using syncRoles if using Spatie roles

        // Save the user to the database
        $user->save();

        // Redirect to the users index page with a success message
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }




    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Retrieve all roles
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::findOrFail($id);

        // Update user details
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Sync roles
        $user->syncRoles([$request->role]);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        // Find the user and delete
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
    public function confirmDelete($id)
    {
        // Find the user to confirm deletion
        $user = User::findOrFail($id);

        // Show the confirmation view
        return view('users.confirm-delete', compact('user'));
    }
}
