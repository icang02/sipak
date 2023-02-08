<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDupak extends Model
{
    use HasFactory;
    protected $table = 'data_dupak';
    protected $guarded = [''];
    public $timestamps = false;

    public function pkb()
    {
        return $this->belongsTo(PKB::class);
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
