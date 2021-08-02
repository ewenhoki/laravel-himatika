<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Generation;
use App\Models\Activestudent;
use App\Models\Inactivestudent;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $message = [
            'required' => 'Data :attribute wajib diisi.',
            'unique' => 'Data :attribute sudah terdaftar.',
        ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'npm' => ['required', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], $message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'npm' => $data['npm'],
            'name' => ucwords(strtolower(trim($data['name']))),
            'email' => strtolower(trim($data['email'])),
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'role' => $data['role'],
            'remember_token' => Str::random(60),
        ]);
        $year = Generation::where('year','=',$data['generation'])->first();
        if($year == NULL){
            $generation = new Generation;
            $generation->year = $data['generation'];
            $generation->save();
            if($user->role == 'A'){
                $inactivestudent = Inactivestudent::create([
                    'user_id' => $user->id,
                    'generation_id' => $generation->id,
                ]);
            }
            else{
                $activestudent = Activestudent::create([
                    'user_id' => $user->id,
                    'generation_id' => $generation->id,
                ]);
            }
        }
        else{
            if($user->role == 'A'){
                $inactivestudent = Inactivestudent::create([
                    'user_id' => $user->id,
                    'generation_id' => $year->id,
                ]);
            }
            else{
                $activestudent = Activestudent::create([
                    'user_id' => $user->id,
                    'generation_id' => $year->id,
                ]);
            }
        }
        return $user;
    }
}
