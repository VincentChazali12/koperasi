<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piutang extends Model
{
    use HasFactory;
    protected $fillable=['usulan','angsuran_pokok','angsuran_jasa','angsuran_total','sisa','waktu','ket','id_piutang'];

}
