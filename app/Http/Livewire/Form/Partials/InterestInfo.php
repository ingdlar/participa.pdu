<?php

namespace App\Http\Livewire\Form\Partials;

use Livewire\Component;
use App\Models\RegSocial;
use App\Models\CoreElectivePosition;
use App\Models\RegPersonDirectiveInterest;
use App\Models\RegPersonElectiveInterest;
use App\Models\RegPersonSocialInterest;
use Illuminate\Support\Facades\Auth;

class InterestInfo extends Component
{
    public $electives;
    public $directives;
    public $socials;

    public $elective;
    public $directive;
    public $social;

    public $ecData;
    public $dcData;
    public $scData;

    public $open = false;
    public $user;

    public function mount(){
        $this->user = Auth::user();

        if(!empty($this->user)){
            $this->ecData = RegPersonElectiveInterest::where('user_id',$this->user->id)->first();
            $this->dcData = RegPersonDirectiveInterest::where('user_id',$this->user->id)->first();
            $this->scData = RegPersonSocialInterest::where('user_id',$this->user->id)->first();

            if(!empty($this->ecData)){
                $this->elective = $this->ecData->elective_id;
            }
            if(!empty($this->dcData)){
                $this->directive = $this->dcData->directive_id;
            }
            if(!empty($this->scData)){
                $this->social = $this->scData->social_id;
            }
        }else{
            return redirect('login');
        }
    }

    public function render()
    {
        $this->electives = CoreElectivePosition::select('id','name')->where('is_internal','=','0')->get();
        $this->directives = CoreElectivePosition::select('id','name')->where('is_internal','=','1')->get();
        $this->socials = RegSocial::select('id','interest')->get();

        return view('livewire.form.partials.interest-info');
    }
    public function saveInterestInfo(){
        //los valores se estan insertando dos veces en todos los procesos

        $ecData = RegPersonElectiveInterest::where('user_id',$this->user->id)->first();
        $dcData = RegPersonDirectiveInterest::where('user_id',$this->user->id)->first();
        $scData = RegPersonSocialInterest::where('user_id',$this->user->id)->first();

        if(empty($ecData)){
            if($this->elective){
                RegPersonElectiveInterest::create([
                    'user_id' => $this->user->id,
                    "elective_id" => $this->elective,
                ]);
            }
        }elseif($this->elective){
            if($this->elective != $ecData->elective_id){
                $ecData->elective_id = $this->elective;
                $ecData->save();
            }else {

            }
        }
//####################################################################################################################
        if(empty($dcData)){
            if($this->directive){
                RegPersonDirectiveInterest::create([
                    'user_id' => $this->user->id,
                    "directive_id" => $this->directive,
                ]);
            }
        }elseif($this->directive){
            if($this->elective != $dcData->directive_id){
                $dcData->directive_id = $this->directive;
                $dcData->save();
            }else{

            }
        }
//####################################################################################################################
        if(empty($scData)){
            if($this->social){
                RegPersonSocialInterest::create([
                    'user_id' => $this->user->id,
                    "social_id" => $this->social,
                ]);
            }
        }elseif($this->social){
            if($this->elective != $scData->social_id){
                $scData->social_id = $this->social;
                $scData->save();
            }else{

            }
        }
//####################################################################################################################

        $this->open = true;

    }
}
