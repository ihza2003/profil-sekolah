<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Admin;

class Admin extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $table = 'admins';

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        return true;
    }

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }

    public function ekskul()
    {
        return $this->hasMany(Ekskul::class);
    }
    public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }

    public function program()
    {
        return $this->hasMany(Program::class);
    }

    public function visi()
    {
        return $this->hasOne(Visi::class); // karena 1 admin hanya pegang 1 data visi
    }

    public function struktur()
    {
        return $this->hasOne(StrukturOrganisasi::class);
    }

    public function akreditasi()
    {
        return $this->hasOne(Akreditasi::class);
    }

    public function medsos()
    {
        return $this->hasOne(Medsos::class);
    }

    public function profil()
    {
        return $this->hasOne(Profil::class);
    }

    public function testimoni()
    {
        return $this->hasMany(Testimoni::class);
    }

    public function gurus()
    {
        return $this->hasMany(Guru::class);
    }

    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }

    public function kurikulum()
    {
        return $this->hasMany(Kurikulum::class);
    }

    public function informasiPpdbs()
    {
        return $this->hasMany(InformasiPpdb::class);
    }

    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function sambutan()
    {
        return $this->hasOne(Sambutan::class);
    }

    public function statistik()
    {
        return $this->hasOne(StatistikSekolah::class);
    }
}
