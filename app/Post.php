<?php

namespace App;
use App\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
    protected $fillable= ['title','description','content','image','category_id'];
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function hasTag($id){
        return in_array($id,$this->tags->pluck('id')->toArray());
    }
}
