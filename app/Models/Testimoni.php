<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimoni extends Model
{

    use HasFactory;
    protected $table = 'testimonis';

    protected $fillable = [
        'foto',
        'nama',
        'posisi',
        'status',
        'isi',
        'video',
        'admin_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
