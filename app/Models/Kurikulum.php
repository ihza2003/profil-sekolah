<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kurikulum extends Model
{
    use HasFactory;

    protected $table = 'kurikulum';

    protected $fillable = ['nama_kurikulum', 'admin_id'];

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class);
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
