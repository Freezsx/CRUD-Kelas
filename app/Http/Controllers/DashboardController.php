<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Dashboard"; 
        return view('dashboard.all.all', compact('title'));
    }

    public function all()
    {
        if(!Auth::check()) return redirect('/login');

        return view('dashboard.all.all', [
            "title" => "Dashboard"
        ]);
    }

    public function studentSearch(Request $request) {
        $search = $request->input('search');
        $students = Student::where('nis', 'like', "%$search%")
                            ->orWhere('nama', 'like', "%$search%")
                            ->paginate(10);
        
        return view('dashboard.student.all', [
            "title" => "Students",
            "students" => $students,
        ]);
    }

    public function studentAll()
    {
    $students = Student::all(); 
    return view('dashboard.student.all', [
        "title" => "Students",
        "students" => $students,
    ]);
    }


    public function studentShow($student)
    {
        return view ('dashboard.student.detail', [
            'title' => 'detail-student',
            'student' => Student::find($student)
        ]);
    }
    
    public function studentCreate() {
        return view ('dashboard.student.create', [
            'title' => 'Add Data',
            'kelas' => Kelas::all()
        ]);
    }

    public function studentAdd(Request $request) {
        $validateData = $request->validate([
            "nis"           => "required|max:255",
            "nama"          => "required|max:255",
            "tanggal_lahir" => "required",
            "kelas_id"      => "required",
            "alamat"        => "required",
        ]);
    
        $dataNis = Student::where('nis',$validateData['nis'])->first();
        if ($dataNis) {
            return back()->withInput()->with('error Nis', 'NIS Siswa sudah terdaftar');
        }

        $result = Student::create($validateData);

        if($result) {
            return redirect('dashboard/student/all')->with('success', 'Data siswa berhasil ditambahkan');
        }
    }

    public function studentEdit(Student $student) 
    {
        return view('dashboard.student.edit', [
            'title' => 'Edit Data',
            'student' => $student,
            'kelas' => Kelas::all(),
        ]);
    }

    public function studentUpdate(Request $request, Student $student) {
        $validateData = $request->validate([
            "nis"           => "required|max:255",
            "nama"          => "required|max:255",
            "tanggal_lahir" => "required",
            "kelas_id"      => "required",
            "alamat"        => "required",
        ]);

        $result = Student::where('id', $student-> id)->update($validateData);
        if($result) {
            return redirect('dashboard/student/all')->with('success', 'Data siswa berhasil diubah !');
        }
    }

    public function studentDestroy(Student $student) 
    {
        $result = Student::destroy($student->id);
        
        if($result) {
            return redirect('dashboard/student/all')->with('success', 'Data berhasil dihapus !');
        }
    }

    public function kelasAll()
    {
        return view ('dashboard.kelas.all', [
            "title" => "Kelas",
            "kelas" => Kelas::all(),
        ]);
    }

    public function kelasSearch(Request $request)
    {
        $search = $request->input('search');

        $kelas = Kelas::where('kelas_siswa', 'LIKE', "%$search%")
                           ->get();

        return view('dashboard.kelas.all', [
            'title' => 'kelas',
            'kelas' => $kelas,
        ]);
    }

    public function kelasCreate() {
        return view ('dashboard.kelas.create', [
            'title' => 'Add Data',
            'kelas' => Kelas::all()
        ]);
    }

    public function kelasAdd(Request $request) {
        $validateData = $request->validate([
            "kelas_siswa" => "required"
        ]);

        $result = Kelas::create($validateData);
        if($result) {
            return redirect('dashboard/kelas/all')->with('success', 'Data kelas berhasil ditambahkan');
        }
    }

    public function kelasEdit(Kelas $kelas) 
    {
        return view('dashboard.kelas.edit', [
            'title' => 'Edit Data',
            'kelas' => $kelas
        ]);
    }

    public function kelasUpdate(Request $request, Kelas $kelas) {
        $validateData = $request->validate([
            "kelas_siswa" => "required",
        ]);

        $result = Kelas::where('id', $kelas->id)->update($validateData);
        if($result) {
            return redirect('dashboard/kelas/all')->with('success', 'Data kelas berhasil diubah !');
        }
    }

    public function kelasDestroy(Kelas $kelas) 
    {
        $result = Kelas::destroy($kelas->id);
        
        if($result) {
            return redirect('dashboard/kelas/all')->with('success', 'Data berhasil dihapus !');
        }
    }

    public function kelasShow($kelas)
    {
        return view ('dashboard.kelas.detail', [
            'title' => 'detail kelas',
            'kelas' => Kelas::find($kelas)
        ]);
    }
}
