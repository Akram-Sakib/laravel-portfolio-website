<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectsModel extends Model
{
    public $table = "projects";
    public $primaryKey = "id";
    public $increamenting = true;
    public $keyType = "int";
    public $timestamps = false;
}