<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
      'name',
      'slug',
      'description',
      'parent_id',
      'status',
      'popular',
      'image',
      'meta_title',
      'meta_descrip',
      'meta_keywords',
    ];

//    public function tree()
//    {
//        $allCategories = Category::get();
//
//        $rootCategories = $allCategories->whereNull('parent_id');
//
//        self::formatTree($rootCategories, $allCategories);
//
//        return $rootCategories;
//    }
//
//    private static function formatTree($categories, $allCategories)
//    {
//        foreach ($categories as $category)
//        {
//            $category->children = $allCategories->where('parent_id', $category->id)->values();
//
//            if($category->children->isNotEmpty())
//            {
//                self::formatTree($category->children, $allCategories);
//            }
//        }
//    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

}
