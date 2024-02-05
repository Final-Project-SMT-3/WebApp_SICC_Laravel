<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $userType = auth()->user()->tipe; // Ambil nilai tipe dari user yang login

        if (in_array($userType, $roles)) {
            if ($userType === 'admin') {
                return redirect('/admin');
            } elseif ($userType === 'mahasiswa') {
                return redirect('/verified');
            }
        }

        return abort(403, 'Unauthorized');
    }
}
