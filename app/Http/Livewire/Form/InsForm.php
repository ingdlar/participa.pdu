<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use App\Models\RegSex;
use App\Models\AddrCountry;
use App\Models\AddrLocCity;
use App\Models\AddrLocState;
use App\Models\AddrExtState;
use App\Models\AddrExtCity;
use App\Models\RegSocial;
use App\Models\CoreElectivePosition;

class InsForm extends Component
{
    /* Este componente es para toda la vista,
    los componentes separados, se usaran para actulizacion de los datos */

    public $sexes;
    public $countries;
    public $states;
    public $cities;
    public $extStates;
    public $extCities;
    public $socials;
    public $electives;
    public $directives;

    public $name;
    public $email;
    //public $password;
    public $rol;
    public $card;
    public $lastname;
    public $voteplace;
    public $birthday;
    public $sex;
    public $cel;
    public $countryM;
    public $country;
    public $state;
    public $city;

    public $valid;
    public $noValid;

    public function mount(){

        $this->sexes = RegSex::all();
        $this->countries = AddrCountry::select('id','country')->get();
        $this->socials = RegSocial::select('id','interest')->get();
        $this->electives = CoreElectivePosition::select('id','name')->where('is_internal','=','0')->get();
        $this->directives = CoreElectivePosition::select('id','name')->where('is_internal','=','1')->get();

        $this->valid = '0';
    }

    public function render()
    {
        if ($this->country == 62) {
            $this->states = AddrLocState::select('id','state')->where('country_id',$this->country)->get();
            $this->cities = AddrLocCity::select('id','city')->where('state_id',$this->state)->get();
            //$this->neighborhoods = AddrNeighborhood::select('id','neighborhood')->where('city_id',$this->selectedCity)->get();
            //$this->sectors = AddrSector::select('id','sector')->where('neighborhood_id',$this->selectedNeighborhood )->get();
        } else {
            $this->states = AddrExtState::select('id','state')->where('country_id',$this->country)->get();
            $this->cities = AddrExtCity::select('id','city')->where('state_id',$this->state)->get();
            //$this->neighborhoods = AddrNeighborhood::select('id','neighborhood')->where('city_id',$this->selectedCity)->get();
            //$this->sectors = AddrExtSector::select('id','sector')->where('id',$this->selectedNeighborhood )->get();
        }
        return view('livewire.form.ins-form');
    }

    public function register(){

        $this->noValid == '1';
        $data = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            //'password' => $this->passwordRules(),
            //'rol' => ['required'],
            'card' => ['required', 'string', 'size:11'],
            'lastname' => ['required'],
            'birthday' => ['required'],
            'sex' => ['required'],
            'cel' => ['required'],
            'country' => ['required'],
            'state' => ['required'],
            //'city' => ['required'],

            //'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ]);

        $this->valid = '1';

        //return redirect('register');
    }
}
