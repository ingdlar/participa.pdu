<?php

namespace App\Http\Livewire\Form\Partials;

use Livewire\Component;
use App\Models\RegSex;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\FormsMailable;
use Illuminate\Support\Facades\Mail;

class PersonalInfo extends Component
{
    public $card;
    public $name;
    public $lastname;
    public $birthday;
    public $sex;
    public $rol;

    public $open = false;

    public $user;

    public function mount(){
        $this->sexes = RegSex::all();

        $this->user =  Auth::user();
        if(!empty($this->user)){
            if(!empty($this->user->card)){
                $this->card = $this->user->card;
            }
            if(!empty($this->user->name)){
                $this->name = $this->user->name;
            }
            if(!empty($this->user->lastname)){
                $this->lastname = $this->user->lastname;
            }
            if(!empty($this->user->birthday)){
                $this->birthday = $this->user->birthday;
            }
            if(!empty($this->user->sex_id)){
                $this->sex = $this->user->sex_id;
            }
            if(!empty($this->user->rol_id)){
                $this->rol = $this->user->rol_id;
            }
        }else{
            return redirect('login');
        }
    }

    public function render()
    {
        return view('livewire.form.partials.personal-info');
    }

    public function savePersonalInfo(){

        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required'],
            'birthday' => ['required'],
            'sex' => ['required'],
        ]);

        $uData = User::find( $this->user->id );

        $uData->name = $this->name;
        $uData->lastname = $this->lastname;
        $uData->birthday = $this->birthday;
        $uData->sex_id = $this->sex;
        //$uData->rol_id = $this->rol;
        $uData->save();

        $this->open = true;

        /*$correo = New FormsMailable;
        Mail::to("juancarlosdlar@gmail.com")->send($correo);*/

    }
}
