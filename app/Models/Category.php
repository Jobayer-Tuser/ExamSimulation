<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $parentColumn = 'parent_category_id';

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, $this->parentColumn, 'id');
    }

    public function childrenCategory()
    {
        return $this->hasMany(Category::class, $this->parentColumn, 'id');
    }

    public function allParentCategory()
    {
        return $this->parentCategory()->with('allParentCategory');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Specify active inactive status based one 0, 1 value
     *
     * @param [type] $attribute
     * @return string
     */
    public function getStatusAttribute($attribute) : string
    {
        return [
            '0' => 'Inactive',
            '1' => 'Active',
        ][$attribute];
    }
}
