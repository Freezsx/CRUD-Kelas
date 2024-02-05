<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    public function index()
    {
        return view ("student.all", [
            "title"=> "Students",
            "students"=> Student::all() 
        ]);
    }

    public function show($student) 
    {
        return view ("student.detail", [
            "title"=> "detail.student",
            "students"=> Student::find($student),
        ]);
    }

    public function create() 
    {
        return view ("student.create", [
            "title"=> "create.student",
            "kelas" => Kelas::all(),
        ]);
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nis' => 'required|max:255',
            'nama' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'kelas_id' => 'required',
            'alamat' => 'required',
        ]);

        $result = Student::create($validateData);
        if ($result) {
            return redirect("/student/all")->with('success', 'Data siswa berhasil ditambahkan !');
        }
    }

    public function destroy(Student $student) 
    {
        $result = Student::destroy($student->id);
        if ($result) {
            return redirect('/student/all')->with('success', 'Data berhasil dihapus ! ');
        }
    }

    public function edit(Student $student) 
    {
        return view('student.edit', [
            "title" => "Edit Data",
            "student" => $student,
            "kelas" => Kelas::all(),
        ]);
    }

    public function update(Request $request, Student $student) 
    {
        $validateData = $request->validate([
            'nis' => 'required|max:255',
            'nama' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'kelas_id' => 'required',
            'alamat' => 'required',
        ]);

        $result = Student::where('id', $student->id)->update($validateData);
        
        if ($result) {
            return redirect('/student/all')->with('success', 'Data siswa berhasil di ubah ! ');
        }
    }
}