<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalMarketing extends Model
{
    use HasFactory;

    protected $table = "digital_marketing";
    protected $primaryKey = "dm_id";
    
    protected $fillable = ["name","photo","rate","quantity","category"];
    public $timestamps = false;
}
