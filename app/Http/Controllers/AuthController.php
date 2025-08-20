<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        if (!Auth::check()) {
            return redirect('/auth/login')->with('error', 'Harus login dulu untuk mendaftarkan user baru.');
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/auth/login')->with('error', 'Harus login dulu untuk mendaftarkan user baru.');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'User berhasil didaftarkan.');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }


    public function listUsers()
    {
        if (!Auth::check()) {
            return redirect('/auth/login')->with('error', 'Harus login dulu untuk melihat data user.');
        }

        $users = User::all();

        return view('apps.ManageUsers', [
            'users' => $users,
            'topbarTitle' => 'Manage Users'
        ]);
    }

    public function updateUser(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect('/auth/login')->with('error', 'Harus login dulu.');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'User berhasil diperbarui.');
    }

    public function deleteUser($id)
    {
        if (!Auth::check()) {
            return redirect('/auth/login')->with('error', 'Harus login dulu.');
        }

        $user = User::findOrFail($id);
        if ($user->id == Auth::id()) {
            return redirect()->back()->with('error', 'Tidak bisa menghapus akun yang sedang login.');
        }

        $user->delete();

        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/auth/login');
    }
}
