<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PiutangMaster extends Model
{
    use HasFactory;
    protected $fillable=['usulan','asuransi','iurankhusus','sisa','waktu','waktusisa','status','id_anggota'];
}
