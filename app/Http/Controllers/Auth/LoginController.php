<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->email = $this->findUsername();
    }

    public function findUsername()
    {
        $user = request()->input('user');
        $fieldType = filter_var($user, FILTER_VALIDATE_EMAIL) ? 'email' : 'no_identitas';
        request()->merge([$fieldType => $user]);
        return $fieldType;
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'Admin') {
            return redirect('/admin');
        } elseif ($user->role === 'Mahasiswa') {
            return redirect('/verified');
        } elseif ($user->role === 'Dosen') {
            return redirect('/admin');
        } else {
            abort(Response::HTTP_NOT_FOUND);
        }
    }
}
