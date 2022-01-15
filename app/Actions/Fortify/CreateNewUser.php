<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Models\RegContact;
use App\Models\AddrLocal;
use App\Models\AddrExterior;
use App\Models\RegPersonEducation;
use App\Models\RegPersonElectiveInterest;
use App\Models\RegPersonDirectiveInterest;
use App\Models\RegPersonSocialInterest;
use App\Models\RegComment;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendPwdMailable;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        //dd($input);
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'rol' => ['required'],
            'card' => ['required', 'string', 'size:11'],
            'lastname' => ['required'],
            'birthday' => ['required'],
            'sex' => ['required'],
            'cel' => ['required'],
            'country' => ['required'],
            'state' => ['required'],
            //'city' => ['required'],

            //'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $partOne = substr($input['card'], -4);
        $partTwo = substr($input['name'], 0, 4);
        $partThree =  substr(md5(mt_rand()), 0, 4);
        $formattedPwd = $partOne . $partTwo . $partThree;

        //$password = Hash::make( $formatedPwd );

        if($input['country'] == 62){
            $userData = User::create([
                'password' => Hash::make( $formattedPwd ),
                "rol_id" => $input['rol'],
                "card" => $input['card'],
                'name' => $input['name'],
                "lastname" => $input['lastname'],
                "birthday" => $input['birthday'],
                "sex_id" => $input['sex'],
                'email' => $input['email'],
                'web_filed' => '1',
                'is_local' => '1'
            ]);
        }else{
            $userData = User::create([
                'password' => Hash::make('Entra100@#'),
                "rol_id" => $input['rol'],
                "card" => $input['card'],
                'name' => $input['name'],
                "lastname" => $input['lastname'],
                "birthday" => $input['birthday'],
                "sex_id" => $input['sex'],
                'email' => $input['email'],
                'web_filed' => '1',
                'is_local' => '0'
            ]);
        }

        RegContact::create([
            'contact' => $input['cel'],
            'user_id' => $userData->id,
            'type_id' => 1,
        ]);
        if($input['phone']){
            RegContact::create([
                'contact' => $input['phone'],
                'user_id' => $userData->id,
                'type_id' => 3,
            ]);
        }
        RegContact::create([
            'contact' => $input['email'],
            'user_id' => $userData->id,
            'type_id' => 5,
        ]);

        /*if( !isset($input['neighborhood']) ){
            $input['neighborhood'] = NULL;
        }*/
        if( !isset($input['sector']) ){
            $input['sector'] = NULL;
        }
        if( !isset($input['residency']) ){
            $input['residency'] = NULL;
        }
        if( !isset($input['street']) ){
            $input['street'] = NULL;
        }

        if($input['country'] == 62){
            AddrLocal::create([
                'user_id' => $userData->id,
                "sector" => $input['sector'],
                "residency" => $input['residency'],
                "street" => $input['street'],
                "country_id" => $input['country'],
                "state_id" => $input['state'],
                //"city_id" => $input['city'],
                //"neighborhood_id" => $input['neighborhood'],
                //"is_active" => '1',
                "is_local" => 1,
                "is_personal" => '1',
            ]);
        }else {
            AddrExterior::create([
                'user_id' => $userData->id,
                "sector" => $input['sector'],
                "residency" => $input['residency'],
                "street" => $input['street'],
                "country_id" => $input['country'],
                "state_id" => $input['state'],
                //"city_id" => $input['city'],
                //"neighborhood_id" => $input['neighborhood'],
                //"is_active" => '1',
                "is_local" => 0,
                "is_personal" => '1',
            ]);
        }

        if(isset($input['advanced'])){
            RegPersonEducation::create([
                "education_name" => $input['advanced'],
                'user_id' => $userData->id,
                'education_id' => 9,
            ]);
        }
        if(isset($input['superior'])){
            RegPersonEducation::create([
                "education_name" => $input['superior'],
                'user_id' => $userData->id,
                'education_id' => 10,
            ]);
        }
        if(isset($input['others'])){
            RegPersonEducation::create([
                "education_name" => $input['others'],
                'user_id' => $userData->id,
                'education_id' => 11,
            ]);
        }
        if(isset($input['doc_write'])){
            RegPersonEducation::create([
                "education_name" => $input['doc_write'],
                'user_id' => $userData->id,
                'education_id' => 5,
            ]);
        }
        if(isset($input['excel'])){
            RegPersonEducation::create([
                "education_name" => $input['excel'],
                'user_id' => $userData->id,
                'education_id' => 5,
            ]);
        }
        if(isset($input['social_net'])){
            RegPersonEducation::create([
                "education_name" => $input['social_net'],
                'user_id' => $userData->id,
                'education_id' => 5,
            ]);
        }
        if(isset($input['video_ed'])){
            RegPersonEducation::create([
                "education_name" => $input['video_ed'],
                'user_id' => $userData->id,
                'education_id' => 5,
            ]);
        }
        if(isset($input['photography'])){
            RegPersonEducation::create([
                "education_name" => $input['photography'],
                'user_id' => $userData->id,
                'education_id' => 5,
            ]);
        }
        if(isset($input['design'])){
            RegPersonEducation::create([
                "education_name" => $input['design'],
                'user_id' => $userData->id,
                'education_id' => 5,
            ]);
        }
        if(isset($input['elective'])){
            RegPersonElectiveInterest::create([
                'user_id' => $userData->id,
                "elective_id" => $input['elective'],
            ]);
        }
        if(isset($input['directive'])){
            RegPersonDirectiveInterest::create([
                'user_id' => $userData->id,
                "directive_id" => $input['directive'],
            ]);
        }
        if(isset($input['social'])){
            RegPersonSocialInterest::create([
                'user_id' => $userData->id,
                "social_id" => $input['social'],

            ]);
        }
        if(isset($input['comment'])){
            RegComment::create([
                "comment" => $input['comment'],
                'user_id' => $userData->id,
                'is_form_comment' => '1',
            ]);
        }

        //$formattedPwd
        $sendPwd = new SendPwdMailable($formattedPwd, $input);
        Mail::to($input['email'])->send($sendPwd);

        return $userData;
    }
}
