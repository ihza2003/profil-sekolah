<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;
    protected $table = 'programs-unggulan';

    protected $fillable = [
        'judul',
        'isi',
        'gambar',
        'kategori',
        'gambar_tambahan',
        'gambar_cadangan',
        'video',
        'admin_id',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
