<?php

namespace App\Http\Livewire\Form\Partials;

use Illuminate\Auth\Events\Registered;
use Livewire\Component;
use App\Models\RegContact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ContactInfo extends Component
{

    public $cel;
    public $phone;
    public $email;

    public $user;
    public $cData;

    public $open = false;

    public function mount(){

        $this->user = Auth::user();
        if(!empty($this->user)){
            $this->cData = RegContact::where('user_id', $this->user->id )->get();
            $this->email = $this->user->email;

            foreach ($this->cData as $contact){
                if( $contact->type_id == 1 ){
                    $this->cel = $contact->contact;
                }
                if( $contact->type_id == 3 ){
                    $this->phone = $contact->contact;
                }
            }
        }else{
            return redirect('login');
        }
    }

    public function render()
    {
        return view('livewire.form.partials.contact-info');
    }

    public function saveContactInfo(){

        $cUser = User::find( $this->user->id );
        $this->cData = RegContact::where('user_id', $this->user->id )->get();
        $present = false;

        foreach ($this->cData as $contact){

            if( $this->cel != $contact->contact and $contact->type_id == 1){
                $this->validate([
                    'cel' => ['required'],
                ]);
                RegContact::where('contact',$contact->contact)
                            ->where('user_id', $this->user->id )
                            ->where('type_id',1)
                            ->update(['contact' =>  $this->cel]);
            }
            if( $this->phone != $contact->contact and $contact->type_id == 3){
                RegContact::where('contact',$contact->contact)
                            ->where('user_id', $this->user->id )
                            ->where('type_id',3)
                            ->update(['contact' =>  $this->phone]);
                $present = true;
            }
            if( $this->email != $contact->contact and $contact->type_id == 5){
                $this->validate([
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                ]);
                RegContact::where('contact',$contact->contact)
                            ->where('user_id', $this->user->id )
                            ->where('type_id',5)
                            ->update(['contact' =>  $this->email]);

                $cUser->email = $this->email;
                $cUser->save();
            }
        }
        if(!$present){
            RegContact::create([
                'contact' => $this->phone,
                'user_id' => $this->user->id,
                'type_id' => 3,
            ]);
        }
        $this->open = true;
    }
}
