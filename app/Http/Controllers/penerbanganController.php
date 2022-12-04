<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class penerbanganController extends Controller
{
     public function index(Request $request) {
        if ($request->has('search')) {
            $datas = DB::select('SELECT penerbangan.id_penerbangan, penerbangan.nomorpenerbangan, penerbangan.keberangkatan, penerbangan.tujuan, foo.nama AS nama_foo, pilot.nama AS nama_pilot, pesawat.registrasi, foo.id_foo, pilot.id_pilot, pesawat.id_pesawat 
            FROM penerbangan
            LEFT JOIN foo 
            ON penerbangan.id_foo=foo.id_foo
            LEFT JOIN pilot
            ON penerbangan.id_pilot=pilot.id_pilot
            LEFT JOIN pesawat
            ON penerbangan.id_pesawat=pesawat.id_pesawat WHERE is_delete = 0 and penerbangan.nomorpenerbangan = :search;', [
                'search'=>$request->search
            ] );

            $datas2 = DB::select('SELECT penerbangan.id_penerbangan, penerbangan.nomorpenerbangan, penerbangan.keberangkatan, penerbangan.tujuan, foo.nama AS nama_foo, pilot.nama AS nama_pilot, pesawat.registrasi, foo.id_foo, pilot.id_pilot, pesawat.id_pesawat 
            FROM penerbangan
            LEFT JOIN foo 
            ON penerbangan.id_foo=foo.id_foo
            LEFT JOIN pilot
            ON penerbangan.id_pilot=pilot.id_pilot
            LEFT JOIN pesawat
            ON penerbangan.id_pesawat=pesawat.id_pesawat WHERE is_delete = 1;');

            return view('penerbangan.index')
                ->with('datas', $datas)
                ->with('datas2', $datas2);
        }else{
            $datas = DB::select('SELECT penerbangan.id_penerbangan, penerbangan.nomorpenerbangan, penerbangan.keberangkatan, penerbangan.tujuan, foo.nama AS nama_foo, pilot.nama AS nama_pilot, pesawat.registrasi, foo.id_foo, pilot.id_pilot, pesawat.id_pesawat 
            FROM penerbangan
            LEFT JOIN foo 
            ON penerbangan.id_foo=foo.id_foo
            LEFT JOIN pilot
            ON penerbangan.id_pilot=pilot.id_pilot
            LEFT JOIN pesawat
            ON penerbangan.id_pesawat=pesawat.id_pesawat WHERE is_delete = 0;');

            $datas2 = DB::select('SELECT penerbangan.id_penerbangan, penerbangan.nomorpenerbangan, penerbangan.keberangkatan, penerbangan.tujuan, foo.nama AS nama_foo, pilot.nama AS nama_pilot, pesawat.registrasi, foo.id_foo, pilot.id_pilot, pesawat.id_pesawat 
            FROM penerbangan
            LEFT JOIN foo 
            ON penerbangan.id_foo=foo.id_foo
            LEFT JOIN pilot
            ON penerbangan.id_pilot=pilot.id_pilot
            LEFT JOIN pesawat
            ON penerbangan.id_pesawat=pesawat.id_pesawat WHERE is_delete = 1;');

            return view('penerbangan.index')
                ->with('datas', $datas)
                ->with('datas2', $datas2);
        }
    
    }

    public function create() {
        $foos = DB::select('select * from foo');
        $pilots = DB::select('select * from pilot');
        $pesawats = DB::select('select * from pesawat');
        return view('penerbangan.add')
                ->with('foos', $foos)
                ->with('pilots', $pilots)
                ->with('pesawats', $pesawats)
                ;
    }

    public function store(Request $request) {
        $request->validate([
            'id_penerbangan' => 'required',
            'nomorpenerbangan' => 'required',
            'keberangkatan' => 'required',
            'tujuan' => 'required',
            'id_pilot' => 'required',
            'id_foo' => 'required',
            'id_pesawat' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO penerbangan(id_penerbangan, nomorpenerbangan, keberangkatan, tujuan, id_pilot, id_foo, id_pesawat) VALUES (:id_penerbangan, :nomorpenerbangan, :keberangkatan, :tujuan, :id_pilot, :id_foo, :id_pesawat)',
        [
            'id_penerbangan' => $request->id_penerbangan,
            'nomorpenerbangan' => $request->nomorpenerbangan,
            'keberangkatan' => $request->keberangkatan,
            'tujuan' => $request->tujuan,
            'id_pilot' => $request->id_pilot,
            'id_foo' => $request->id_foo,
            'id_pesawat' => $request->id_pesawat,
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

        return redirect()->route('penerbangan.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('penerbangan')->where('id_penerbangan', $id)->first();

        return view('penerbangan.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_penerbangan' => 'required',
            'nomorpenerbangan' => 'required',
            'keberangkatan' => 'required',
            'tujuan' => 'required',
            'id_pilot' => 'required',
            'id_foo' => 'required',
            'id_pesawat' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE penerbangan SET id_penerbangan = :id_penerbangan, nomorpenerbangan = :nomorpenerbangan, keberangkatan = :keberangkatan, tujuan = :tujuan, id_pilot = :id_pilot, id_foo = :id_foo, id_pesawat = :id_pesawat  WHERE id_penerbangan = :id',
        [
            'id' => $id,
            'id_penerbangan' => $request->id_penerbangan,
            'nomorpenerbangan' => $request->nomorpenerbangan,
            'keberangkatan' => $request->keberangkatan,
            'tujuan' => $request->tujuan,
            'id_pilot' => $request->id_pilot,
            'id_foo' => $request->id_foo,
            'id_pesawat' => $request->id_pesawat,
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

        return redirect()->route('penerbangan.index')->with('success', 'Data berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM penerbangan WHERE id_penerbangan = :id_penerbangan', ['id_penerbangan' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('penerbangan.index')->with('success', 'Data berhasil dihapus');
    }

    public function softDelete ($id) {
        DB::update('UPDATE penerbangan SET is_delete = 1 WHERE id_penerbangan = :id_penerbangan', ['id_penerbangan' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('penerbangan.index')->with('success', 'Data berhasil dihapus');
    }

    public function restore ($id) {
        DB::update('UPDATE penerbangan SET is_delete = 0 WHERE id_penerbangan = :id_penerbangan', ['id_penerbangan' => $id]);

        // Menggunakan laravel eloquent
        // Admin::where('id_admin', $id)->delete();

        return redirect()->route('penerbangan.index')->with('success', 'Data Penerbangan berhasil dipulihkan');
    }


}