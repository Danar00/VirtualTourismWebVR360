<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Kampung extends Model
{
    protected $table = 'kampung';
    public $timestamps = false; //created_at and updated_at jika tidak ada
}
