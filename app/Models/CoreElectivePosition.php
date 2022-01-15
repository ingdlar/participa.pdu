<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreElectivePosition extends Model
{
    use HasFactory;

    protected $connection = 'mysql_core';
    protected $table = 'core_elective_positions';

    protected $guarded = ['id'];
}
