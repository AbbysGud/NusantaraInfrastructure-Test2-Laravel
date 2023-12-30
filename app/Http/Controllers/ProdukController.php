<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return view('produk.index')->with([
            'produk' => Produk::all()
        ]);
    }

    public function create(){
        $produk = Produk::all();
        return view('produk.create',compact(['produk']));
    }

    public function store(Request $request){
        $request->validate([
            'produk_nama' => 'required',
            'produk_harga' => 'required',
            'produk_deskripsi' => 'required',
            'produk_foto' => 'required|mimes:jpeg,jpg,png,gif',
            'produk_status' => 'required',
        ],[
            'produk_nama.required' => 'Nama Buku Harus Diisi!',
            'produk_harga.required' => 'Harga Buku Harus Diisi!',
            'produk_deskripsi.required' => 'Deskripsi Buku Harus Diisi!',
            'produk_foto.required' => 'Gambar Buku Harus Diisi!',
            'produk_foto.mimes' => 'Tipe Gambar Harus Berupa jpeg,jpg,png,gif',
            'produk_status.required' => 'Status Buku Harus Diisi!',
        ]);

        $foto_file = $request->file('produk_foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
        $foto_file->move(public_path('global/assets/produk/'), $foto_nama);

        $produk = new Produk;
        $produk->produk_nama = $request->produk_nama;
        $produk->produk_harga = $request->produk_harga;
        $produk->produk_deskripsi = $request->produk_deskripsi;
        $produk->produk_foto = $foto_nama;
        $produk->produk_status = $request->produk_status;
        $produk->save();

        return to_route('buku')->with('success','Data Berhasil di Tambah.');
    }

    public function edit($id)
    {
        $produk=Produk::findOrFail($id);
        return view('produk.edit',compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'produk_nama' => 'required',
            'produk_harga' => 'required',
            'produk_deskripsi' => 'required',
            'produk_status' => 'required',
        ],[
            'produk_nama.required' => 'Nama Buku Harus Diisi!',
            'produk_harga.required' => 'Harga Buku Harus Diisi!',
            'produk_deskripsi.required' => 'Deskripsi Buku Harus Diisi!',
            'produk_status.required' => 'Status Buku Harus Diisi!',
        ]);

        if ($request->hasFile('produk_foto')) {
            $request->validate([
                'produk_foto' => 'mimes:jpeg,jpg,png,gif',
            ],[
                'produk_foto.mimes' => 'Tipe Gambar Harus Berupa jpeg,jpg,png,gif'
            ]);

            $foto_file = $request->file('produk_foto');
            $filePath = public_path('global/assets/produk/');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('ymdhis') . "." . $foto_ekstensi;
            $foto_file->move($filePath, $foto_nama);

            $produk = Produk::find($id);
            $produk->produk_foto = $foto_nama;
            $produk->save();
        }

        $produk = Produk::find($id);
        $produk->produk_nama = $request->produk_nama;
        $produk->produk_harga = $request->produk_harga;
        $produk->produk_deskripsi = $request->produk_deskripsi;
        $produk->produk_status = $request->produk_status;
        $produk->save();

        return to_route('buku')->with('success','Data Berhasil di Edit.');
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();

        return back()->with('success','Data Berhasil di Hapus!.');
    }
}
