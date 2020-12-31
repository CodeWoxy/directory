<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table ='companies';
    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'website',
        'detail',
        'category_id',
        'sub_category_id',
        'packages_id',
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function subcategory()
    {
        return $this->belongsTo('App\Models\SubCategory');
    }
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
