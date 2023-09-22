<?php

namespace App\Http\Controllers\Admin\Auth;      //change path name

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('admin.auth.login');
    }
    public function home(): View
    {
        return view('admin.home.dashboard');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(AdminLoginRequest $request): RedirectResponse
    {
        // chenge loginrequest to adminloginrequest and create folder  App\Http\Requests\Auth\AdminLoginRequest
        // dd($request->all());
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::ADMIN_HOME);     //it is define in provider
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
