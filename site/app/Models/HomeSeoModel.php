<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSeoModel extends Model
{
    public $table = "home_seo";
    public $primaryKey = "id";
    public $increamenting = true;
    public $keyType = "int";
    public $timestamps = false;
}