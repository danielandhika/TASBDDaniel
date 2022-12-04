<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class fooController extends Controller
{
    public function index() {
        $datas = DB::select('SELECT * FROM foo;');

        return view('foo.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('foo.add');
    }

    public function store(Request $request) {
        $request->validate([
            'id_foo' => 'required',
            'nama' => 'required',
            'email' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO foo (id_foo, nama, email) VALUES (:id_foo, :nama, :email)',
        [
            'id_foo' => $request->id_foo,
            'nama' => $request->nama,
            'email' => $request->email,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::create([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'alamat' => $request->alamat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('foo.index')->with('success', 'Data Admin berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('foo')->where('id_foo', $id)->first();

        return view('foo.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_foo' => 'required',
            'nama' => 'required',
            'email' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE foo SET id_foo = :id_foo, nama = :nama, email = :email WHERE id_foo = :id',
        [
            'id' => $id,
            'id_foo' => $request->id_foo,
            'nama' => $request->nama,
            'email' => $request->email,
        ]
        );

        // Menggunakan laravel eloquent
        // Admin::where('id_penerbangan', $id)->update([
        //     'id_admin' => $request->id_admin,
        //     'nama_admin' => $request->nama_admin,
        //     'alamat' => $request->alamat,
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('foo.index')->with('success', 'Data Admin berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM foo WHERE id_foo = :id_foo', ['id_foo' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('foo.index')->with('success', 'Data Admin berhasil dihapus');
    }
}