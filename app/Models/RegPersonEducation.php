<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegPersonEducation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function RegEducation(){
        $education = RegEducation::find($this->education_id);
        return $education;
        //return $this->hasOne('App\Models\RegEducation');
    }
}
