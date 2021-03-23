<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $table = 'informasi';
    public $timestamps = false; //created_at and updated_at jika tidak ada
}
