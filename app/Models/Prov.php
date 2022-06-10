<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prov extends Model
{
    use HasFactory;
    protected $table = 'provinces';
    public $timestamps = false; 
    protected $primaryKey = 'id';
}

