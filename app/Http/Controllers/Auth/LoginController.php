<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/my_profile';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Override the login attempt to check for expired account
     */
    protected function attemptLogin(Request $request)
    {
        $credentials = $this->credentials($request);

        // Attempt to get the user
        $user = \App\Models\User::where('email', $credentials['email'])->first();

        if ($user) {
            // Check if the account is expired
            if ($user->expired_at && Carbon::parse($user->expired_at)->isPast()) {
                // Store a custom error message in the session
                session()->flash('expired_account', 'Access expired after one year. Contact support.');
                return false;
            }
        }

        // Proceed with normal login if not expired
        return Auth::attempt($credentials, $request->filled('remember'));
    }

    /**
     * Customize the response on failed login
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $message = session('expired_account') ?? trans('auth.failed');

        throw \Illuminate\Validation\ValidationException::withMessages([
            $this->username() => [$message],
        ]);
    }
}
