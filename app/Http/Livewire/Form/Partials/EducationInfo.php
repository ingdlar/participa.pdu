<?php

namespace App\Http\Livewire\Form\Partials;

use App\Models\RegPersonEducation;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class EducationInfo extends Component
{

    public $advanced;
    public $superior;
    public $others;
    public $doc_write = false;
    public $excel = false;
    public $social_net = false;
    public $video_ed = false;
    public $photography = false;
    public $design = false;

    public $aID;
    public $sID;
    public $oID;
    public $dwID;
    public $eID;
    public $snID;
    public $veID;
    public $pID;
    public $dID;

    public $open = false;
    public $peData;
    public $user;
    public $us;

    public function mount(){
        $this->user = Auth::user();

        if(!empty($this->user)){
            $this->peData = RegPersonEducation::where('user_id', $this->user->id )->get();
            foreach ($this->peData as $value){
                if($value->education_id == 9){
                    $this->advanced = $value->education_name;   $this->aID = $value->id;

                }elseif($value->education_id == 10){
                    $this->superior = $value->education_name;   $this->sID = $value->id;

                }elseif($value->education_id == 11){
                    $this->others = $value->education_name;     $this->oID = $value->id;

                }elseif($value->education_name == "doc_write"){
                    $this->doc_write = "doc_write";             $this->dwID = $value->id;

                }elseif($value->education_name == "excel"){
                    $this->excel = "excel";                     $this->eID = $value->id;

                }elseif($value->education_name == "social_net"){
                    $this->social_net = "social_net";           $this->snID = $value->id;

                }elseif($value->education_name == "video_ed"){
                    $this->video_ed = "video_ed";               $this->veID = $value->id;

                }elseif($value->education_name == "photography"){
                    $this->photography = "photography";         $this->pID = $value->id;

                }elseif($value->education_name == "design"){
                    $this->design = "design";                   $this->dID = $value->id;
                }
            }
        }else{
            return redirect('login');
        }
    }

    public function render()
    {
        return view('livewire.form.partials.education-info');
    }
    public function saveEducationInfo()
    {
        $peData = RegPersonEducation::where('user_id', $this->user->id )->get();
        $aID = null;   $sID = null;    $oID = null;    $dwID = null;
        $eID = null;   $snID = null;   $veID = null;   $pID = null;
        $dID = null;
        $this->us = $this->doc_write;

        foreach ($peData as $value){
            if($value->education_id == 9){
                $advanced = $value->education_name;   $aID = $value->id;

            }elseif($value->education_id == 10){
                $superior = $value->education_name;   $sID = $value->id;

            }elseif($value->education_id == 11){
                $others = $value->education_name;     $oID = $value->id;

            }elseif($value->education_name == "doc_write"){
                $doc_write = "doc_write";             $dwID = $value->id;

            }elseif($value->education_name == "excel"){
                $excel = "excel";                     $eID = $value->id;

            }elseif($value->education_name == "social_net"){
                $social_net = "social_net";           $snID = $value->id;

            }elseif($value->education_name == "video_ed"){
                $video_ed = "video_ed";               $veID = $value->id;

            }elseif($value->education_name == "photography"){
                $photography = "photography";         $pID = $value->id;

            }elseif($value->education_name == "design"){
                $design = "design";                   $dID = $value->id;
            }
        }
//####################################################################################################################
        if(empty($aID)){
            if($this->advanced){
                RegPersonEducation::create([
                    "education_name" => $this->advanced,
                    'user_id' => $this->user->id,
                    'education_id' => 9,
                ]);
            }
        }elseif($this->advanced){
            if($this->advanced != $advanced){
                RegPersonEducation::where('id',$aID)
                                    ->update(['education_name' => $this->advanced]);
            }
        }
//####################################################################################################################
        if(empty($sID)){
            if($this->superior){
                RegPersonEducation::create([
                    "education_name" => $this->superior,
                    'user_id' => $this->user->id,
                    'education_id' => 10,
                ]);
            }
        }elseif($this->superior){
            if($this->superior != $superior){
                RegPersonEducation::where('id',$sID)
                                    ->update(['education_name' => $this->superior]);
            }
        }
//####################################################################################################################
        if(empty($oID)){
            if($this->others){
                RegPersonEducation::create([
                    "education_name" => $this->others,
                    'user_id' => $this->user->id,
                    'education_id' => 11,
                ]);
            }
        }elseif($this->others){
            if($this->others != $others){
                RegPersonEducation::where('id',$oID)
                                    ->update(['education_name' => $this->others]);
            }
        }
//####################################################################################################################
//######################       Conocimientos Generales      ##########################################################
//####################################################################################################################
        if(empty($dwID)){
            if($this->doc_write){
                RegPersonEducation::create([
                    "education_name" => $this->doc_write,
                    'user_id' => $this->user->id,
                    'education_id' => 5,
                ]);
            }
        }else{
            if(empty($this->doc_write)){
                RegPersonEducation::where('id',$dwID)
                                    ->delete();
            }
        }
//####################################################################################################################
        if(empty($eID)){
            if($this->excel){
                RegPersonEducation::create([
                    "education_name" => $this->excel,
                    'user_id' => $this->user->id,
                    'education_id' => 5,
                ]);
            }
        }else{
            if(empty($this->excel)){
                RegPersonEducation::where('id',$eID)
                                    ->delete();
            }
        }
//####################################################################################################################
        if(empty($snID)){
            if($this->social_net){
                RegPersonEducation::create([
                    "education_name" => $this->social_net,
                    'user_id' => $this->user->id,
                    'education_id' => 5,
                ]);
            }
        }else{
            if(empty($this->social_net)){
                RegPersonEducation::where('id',$snID)
                                    ->delete();
            }
        }
//####################################################################################################################
        if(empty($veID)){
            if($this->video_ed){
                RegPersonEducation::create([
                    "education_name" => $this->video_ed,
                    'user_id' => $this->user->id,
                    'education_id' => 5,
                ]);
            }
        }else{
            if(empty($this->video_ed)){
                RegPersonEducation::where('id',$veID)
                                    ->delete();
            }
        }
//####################################################################################################################
        if(empty($pID)){
            if($this->photography){
                RegPersonEducation::create([
                    "education_name" => $this->photography,
                    'user_id' => $this->user->id,
                    'education_id' => 5,
                ]);
            }
        }else{
            if(empty($this->photography)){
                RegPersonEducation::where('id',$pID)
                                    ->delete();
            }
        }
//####################################################################################################################
        if(empty($dID)){
            if($this->design){
                RegPersonEducation::create([
                    "education_name" => $this->design,
                    'user_id' => $this->user->id,
                    'education_id' => 5,
                ]);
            }
        }else{
            if(empty($this->design)){
                RegPersonEducation::where('id',$dID)
                                    ->delete();
            }
        }
//####################################################################################################################

        $this->open = true;
    }
}
