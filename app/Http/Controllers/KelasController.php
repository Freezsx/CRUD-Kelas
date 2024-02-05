<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        return view ('kelas.all', [
            "title" => "kelass",
            "kelas" => Kelas::all(),
        ]);
    }

    public function create() {
        return view ('kelas.create', [
            'title' => 'Add Data',
            'kelas' => Kelas::all()
        ]);
    }

    public function store(Request $request) {
        $validateData = $request->validate([
            "kelas_siswa" => "required"
        ]);

        $result = Kelas::create($validateData);
        if($result) {
            return redirect('/kelas/all')->with('success', 'Data kelas berhasil ditambahkan');
        }
    }

    public function edit(Kelas $kelas) 
    {
        return view('kelas.edit', [
            'title' => 'Edit Data',
            'kelas' => $kelas,
        ]);
    }

    public function destroy(Kelas $kelas) 
    {
        $result = Kelas::destroy($kelas->id);
        
        if($result) {
            return redirect('/kelas/all')->with('success', 'Data berhasil dihapus !');
        }
    }

    public function show($kelas)
    {
        return view ('kelas.detail', [
            'title' => 'detail-kelass',
            'kelas' => Kelas::find($kelas)
        ]);
    }
}