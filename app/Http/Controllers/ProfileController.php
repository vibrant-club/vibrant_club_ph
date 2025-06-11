<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // ✅ Add validation for vibrant_username uniqueness
        $request->validate([
            'vibrant_username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'about' => 'nullable|string',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'twitter' => 'nullable|string',
            'youtube' => 'nullable|string',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');

            if ($user->profile_image && Storage::disk('public')->exists('profile_images/' . $user->profile_image)) {
                Storage::disk('public')->delete('profile_images/' . $user->profile_image);
            }

            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('profile_images', $filename, 'public');
            $user->profile_image = $filename;
        }

        // Update other profile fields
        $user->about = $request->input('about');
        $user->vibrant_username = $request->input('vibrant_username');
        $user->facebook = $request->input('facebook');
        $user->instagram = $request->input('instagram');
        $user->tiktok = $request->input('tiktok');
        $user->twitter = $request->input('twitter');
        $user->youtube = $request->input('youtube');
        $user->save();

        if ($request->filled('tags')) {
            $tagNames = explode(',', $request->input('tags'));

            // Clean up tag names: trim and filter empty strings
            $tagNames = array_filter(array_map('trim', $tagNames));

            $tagIds = [];
            foreach ($tagNames as $name) {
                // firstOrCreate ensures new tags are added if they don't exist
                $tag = Tag::where('name', $name)->first();
                if ($tag) {
                    $tagIds[] = $tag->id;
                }
            }

            $user->tags()->sync($tagIds);
        } else {
            $user->tags()->detach();
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function showPublicProfile($vibrant_username)
    {
        $user = User::where('vibrant_username', $vibrant_username)->firstOrFail();
        return view('profile-public', compact('user'));
    }
}
