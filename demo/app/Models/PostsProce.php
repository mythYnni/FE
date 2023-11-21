<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PostsProce extends Model
{
   protected $table = 'postsproce';
    protected $fillable = ['title','linkText','image', 'link', 'content', 'dateCreated', 'status', 'nameUser', 'nameCategory', 'user_id', 'category_id'];
    public $timestamps = false;
    use HasFactory;
    
    public function get_orderBy_ASC(){
        return $this->orderBy('id','ASC')->get();
    } 

    public function get_orderBy_DESC(){
        return $this->orderBy('dateCreated','DESC')->get();
    } 

    public function get_orderBy_Where_DESC($slug){
        return $this->where('user_id', $slug)->orderBy('dateCreated','DESC')->get();
    } 

    public function get_orderBy_DESC_Status(){
         $results = DB::table('postsproce')->join('users', 'users.id', '=', 'postsproce.user_id')->join('adminproce', 'adminproce.id', '=', 'postsproce.category_id')
            ->select('postsproce.linkText', 'postsproce.title', 'postsproce.image','postsproce.link', 'postsproce.content', 
            'postsproce.dateCreated', 'postsproce.status', 'postsproce.nameUser', 
            'adminproce.linkText as category', 'users.linkText as user', 'users.imageAcount as imgUser', )
            ->where('postsproce.status', 0)->paginate(8);
        return $results;
    } 
    
    public function get_orderBy_DESC_Status_category($slug){
         $results = DB::table('postsproce')->join('users', 'users.id', '=', 'postsproce.user_id')->join('adminproce', 'adminproce.id', '=', 'postsproce.category_id')
            ->select('postsproce.linkText', 'postsproce.title', 'postsproce.image','postsproce.link', 'postsproce.content', 
            'postsproce.dateCreated', 'postsproce.status', 'postsproce.nameUser', 
            'adminproce.linkText as category', 'users.linkText as user', 'users.imageAcount as imgUser', )
            ->where('postsproce.status', 0)->where('adminproce.linkText', $slug)->paginate(8);
        return $results;
    } 

    public function get_orderBy_DESC_Status_category_count(){
         $results = DB::table('postsproce')->join('users', 'users.id', '=', 'postsproce.user_id')->join('adminproce', 'adminproce.id', '=', 'postsproce.category_id')
            ->select('postsproce.linkText', 'postsproce.title', 'postsproce.image','postsproce.link', 'postsproce.content', 
            'postsproce.dateCreated', 'postsproce.status', 'postsproce.nameUser', 
            'adminproce.linkText as category', 'users.linkText as user', 'users.imageAcount as imgUser', )
            ->where('postsproce.status', 0)->orderBy('postsproce.dateCreated','DESC')->paginate(3);
        return $results;
    } 

    public function get_link($slug){
        $obj = DB::table('postsproce')->where('linkText', $slug)->first();
        return $obj;
    }

    public function AdminProce(){
        return $this->belongsTo(AdminProce::class);
    }

    public function creates($request){
        $creates = $this->Create([
            'title' => $request -> title,
            'linkText' => $request -> linkText,
            'image' => $request -> image,
            'link' => $request -> link,
            'content' => $request -> content,
            'nameUser' => $request -> nameUser,
            'nameCategory' => $request -> nameCategory,
            'user_id' => $request -> user_id,
            'status' => $request -> status,
            'category_id' => $request -> category_id,
            'dateCreated' => now()->format('Y-m-d'),
        ]);
        return $creates;
    }

    public function update_pProce($request, $slug){
        $obj = DB::table('postsproce')->where('linkText', $slug)->update([
            'title' => $request -> title,
            'linkText' => $request -> linkText,
            'image' => $request -> image,
            'link' => $request -> link,
            'content' => $request -> content,
            'nameUser' => $request -> nameUser,
            'nameCategory' => $request -> nameCategory,
            'user_id' => $request -> user_id,
            'status' => $request -> status,
            'category_id' => $request -> category_id,
            'dateCreated' => $request -> dateCreated,
        ]);
        return $obj;
    }

    public function get_join($slug){
        $results = DB::table('postsproce')->join('users', 'users.id', '=', 'postsproce.user_id')->join('adminproce', 'adminproce.id', '=', 'postsproce.category_id')
            ->select('postsproce.linkText', 'postsproce.title', 'postsproce.image','postsproce.link', 'postsproce.content', 'postsproce.dateCreated', 'postsproce.status', 'postsproce.nameUser', 'adminproce.linkText as category', 'users.linkText as user')
            ->where('postsproce.linkText', $slug)->first();
        return $results;
    }

    public function delete_pProce($slug){
        $obj = DB::table('postsproce')->where('linkText', $slug)->delete();
        return $obj;
    }

    public function delete_pProce_Where($id){
        $obj = DB::table('postsproce')->where('category_id', $id)->delete();
        return $obj;
    }

    public function delete_pProce_Where_user($id){
        $obj = DB::table('postsproce')->where('user_id', $id)->delete();
        return $obj;
    }

    public function get_join_detail($slug){
        $results = DB::table('postsproce')->join('users', 'users.id', '=', 'postsproce.user_id')->join('adminproce', 'adminproce.id', '=', 'postsproce.category_id')
            ->select('postsproce.linkText', 'postsproce.title', 'postsproce.image','postsproce.link', 'postsproce.content', 'postsproce.dateCreated', 'postsproce.status', 'postsproce.nameUser', 'adminproce.linkText as category', 'users.linkText as user', 'users.imageAcount as imageAcount')
            ->where('postsproce.linkText', $slug)->first();
        return $results;
    }

    public function get_qc(){
        return $this->whereNotNull('image')->orderBy('dateCreated','DESC')->get();
    } 
}