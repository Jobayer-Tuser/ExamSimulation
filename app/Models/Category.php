<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_category_id', 'id');
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
