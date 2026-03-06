<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAuthController extends Controller
{
    /**
     * Show the login form for students.
     */
    public function showLogin()
    {
        // if already authenticated, redirect to aspirasi index
        if (Auth::check()) {
            return redirect()->route('aspirasi.index');
        }

        return view('auth.login');
    }

    /**
     * Handle an authentication attempt.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
           'nis' => 'required',
           'password' => 'required|string'
        ]);



        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('aspirasi.index'));
        }

        return back()->withErrors([
            'nis' => 'NIS atau kata sandi tidak cocok.',
        ])->onlyInput('nis');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::guard('siswa')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function register(){
        return view('auth.register');
    }

    public function store(Request $request){

        $validate = $request->validate([
            'name' => 'string:max:240',
            'nis' => 'unique:siswas,nis',
            'kelas' => 'string',
            'email' => 'unique:siswas,email',
            'password' => 'string',
        ]);

        $validate['password'] = bcrypt($validate['password']);

        $tahun = date('Y');

        $last = \App\Models\Siswa::where('nis', 'like', $tahun.'%')
                    ->max('nis');

        $urutan = $last ? (int)substr($last, 4) + 1 : 1;

        $nis = $tahun . str_pad($urutan, 4, '0', STR_PAD_LEFT);

        $validate['nis'] = $nis;

        try {
            \App\Models\Siswa::create($validate);
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->to('/login');
    }
}
