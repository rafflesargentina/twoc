<?php

namespace Raffles\Modules\Aptoclick\Filters;

use RafflesArgentina\FilterableSortable\BaseFilters;

class PropertyFilters extends BaseFilters
{
    public function amenities($query)
    {
        return $this->builder->whereHas(
            'amenities', function ($q) use ($query) {
                $q->where('amenity_id', $query);
            }
        );
    }

    public function facilities($query)
    {
        return $this->builder->whereHas(
            'facilities', function ($q) use ($query) {
                $q->where('facility_id', $query);
            }
        );
    }

    public function bathrooms($query)
    {
        return $this->builder->where('bathrooms',  $query);
    }

    public function locality($query)
    {
        return $this->builder->whereHas(
            'address', function ($q) use ($query) {
                $q->where('locality', 'LIKE', '%'.$query.'%');
            }
        );
    }

    public function parking($query)
    {
        return $this->builder->where('parking',  $query);
    }

    public function property_type_id($query)
    {
        return $this->builder->where('property_type_id', $query);
    }

    public function rooms($query)
    {
        return $this->builder->where('rooms',  $query);
    }

    public function sell_price_from($query)
    {
        return $this->builder->where('sell_price', '>=', $query);
    }

    public function sell_price_to($query)
    {
        return $this->builder->where('sell_price', '<=', $query);
    }

    public function sublocality($query)
    {
        return $this->builder->whereHas(
            'address', function ($q) use ($query) {
                $q->where('sublocality', 'LIKE', '%'.$query.'%');
            }
        );
    }
}
