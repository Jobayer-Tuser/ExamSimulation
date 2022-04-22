<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sliderGroup()
    {
        return $this->belongsTo(SliderGroup::class);
    }

    /**
     * Specify active inactive status based one 0, 1 value
     *
     * @param [type] $attribute
     * @return string
     */
    // public function getStatusAttribute($attribute) : string
    // {
    //     return [
    //         '0' => 'Inactive',
    //         '1' => 'Active',
    //     ][$attribute];
    // }
}
