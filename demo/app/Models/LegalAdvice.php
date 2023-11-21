<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\PostsAdvice;

class LegalAdvice extends Model
{
    protected $table = 'legaladvice';
    protected $fillable = ['name','linkText','status'];
    public $timestamps = false;
    use HasFactory;

    public function get_orderBy_ASC(){
        return $this->orderBy('id','ASC')->get();
    } 

    public function get_orderBy_ASC_Where(){
        return $this->where('status', 1)->orderBy('id','ASC')->get();
    } 

    public function get_link($slug){
        $obj = DB::table('legaladvice')->where('linkText', $slug)->first();
        return $obj;
    }

    public function creates($request){
        // dd($request);
        $creates = $this->Create([
            'name' => $request -> name,
            'linkText' => $request -> linkText,
            'status' => $request -> status,
        ]);
        return $creates;
    }

     public function update_advice($request, $slug){
        $obj = DB::table('legaladvice')->where('linkText', $slug)->update([
            'name' => $request -> name,
            'linkText' => $request -> linkText,
            'status' => $request -> status,
        ]);
        return $obj;
    }

    public function delete_advice($slug){
        $obj = DB::table('legaladvice')->where('linkText', $slug)->delete();
        return $obj;
    }

    public function PostsAdvice(){
        return $this->hasMany('App\Models\PostsAdvice', 'category_id','id');
    }
}