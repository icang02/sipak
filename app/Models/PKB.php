<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PKB extends Model
{
    use HasFactory;
    protected $table = 'pkb';
    protected $guarded = [''];
    public $timestamps = false;

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
