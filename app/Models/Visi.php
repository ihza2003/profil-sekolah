<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visi extends Model
{

    use HasFactory;
    protected $table = 'visi_misi_tujuan';

    protected $fillable = [
        'sejarah',
        'visi',
        'misi',
        'tujuan',
        'admin_id',
    ];

    protected $casts = [
        'misi' => 'array',
        'tujuan' => 'array',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
