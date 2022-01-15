<?php

namespace App\Http\Livewire\Form\Partials;

use App\Models\RegComment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CommentInfo extends Component
{
    public $comment;
    public $cData;

    public $open = false;
    public $user;

    public function mount(){
        $this->user = Auth::user();

        if(!empty($this->user)){
            $this->cData = RegComment::where('user_id',$this->user->id)->first();
            
            if(!empty($this->cData)){
                $this->comment = $this->cData->comment;
            }
        }else{
            return redirect('login');
        }
    }

    public function render()
    {
        return view('livewire.form.partials.comment-info');
    }
    public function saveCommentInfo(){

        /*RegComment::where('user_id',$this->user->id)
                    ->update(['comment' =>  $this->comment]);*/

        if(empty($this->cData) && !empty($this->comment)){
            RegComment::create([
                "comment" => $this->comment,
                'user_id' => $this->user->id,
                'is_form_comment' => '1',
            ]);
        }elseif($this->comment){
            $this->cData->comment = $this->comment;
            $this->cData->save();
        }

        $this->open = true;
    }
}
