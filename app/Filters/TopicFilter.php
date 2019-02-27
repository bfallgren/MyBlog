<?php

/// TopicFilter.php
// required for search filter
// This TopicFilter class is responsible for filtering the data based on the topic. We pass the type in the query string, and according to that, we get out the result. 

namespace App\Filters;

class TopicFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('topic', $value);
    }
}