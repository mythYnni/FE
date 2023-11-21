<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    public $timestamps = false;
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullName','linkText','accountName','phone','email','imageAcount','password','sex','decentralization'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function get_orderBy_ASC(){
        return $this->orderBy('id','ASC')->get();
    } 

    public function findByAccountName ($accountName){
        $obj = $this->where('accountName', $accountName)->first();
        return $obj;
    } 

     public function get_link($slug){
        $obj = DB::table('users')->where('linkText', $slug)->first();
        return $obj;
    }

    public function creates($request){
        // dd($request);
        $creates = $this->Create([
            'fullName' => $request -> fullName,
            'linkText' => $request -> linkText,
            'accountName' => $request -> accountName,
            'phone' => $request -> phone,
            'email' => $request -> email,
            'imageAcount' => $request -> file,
            'password' => $request -> password,
            'sex' => $request -> sex,
            'decentralization' => $request -> decentralization,
        ]);
        return $creates;
    }

    public function update_password($request, $slug){
        // dd($request);
        if($request -> updatePass){
            $obj = DB::table('users')->where('linkText', $slug)->update([
                'password' => $request -> updatePass,
                'decentralization' => $request -> decentralization,
            ]);
            return $obj;
        }else{
            $obj = DB::table('users')->where('linkText', $slug)->update([
                'decentralization' => $request -> decentralization,
            ]);
            return $obj;
        }
    }

    public function update_profile($request, $slug){
        // dd($request);
         $obj = DB::table('users')->where('linkText', $slug)->update([
            'fullName' => $request -> fullName,
            'phone' => $request -> phone,
            'email' => $request -> email,
            'imageAcount' => $request -> file,
            'sex' => $request -> sex,
        ]);
        return $obj;
    }

    public function create_password($request, $slug){
        // dd($request);
        $obj = DB::table('users')->where('linkText', $slug)->update([
            'password' => $request -> passwords,
        ]);
        return $obj;
    }

    public function detete_account($slug){
        $obj = DB::table('users')->where('linkText', $slug)->delete();
        return $obj;
    }
}