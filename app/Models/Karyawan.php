<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans';
    protected $primaryKey = 'id_karyawan';
    protected $fillable = ['nama', 'jabatan', 'departemen', 'kontak'];

    public function peminjamans()
    {
        return $this->hasMany(Peminjaman::class, 'karyawan_id', 'id_karyawan');
    }
}
