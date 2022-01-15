<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Models\RegRole;
use App\Models\RegContact;
use App\Models\RegPersonEducation;
use App\Models\RegPersonElectiveInterest;
use App\Models\RegPersonSocialInterest;
use App\Models\AddrLocal;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $guarded = ['id','is_active'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function RegRol(){
        $rol = RegRole::find($this->rol_id);
        return $rol;
        //return $this->hasOne(RegRole::class);
    }

    /*public function voteplace(){
        $sex = Voteplace::where('voteplace_id',$this->id)->first();
        return $sex;
    }*/

    public function RegSex(){
        $sex = RegSex::find($this->sex_id);
        return $sex;
    }
    /*public function (){
    }*/
    //Un usuario puede tener muchos contactos (Uno a Muchos)
    public function RegContact(){
        $contacts = RegContact::where('user_id',$this->id)->get();
        return $contacts;

        //return $this->hasMany('App\Models\RegContact','user_id');
    }

    public function Address(){
        $address = AddrLocal::where('user_id',$this->id)->get();
        return $address;

        //return $this->hasMany('App\Models\Address','user_id');
    }

    public function PersonEducation(){
        $education = RegPersonEducation::where('user_id',$this->id)->get();
        return $education;

        //return $this->hasMany('App\Models\RegPersonEducation','user_id');
    }
    public function PersonElectiveInterest(){
        $elective = RegPersonElectiveInterest::where('user_id',$this->id)->get();
        return $elective;

        //return $this->hasMany('App\Models\RegPersonElectiveInterest','user_id');
    }

    public function PersonSocialInterest(){
        $social = RegPersonSocialInterest::where('user_id',$this->id)->get();
        return $social;

        //return $this->hasMany('App\Models\RegPersonSocialInterest','user_id');
    }





}
