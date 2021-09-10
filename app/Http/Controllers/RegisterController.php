<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Register'
        ];
        return view('register.index', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:191',
            'username' => 'required|min:3|max:191|unique:users,username',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|confirmed|min:5|max:191',
        ], [
            'name.required' => 'Nama harus diisi!',
            'name.max' => 'Nama maksimal 191 karakter!',
            'username.min' => 'Username minimal 3 karakter!',
            'username.max' => 'Username maksimal 191 karakter!',
            'username.unique' => 'Username tersebut sudah ada!',
            'email.email' => 'Format email salah!',
            'email.unique' => 'Email tersebut sudah ada!',
            'password.confirmed' => 'Confirm password tidak cocok!',
            'password.min' => 'Password minimal 3 karakter!',
            'password.max' => 'Password maksimal 191 karakter!',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password'], ['rounds' => 12]);

        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration successfull ! Please login');;
    }
}
