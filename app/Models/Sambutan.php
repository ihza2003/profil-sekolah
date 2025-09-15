<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sambutan extends Model
{
    use HasFactory;

    protected $table = 'sambutans';

    protected $fillable = ['isi_sambutan', 'nama_kepala_sekolah', 'foto_kepala_sekolah', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
