<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    protected $fillable = ['user_id', 'perusahaan_id', 'ktp', 
    'cv', 'surat_lamaran', 'ijazah', 'prestasi', 'pengalaman', 'status_penerimaan'];

    public function user(){
            return $this->belongsTo('App\Models\User');
    }
    public function perusahaan (){
            return $this->belongsTo('App\Models\Perusahaan');
        }
}
