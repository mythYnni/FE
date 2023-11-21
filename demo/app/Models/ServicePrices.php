<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ServicePrices extends Model
{
    protected $table = 'serviceprices';
    protected $fillable = ['nameService','linkText','workingTime','price','content'];
    public $timestamps = false;
    use HasFactory;

     public function get_orderBy_ASC(){
        return $this->orderBy('id','ASC')->get();
    } 

    public function get_link($slug){
        $obj = DB::table('serviceprices')->where('linkText', $slug)->first();
        return $obj;
    }

    public function creates($request){
        // dd($request);
        $creates = $this->Create([
            'nameService' => $request -> nameService,
            'linkText' => $request -> linkText,
            'workingTime' => $request -> workingTime,
            'price' => $request -> price,
            'content' => $request -> content
        ]);
        return $creates;
    }

    public function update_prices($request, $slug){
        $obj = DB::table('serviceprices')->where('linkText', $slug)->update([
            'nameService' => $request -> nameService,
            'linkText' => $request -> linkText,
            'workingTime' => $request -> workingTime,
            'price' => $request -> price,
            'content' => $request -> content
        ]);
        return $obj;
    }

    public function delete_prices($slug){
        $obj = DB::table('serviceprices')->where('linkText', $slug)->delete();
        return $obj;
    }

    public function prices(){
        return $this->orderBy('id','ASC')->get();
    }
}