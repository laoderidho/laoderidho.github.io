<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    protected $fillable = ['nama_perusahaan', 'email', 'username', 'password', 
    'ket_perusahaan', 'syarat', 'akreditasi', 'logo', 'alamat', 'deskripsi'];
}
