<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\In;

class VisitorModel extends Model
{
    public $table = "visitor";
    public $primaryKey = "id";
    public $increamenting = true;
    public $keyType = "int";
    public $timestamps = false;
}
