<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegPersonSocialInterest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function RegSocial(){
        $social = RegSocial::find($this->social_id);
        return $social;
        //return $this->hasOne('App\Models\RegSocial');
    }
}
