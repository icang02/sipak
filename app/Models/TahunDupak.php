<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunDupak extends Model
{
    use HasFactory;
    protected $table = 'dupak';
    protected $guarded = [''];
    public $timestamps = false;
}
