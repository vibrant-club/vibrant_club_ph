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
                email,
                referral_code_sub_plan AS `subscription_plan`,
                (referral_code_sub_plan * 49 / 2) AS `commission`
            ')
            ->where('referral_code', $user->registration_code)
            ->orderByDesc('id')
            ->get();

        return view('view_referrals', compact('referrals'));
    }
}
