<?php

namespace Raffles\Modules\Aptoclick\Models;

use Raffles\Models\{ Address, Contact, Map, FeaturedPhoto, UnfeaturedPhoto };
use Raffles\Modules\Aptoclick\Models\Traits\PropertyTrait;
use Raffles\Modules\Aptoclick\Filters\PropertyFilters;
use Raffles\Modules\Aptoclick\Sorters\PropertySorters;

use Illuminate\Database\Eloquent\Model;
use RafflesArgentina\FilterableSortable\FilterableSortableTrait;

class Property extends Model
{
    use FilterableSortableTrait, PropertyTrait;

    protected $appends = [
        'first_year_cost',
        'monthly_price',
        'remaining_balance',
        'savings',
        'second_year_cost',
        'third_year_cost',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bathrooms',
        'covered_surface',
        'days_available',
        'description',
        'elevator',
        'featured',
        'floors',
        'ground_surface',
        'hours_available',
        'maintenance_expenses',
        'title',
        'parking',
        'property_condition_id',
        'property_type_id',
        'rental_price',
        'rooms',
        'sell_price',
        'slug',
        'user_id',
        'years',
    ];

    protected $filters = PropertyFilters::class;

    protected $sorters = PropertySorters::class;

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['address', 'featured_photo', 'property_type', 'user'];

    /**
     * Get the property's address.
     */
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    /**
     * Get the property's contact.
     */
    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable');
    }

    /**
     * The amenities that belong to the property.
     */
    public function amenities()
    {
        return $this->belongsToMany(Amenity::class);
    }

    /**
     * The facilities that belong to the property.
     */
    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }

    /**
     * Get the property's map.
     */
    public function map()
    {
        return $this->morphOne(Map::class, 'mapable');
    }

    /**
     * Get the property's featured photo.
     */
    public function featured_photo()
    {
        return $this->morphOne(FeaturedPhoto::class, 'photoable')->withDefault();
    }

    /**
     * Get the property condition that owns the property.
     */
    public function property_condition()
    {
        return $this->belongsTo(PropertyCondition::class);
    }

    /**
     * Get the property type that owns the property.
     */
    public function property_type()
    {
        return $this->belongsTo(PropertyType::class);
    }

    /**
     * Get all of the property's unfeatured photos.
     */
    public function unfeatured_photos()
    {
        return $this->morphMany(UnfeaturedPhoto::class, 'photoable');
    }

    /**
     * Get the user that owns the property.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
