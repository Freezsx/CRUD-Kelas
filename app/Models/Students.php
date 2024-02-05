<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students 
{
    public static $students = [
        [
            "id"=> 1,
            "nis"=> "05012",
            "nama"=> "Zidan",
            "tanggal_lahir"=> "04-09-2007",
            "kelas"=> "11 PPLG 2",
            "alamat"=> "Garung lor Kudus",
        ],
        [
            "id"=> 2,
            "nis"=> "05001",
            "nama"=> "Damar",
            "tanggal_lahir"=> "24-10-2006",
            "kelas"=> "11 PPLG 2",
            "alamat"=> "Depok",
        ],
        [
            "id"=> 3,
            "nis"=> "05015",
            "nama"=> "Faris",
            "tanggal_lahir"=> "28-09-2007",
            "kelas"=> "11 PPLG 2",
            "alamat"=> "Rembang",
        ],
        [
            "id"=> 4,
            "nis"=> "05013",
            "nama"=> "Abid",
            "tanggal_lahir"=> "27-05-2007",
            "kelas"=> "11 PPLG 2",
            "alamat"=> "Rendeng Kudus",
        ],
        [
            "id"=> 5,
            "nis"=> "04",
            "nama"=> "Arvi",
            "tanggal_lahir"=> "07-09-2007",
            "kelas"=> "11 PPLG 2",
            "alamat"=> "Getas Pejaten Kudus",
        ],
    ];

    public static function all()
    {
        return self::$students;
    }
}
