<?php

namespace App\Http\Livewire\Form\Partials;

use Livewire\Component;
use App\Models\AddrLocCity;
use App\Models\AddrLocState;
use App\Models\AddrCountry;
use App\Models\AddrLocNeighborhood;
use App\Models\AddrExtCity;
use App\Models\AddrExterior;
use App\Models\AddrExtState;
use App\Models\AddrLocSector;
use App\Models\AddrExtSector;
use App\Models\AddrLocal;
use App\Models\CoreElectivePosition;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;

class AddrInfo extends Component
{
    //public $neighborhood = '';
    //public $sectors = '';

    public $countries;
    public $states;
    public $cities;
    public $extStates;
    public $extCities;

    public $country;
    public $state;
    public $city;
    public $sector;
    public $street;
    public $residency;

    public $open = false;

    public $addr;
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
        $this->countries = AddrCountry::select('id','country')->get();

        if(!empty($this->user)){
            if( $this->user->is_local == 1 ){
                $this->addr = AddrLocal::where('user_id',$this->user->id)->first();
                if(!empty($this->addr->country_id)){
                    $this->country = $this->addr->country_id;
                }if(!empty($this->addr->state_id)){
                    $this->state = $this->addr->state_id;

                }if(!empty($this->addr->city_id)){
                    $this->city = $this->addr->city_id;

                }if(!empty($this->addr->sector)){
                    $this->sector = $this->addr->sector;

                }if(!empty($this->addr->street)){
                    $this->street = $this->addr->street;

                }if(!empty($this->addr->residency)){
                    $this->residency = $this->addr->residency;
                }
            }else{
                $this->addr = AddrExterior::where('user_id',$this->user->id)->first();
                if(!empty($this->addr->country_id)){
                    $this->country = $this->addr->country_id;
                }
                if(!empty($this->addr->state_id)){
                    $this->state = $this->addr->state_id;
                }
                if(!empty($this->addr->city_id)){
                    $this->city = $this->addr->city_id;
                }
                if(!empty($this->addr->sector)){
                    $this->sector = $this->addr->sector;
                }
                if(!empty($this->addr->street)){
                    $this->street = $this->addr->street;
                }
                if(!empty($this->addr->residency)){
                    $this->residency = $this->addr->residency;
                }
            }
        }else{
            return redirect('login');
        }
    }

    public function render(){

        if( $this->country == 62 ){
            $this->states = AddrLocState::select('id','state')->where('country_id',$this->country)->get();
            $this->cities = AddrLocCity::select('id','city')->where('state_id',$this->state)->get();
            //$this->neighborhoods = AddrNeighborhood::select('id','neighborhood')->where('city_id',$this->selectedCity)->get();
            //$this->sectors = AddrSector::select('id','sector')->where('neighborhood_id',$this->selectedNeighborhood )->get();

        }else{
            $this->states = AddrExtState::select('id','state')->where('country_id',$this->country)->get();
            $this->cities = AddrExtCity::select('id','city')->where('state_id',$this->state)->get();
            //$this->neighborhoods = AddrNeighborhood::select('id','neighborhood')->where('city_id',$this->selectedCity)->get();
            //$this->sectors = AddrExtSector::select('id','sector')->where('id',$this->selectedNeighborhood )->get();
        }

        return view('livewire.form.partials.addr-info');
    }
    public function saveAddrInfo()
    {
        $addr = null;
        $this->validate([
            'country' => ['required'],
            'state' => ['required'],
        ]);

        if( $this->country == 62 ){
            $addr = AddrLocal::where('user_id',$this->user->id)->first();
            if(empty($addr)){
                AddrLocal::create([
                    'user_id' => $this->user->id,
                    "country_id" => $this->country,
                    "state_id" => $this->state,
                    "city_id" => $this->city,
                    "sector" => $this->sector,
                    "residency" => $this->residency,
                    "street" => $this->street,
                    //"neighborhood_id" => $this->neighborhood'],
                    //"is_active" => '1',
                    "is_local" => 1,
                    "is_personal" => '1',
                ]);

                if(!empty(AddrExterior::where('user_id',$this->user->id)->first())){
                    AddrExterior::where('user_id',$this->user->id)->delete();
                }

                $this->user->is_local = 1;
                $this->user->save();
            }else{
                $addr->country_id = $this->country;
                $addr->state_id = $this->state ;
                $addr->city_id = $this->city;
                $addr->sector = $this->sector;
                $addr->street = $this->street;
                $addr->residency = $this->residency;
                $addr->save();
            }
        }else{
            $addr = AddrExterior::where('user_id',$this->user->id)->first();
            if(empty($addr)){
                AddrExterior::create([
                    'user_id' => $this->user->id,
                    "country_id" => $this->country,
                    "state_id" => $this->state,
                    "city_id" => $this->city,
                    "sector" => $this->sector,
                    "residency" => $this->residency,
                    "street" => $this->street,
                    //"neighborhood_id" => $this->neighborhood'],
                    //"is_active" => '1',
                    "is_local" => 0,
                    "is_personal" => '1',
                ]);

                if(!empty(AddrLocal::where('user_id',$this->user->id)->first())){
                    AddrLocal::where('user_id',$this->user->id)->delete();
                }
                $this->user->is_local = 0;
                $this->user->save();
            }else{
                $addr->country_id = $this->country;
                $addr->state_id = $this->state ;
                $addr->city_id = $this->city;
                $addr->sector = $this->sector;
                $addr->street = $this->street;
                $addr->residency = $this->residency;
                $addr->save();
            }
        }

        $this->open = true;
    }
    public function rst()
    {
        $this->sector = "";
        $this->street = "";
        $this->residency = "";
    }
}
