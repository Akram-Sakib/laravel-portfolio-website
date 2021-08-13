<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    public $table = "courses";
    public $primaryKey = "id";
    public $increamenting = true;
    public $keyType = "int";
    public $timestamps = false;
}
