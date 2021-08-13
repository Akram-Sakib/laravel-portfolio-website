<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewModel extends Model
{
    public $table = "review";
    public $primaryKey = "id";
    public $increamenting = true;
    public $keyType = "int";
    public $timestamps = false;
}
