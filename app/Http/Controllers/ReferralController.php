<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReferralController extends Controller
{
    public function showReferrals()
    {
        $user = Auth::user();

        // Fetch referrals based on the logged-in user's referral_code
        $referrals = DB::table('users')
            ->selectRaw('
                ROW_NUMBER() OVER (ORDER BY id DESC) AS seq,
                vibrant_username AS username,
                email,
                referral_code_sub_plan AS `subscription_plan`,
                (referral_code_sub_plan * 49 / 2) AS `commission`
            ')
            ->where('referral_code', $user->registration_code)
            ->orderByDesc('id')
            ->get();

        return view('view_referrals', compact('referrals'));
    }

    public function updateGcash(Request $request)
    {
        $request->validate([
            'gcash_name'   => 'required|string|max:255',
            'gcash_number' => 'required|string|max:20',
        ]);

        $user = $request->user();
        $user->gcash_name = $request->gcash_name;
        $user->gcash_number = $request->gcash_number;
        $user->save();

        return redirect()->back()->with('success', 'GCash details updated successfully!');
    }
}
