<?php

namespace App\Models;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        "nis",
        "nama",
        "tanggal_lahir",
        "kelas_id",
        "alamat",
    ];

    public function kelas() 
    {
        return $this->belongsTo(Kelas::class);
    }
}
