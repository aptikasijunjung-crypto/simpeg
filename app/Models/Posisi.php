<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posisi extends Model
{
    protected $table = "posisi";

    protected $fillable = [
        'sub_opd_id',
        'jabatan_id',
        'title',
        'koordinator_id'
    ];
}
