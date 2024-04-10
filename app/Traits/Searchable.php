<?php

namespace App\Traits;
use Illuminate\Support\Str;

trait Searchable
{
    public function scopeSearch($query, $term = '')
    {
        if ($term != "null")
            foreach ($this->searchable as $searchable) {
                if (str_contains($searchable, '.')) {
                    $relation = Str::beforeLast($searchable, '.');
                    $column = Str::afterLast($searchable, '.');

                    $query->orWhereHas($relation, function ($q) use ($column, $term) {
                        $q->where($column, 'like', "%$term%");
                    });

                    continue;
                }
                $query->orWhere($searchable, 'like', "%$term%");
            }
        return $query;
    }
}