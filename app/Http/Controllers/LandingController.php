<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LandingController extends Controller
{

    public function dashboard()
    {
        return view('dashboard');
    }

    public function profil()
    {
        $user = auth()->user()->id;
        return view('profile',compact(['user']));
    }

    public function dataUser()
    {
        $user = User::all();
        return view('user',compact(['user']));
    }

    public function editProfil(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . auth()->user()->id,
            'telepon' => 'required|unique:users,telepon,' . auth()->user()->id,
            'alamat' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
        ],[
            'name.required' => 'Nama anda tidak boleh kosong!',
            'username.required' => 'Username anda tidak boleh kosong!',
            'username.unique' => 'Username sudah digunakan oleh pengguna lain.',
            'telepon.required' => 'Nomor telepon anda tidak boleh kosong!',
            'telepon.unique' => 'Nomor telepon sudah digunakan oleh pengguna lain.',
            'alamat.required' => 'Alamat anda tidak boleh kosong!',
            'email.required' => 'Email anda tidak boleh kosong!',
            'email.unique' => 'Email sudah digunakan oleh pengguna lain.',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'mimes:jpeg,jpg,png,gif',
            ]);

            $foto_file = $request->file('image');
            $filePath = public_path('global/assets/user/');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
            $foto_file->move($filePath, $foto_nama);

            $user = User::find(auth()->user()->id);
            $user->image = $foto_nama;
            $user->save();
        }

        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->telepon = $request->telepon;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profil')->with('success', 'Data Anda telah berhasil di edit');
    }

    public function gantiPassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = Auth::user();
        if (!Hash::check($request->input('current_pw'), $user->password)) {
            return redirect()->route('profil')->with('error', 'Password lama Anda salah!');
        }
        if ($request->password == $request->input('confirmpw')) {
            $user = User::find(auth()->user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('profil')->with('success', 'Password Anda telah berhasil dirubah!');
        }else{
            return redirect()->route('profil')->with('error', 'Konfirmasi password salah!');
        }

    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Anda telah Berhasil Logout');
    }

}
