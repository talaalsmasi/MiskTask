<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home')->with('success', 'Logged in successfully');
        }

        return back()->withErrors(['email' => 'Invalid email or password'])->withInput();
    }

    public function BuyerRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|unique:users,phone_number',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'role_id' => 2,
        ]);

        return redirect()->route('ShowLogin')->with('success', 'Account created successfully! ');
    }

    public function SellerRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|unique:users,phone_number',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'role_id' => 1,
        ]);

        return redirect()->route('ShowLogin')->with('success', 'Account created successfully! ');
    }
    public function logout(Request $request)
    {
        Auth::logout(); // تسجيل الخروج
        $request->session()->invalidate(); // إبطال الجلسة
        $request->session()->regenerateToken(); // إعادة توليد التوكن لحماية CSRF

        return redirect('ShowLogin'); // إعادة توجيه المستخدم إلى الصفحة الرئيسية
    }


}

