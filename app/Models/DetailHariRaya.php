<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailHariRaya extends Model
{
    use HasFactory;
    protected $fillable=['id_hari_raya', 'simpanan','bulan'];
}
