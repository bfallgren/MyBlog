<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Filters\BlogFilter;
use Illuminate\Database\Eloquent\Builder;

class blog extends Model
{
   // required for search filter
   public function scopeFilter(Builder $builder, $request)
    {
        return (new BlogFilter($request))->filter($builder);
    }

   protected $fillable = [
    'title',
    'descr',
    ];
}
