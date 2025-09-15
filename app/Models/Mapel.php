<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mapel extends Model
{
    use HasFactory;

    protected $table = 'mapel';

    protected $fillable = ['nama', 'admin_id', 'type'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function gurus()
    {
        return $this->belongsToMany(Guru::class);
    }


    public function kurikulums()
    {
        return $this->belongsToMany(Kurikulum::class);
    }
}
