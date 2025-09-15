<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Akreditasi extends Model
{
    use HasFactory;
    protected $table = 'akreditasis';
    protected $fillable = [
        'gambar',
        'admin_id',
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
