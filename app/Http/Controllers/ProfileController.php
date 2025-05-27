<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');

            // Delete old image if it exists
            if ($user->profile_image && Storage::disk('public')->exists('profile_images/' . $user->profile_image)) {
                Storage::disk('public')->delete('profile_images/' . $user->profile_image);
            }

            // Store new image
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('profile_images', $filename, 'public');

            $user->profile_image = $filename;
        }

        // Update text fields
        $user->about = $request->input('about');
        $user->vibrant_username = $request->input('vibrant_username');
        $user->facebook = $request->input('facebook');
        $user->instagram = $request->input('instagram');
        $user->tiktok = $request->input('tiktok');
        $user->twitter = $request->input('twitter');
        $user->youtube = $request->input('youtube');

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
