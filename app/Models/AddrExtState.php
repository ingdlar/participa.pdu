<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddrExtState extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function state($country){
        $state = AddrState::where('country_id',$country)->get();
        return $state;
    }
}
