<?php

namespace App\Repositories;

use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    public function getAllCategories()
    {
        return DB::table('categories as cat')
                ->leftJoin('categories as subcat', 'cat.id' , 'subcat.parent_category_id')
                ->leftJoin('categories as sscat', 'subcat.id', 'sscat.parent_category_id')
                ->leftJoin('categories as ssscat', 'sscat.id', 'ssscat.parent_category_id')
                ->select(
                    'cat.id as cat_id',
                    'cat.name as cat_name',
                    'cat.status as cat_status',
                    'subcat.id as subcat_id',
                    'subcat.name as subcat_name',
                    'subcat.status as subcat_status',
                    'sscat.id as sscat_id',
                    'sscat.name as sscat_name',
                    'sscat.status as sscat_status',
                    'ssscat.id as ssscat_id',
                    'ssscat.name as ssscat_name',
                    'ssscat.status as ssscat_status'
                )->orderBy('cat_id')
                ->get();
    }
}
