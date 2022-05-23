<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokok extends Model
{
    use HasFactory;
    protected $fillable=['nik', 'spokok','created_at'];
}
