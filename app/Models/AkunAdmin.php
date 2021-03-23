<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AkunAdmin extends Model
{
    protected $table = 'akunadmin';
    public $timestamps = false; //created_at and updated_at jika tidak ada
}
