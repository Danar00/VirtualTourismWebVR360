<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Panorama extends Model
{
    protected $table = 'panorama';
    public $timestamps = false; //created_at and updated_at jika tidak ada
}
