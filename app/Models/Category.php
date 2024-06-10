<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'parent_id', 'status'];

    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    

    public function childrenCategories()
	{
	    return $this->hasMany(Category::class, 'parent_id')->with('categories');
	}

    public function parent(){
    	return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function getParentsNames() {
	    if($this->parent) {
	        return $this->parent->getParentsNames(). " > " . $this->name;
	    } else {
	        return $this->name;
	    }
	}

}
