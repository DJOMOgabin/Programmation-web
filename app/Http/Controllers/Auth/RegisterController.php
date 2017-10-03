<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\GPS;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'typeOfUser' => 'required',
            'conditions' => 'required',
            'CaptchaCode' => 'required',
        ]);
    }

    function setRedirectTo($val){
        $this->redirectTo = $val;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */

    protected function create(array $data)
    {
        if(captcha_validate($data["CaptchaCode"])){
            $gps = null;
            if (!isset($data['language'])) {
                $data['language'] = "";
            }
            if (!isset($data['currency'])) {
                $data['currency'] = "";
            }
            if (!isset($data['firstname'])) {
                $data['firstname'] = "";
            }
            if (!isset($data['shortname'])) {
                $data['shortname'] = "";
            }

            if (!isset($data['civility'])) {
                $data['civility'] = "";
            }
            if (isset($data['typeOfUser']) && $data['typeOfUser'] == 'Company') {
                $this->setRedirectTo('/defaultServices');
            }


            $user = User::create(['name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'phone' => $data['phone'],
                'country' => $data['country'],
                'town' => $data['town'],
                'address' => $data['address'],
                'pobox' => $data['pobox'],
                'typeOfUser' => $data['typeOfUser'],
                'firstname' => $data['firstname'],
                'shortname' => $data['shortname'],
                'civility' => $data['civility'],
                'language' => $data['language'],
                'dateNaiss' => $data['dateNaiss'],
                'currency' => $data['currency'],]);
            Session::put('email', $data['email']);
            if (!isset($data['gps'])) {
                $data['gps'] = "";
            } else {
                list($longitude, $latitude) = explode(", ", $data['gps']);
                list($text, $longitude) = explode(":", $longitude);
                list($text, $latitude) = explode(":", $latitude);
                $gps = GPS::create(['longitude' => $longitude, 'latitude' => $latitude]);
                $gps->save();
                $user->gps()->save($gps);
                $user->save();
            }
            return $user;
        }else{
            return null;
        }

    }
}
