<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {

        if($user = Auth::user()){
            return redirect('dashboard');
        }

        return view('index');
    }

    public function aksilogin(request $request)
    {
        $data = [
            'username' => $request->username,
            'password'=> $request->password,
        ];

        if(Auth::attempt($data)) {
            $request->session()->regenerate();
            $user1 = Auth::user();
            return redirect('dashboard');
        }else{
            return redirect()->route('login')->withErrors('');
        }

       return redirect()->route('login');
    }

    public function register()
    {
       return view('register');
    }

    public function aksiregister(Request $request)
    {
        $request->validate([
            'username' => 'unique:users,username,',
            'telepon' => 'unique:users,telepon,',
            'email' => 'unique:users,email,',
        ],[
            'username.unique' => 'Username sudah digunakan oleh pengguna lain.',
            'telepon.unique' => 'Nomor telepon sudah digunakan oleh pengguna lain.',
            'email.unique' => 'Email sudah digunakan oleh pengguna lain.',
        ]);

        $foto_path = public_path('global/assets/img/default_profile.png');
        $foto_ekstensi = pathinfo($foto_path, PATHINFO_EXTENSION);
        $foto_nama = 'default_profile' . $foto_ekstensi;

        User::Create([
            'name' => $request->name,
            'username' => $request->username,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'image' => $foto_nama,
        ]);
        return view('index');
    }
}
