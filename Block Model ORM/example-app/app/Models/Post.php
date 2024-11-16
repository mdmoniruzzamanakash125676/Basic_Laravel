<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\User;



class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'title',
        'slug',
        'post_date',
        'description',
        'image',
       
       
    ];
    //__join with category__//
    public function category()
        {
            return $this->belongsTo(Category::class, 'category_id');
        }
     //__join with subcategory__//
    public function subcategory()
        {
            return $this->belongsTo(Subcategory::class, 'subcategory_id');
        } 
    //__join with user or writter__//   
    public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }
}
