<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'nama',
        'tingkat',
        'admin_id',
    ];

    public function kurikulums()
    {
        return $this->belongsToMany(Kurikulum::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
