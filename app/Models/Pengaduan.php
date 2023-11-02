<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'pengaduan';
    public $primaryKey = 'id_pengaduan';

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_pengadu');
    }
}
