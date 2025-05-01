<?php

namespace App\Http\Controllers;

use App\Models\ProfilePicture;
use App\Models\Mothersdata;
use Illuminate\Http\Request;

class ProfilePictureController extends Controller
{
    // Show the form to enter Mother ID - Fixed view path
    public function showMotherIdForm()
    {
        return view('profile_picture.mother-id-form');  // This should match the exact path
    }

    // Show the form to upload a profile picture for a given mother
    public function showUploadForm($mother_id)
    {
        $mother = Mothersdata::findOrFail($mother_id);
        return view('profile_picture.upload-image', compact('mother'));
    }

    // Handle the profile picture upload
    public function store(Request $request, $mother_id)
    {
        // Validate the uploaded image
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the uploaded file
        $file = $request->file('profile_picture');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        // Store the file in the public/images folder
        $file->move(public_path('images'), $filename);

        // Save the filename in the database
        ProfilePicture::updateOrCreate(
            ['mother_id' => $mother_id],
            ['filename' => $filename]
        );

        // Flash success message
        session()->flash('success', 'Profile picture uploaded successfully!');
        session()->flash('image', $filename);

        return redirect()->route('profile.uploadForm', ['mother_id' => $mother_id]);
    }
}
