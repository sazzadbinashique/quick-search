<?php

namespace QuickSearch\Traits;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

trait SearchableTrait
{
    public function scopeSearch(Builder $query, $search, array $options = [])
    {
        if ($search) {
            $query->where(function ($query) use ($search, $options) {
                foreach ($options as $column => $type) {
                    // If it's a relation, eager load and search
                    if (strpos($column, '.') !== false) {
                        [$relation, $column] = explode('.', $column);
                        $query->orWhereHas($relation, function ($query) use ($column, $search, $type) {
                            $this->applySearch($query, $column, $search, $type);
                        });
                    } else {
                        $this->applySearch($query, $column, $search, $type);
                    }
                }
            });
        }

        return $query;
    }

    private function applySearch(Builder $query, $column, $search, $type)
    {
        switch ($type) {
            case 'like':
                $query->orWhere($column, 'LIKE', '%' . $search . '%');
                break;
            case 'equals':
                $query->orWhere($column, '=', $search);
                break;
            case 'date':
                $query->orWhereDate($column, '=', $search);
                break;
            default:
                $query->orWhere($column, $search);
        }
    }

    public function scopeSort(Builder $query, $column, $direction = 'asc')
    {
        return $query->orderBy($column, $direction);
    }

    public function scopeMultipleSelect(Builder $query, array $columnValues)
    {
        $query->where(function ($query) use ($columnValues) {
            foreach ($columnValues as $column => $values) {
                $query->whereIn($column, $values);
            }
        });

        return $query;
    }

    public function scopeDateRange(Builder $query, $column, $startDate, $endDate)
    {
        $start = Carbon::createFromFormat('d/m/Y', $startDate)->startOfDay();
        $end = Carbon::createFromFormat('d/m/Y', $endDate)->endOfDay();

        return $query->whereBetween($column, [$start, $end]);
    }
}
