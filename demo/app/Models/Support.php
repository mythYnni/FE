<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Support extends Model
{
    protected $table = 'support';
    protected $fillable = ['name','phone','email', 'linkText', 'content', 'dateCreated', 'status', 'user_name'];
    public $timestamps = false;
    use HasFactory;

    public function get_orderBy_DESC(){
        return $this->orderBy('dateCreated','DESC')->get();
    } 

    public function get_link($slug){
        $obj = DB::table('support')->where('linkText', $slug)->first();
        return $obj;
    }

    public function creates($request){
        // dd($request);
        $creates = $this->Create([
            'name' => $request -> name,
            'phone' => $request -> phone,
            'email' => $request -> email,
            'linkText' => $request -> linkText,
            'email' => $request -> email,
            'content' => $request -> content,
            'dateCreated' => now()->format('Y-m-d'),
            'status' => 0,
            'user_name' => 1
        ]);
        return $creates;
    }

    public function delete_support($slug){
        $obj = DB::table('support')->where('linkText', $slug)->delete();
        return $obj;
    }

    public function update_support($req, $slug){
        $obj = DB::table('support')->where('linkText', $slug)->update([
            'status' => $req -> status,
            'content' => $req -> content,
        ]);
        return $obj;
    }
}
