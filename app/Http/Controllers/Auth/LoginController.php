<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @return string
     */
    protected function redirectTo()
    {
        // Get the currently authenticated user
        $user = auth()->user();

        // Redirect to a specific department page based on the user's department
        switch ($user->department) {
            case 'Ict':
                return '/departments/ict';
            case 'Electrical Engineering':
                return '/departments/electrical-engineering';
            case 'Mechanical Engineering':
                return '/departments/mechanical-engineering';
            case 'Civil Engineering':
                return '/departments/civil-engineering';
            case 'Laboratory Technology':
                return '/departments/laboratory Technology';
            case 'Automotive':
                return '/departments/automotive';
            default:
                return '/home'; // Default fallback if department is not recognized
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Override the username method to use admission_number for login.
     *
     * @return string
     */
    public function username()
    {
        return 'admission_number';
    }

    /**
     * Customize the credentials used for login to include admission_number.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return [
            'admission_number' => $request->input('admission_number'),
            'password' => $request->input('password'),
        ];
    }
}
