<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dupak extends Model
{
    use HasFactory;
    protected $table = 'dupak';
    protected $guarded = [''];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function penilai_pak_janjun()
    {
        return $this->belongsTo(TimPenilai::class, 'pak_janjun');
    }

    public function penilai_pak_juldes()
    {
        return $this->belongsTo(TimPenilai::class, 'pak_juldes');
    }
}
