<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qurban extends Model
{
    use HasFactory;
    protected $fillable=['nik', 'tahun','nominal','totalsimpanan','status'];

}
