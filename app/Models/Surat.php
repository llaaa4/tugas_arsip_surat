<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    // TAMBAHKAN BARIS INI
    protected $table = 'surat';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // Kita juga bisa tambahkan ini agar form berfungsi nanti
    protected $fillable = [
        'nomor_surat',
        'kategori_id',
        'judul',
        'file_path',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}