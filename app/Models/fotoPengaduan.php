<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class fotoPengaduan extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'foto_pengaduan';
    public $primaryKey = 'id_foto';
}
