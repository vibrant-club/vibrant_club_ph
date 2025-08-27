<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/my_profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    // THIS IS THE OLD ONE THAT VALIDATES ONLY THE CODE -------------------------------------------------------------
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['nullable', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'contact_number' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'registration_code_simple' => [
                'required',
                'exists:registration_code_tbl,registration_code_simple',
                function ($attribute, $value, $fail) {
                    $code = DB::table('registration_code_tbl')
                        ->where('registration_code_simple', $value)
                        ->first();

                    if (!$code || $code->status != 0) {
                        $fail('The registration code is invalid or has already been used.');
                    }
                },
            ],
        ]);
    }



    // THIS IS THE NEW THAT IS GIVING FREE ACCESS -------------------------------------------------------------
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'firstname' => ['required', 'string', 'max:255'],
    //         'middlename' => ['nullable', 'string', 'max:255'],
    //         'lastname' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'contact_number' => ['required', 'string', 'max:20'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'registration_code_simple' => [
    //             'required',
    //             function ($attribute, $value, $fail) {
    //                 // Allow unlimited use of 'FREE-ACCESS'
    //                 if ($value === 'FREE-ACCESS') {
    //                     return;
    //                 }

    //                 $code = DB::table('registration_code_tbl')
    //                     ->where('registration_code_simple', $value)
    //                     ->first();

    //                 if (!$code || $code->status != 0) {
    //                     $fail('The registration code is invalid or has already been used.');
    //                 }
    //             },
    //         ],
    //     ]);
    // }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    // THIS IS THE OLD ONE THAT VALIDATES ONLY THE CODE -------------------------------------------------------------
    protected function create(array $data)
    {
        // Get the full registration_code from the simple one
        $code = DB::table('registration_code_tbl')
            ->where('registration_code_simple', $data['registration_code_simple'])
            ->first();

        // Mark code as used
        DB::table('registration_code_tbl')
            ->where('id', $code->id)
            ->update(['status' => 1]);

        // Determine expiration based on sub_plan
        switch ($code->sub_plan) {
            case 0:       // trial plan (1 day)
                $expiredAt = Carbon::now()->addDay();
                break;
            case 1:       // 1 month plan
                $expiredAt = Carbon::now()->addMonth();
                break;
            case 6:       // 6 months plan
                $expiredAt = Carbon::now()->addMonths(6);
                break;
            case 12:      // 1 year plan
                $expiredAt = Carbon::now()->addYear();
                break;
            default:      // fallback if sub_plan is missing
                $expiredAt = Carbon::now()->addMonth();
                break;
        }


        // Create the user
        return User::create([
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'] ?? null,
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'role' => '12',
            'contact_number' => $data['contact_number'],
            'password' => Hash::make($data['password']),
            'referral_code' => $data['referral_code'] ?? null,
            'referral_code_sub_plan' => $code->sub_plan,
            'registration_code' => $code->registration_code_simple,
            'expired_at' => $expiredAt,
            'is_referrer' => '1',
        ]);
    }












    // THIS IS THE OLD ONE THAT VALIDATES ONLY THE CODE -------------------------------------------------------------
    // protected function create(array $data)
    // {
    //     $registrationCode = $data['registration_code_simple'];

    //     // Check if it's not the universal 'FREE-ACCESS' code
    //     if ($registrationCode !== 'FREE-ACCESS') {
    //         // Get the full registration_code from the simple one
    //         $code = DB::table('registration_code_tbl')
    //             ->where('registration_code_simple', $registrationCode)
    //             ->first();

    //         // Mark code as used
    //         DB::table('registration_code_tbl')
    //             ->where('id', $code->id)
    //             ->update(['status' => 1]);

    //         $finalCode = $code->registration_code_simple;
    //     } else {
    //         // No DB lookup or update for FREE-ACCESS
    //         $finalCode = 'FREE-ACCESS';
    //     }

    //     // Set expiration 60 days from now
    //     $expiredAt = Carbon::now()->addDays(60);

    //     return User::create([
    //         'firstname' => $data['firstname'],
    //         'middlename' => $data['middlename'] ?? null,
    //         'lastname' => $data['lastname'],
    //         'email' => $data['email'],
    //         'contact_number' => $data['contact_number'],
    //         'password' => Hash::make($data['password']),
    //         'registration_code' => $finalCode,
    //         'expired_at' => $expiredAt,
    //         'role' => 12,
    //     ]);
    // }
}
