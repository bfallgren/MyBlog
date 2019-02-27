<?php

// BlogFilter.php
// required for search filter

namespace App\Filters;

use App\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class BlogFilter extends AbstractFilter
{
    protected $filters = [
        'topic' => TopicFilter::class
    ];
}