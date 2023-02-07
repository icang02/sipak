<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimPenilai extends Model
{
    use HasFactory;
    protected $table = 'tim_penilai';
    protected $guarded = [''];
    public $timestamps = false;

    public function dupak_janjun()
    {
        return $this->hasMany(Dupak::class, 'pak_janjun');
    }
    public function dupak_juldes()
    {
        return $this->hasMany(Dupak::class, 'pak_juldes');
    }
}
