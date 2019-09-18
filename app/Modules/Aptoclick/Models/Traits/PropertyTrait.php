<?php

namespace Raffles\Modules\Aptoclick\Models\Traits;

trait PropertyTrait
{
    /**
     * Get the property's first year cost.
     *
     * @return string
     */
    public function getFirstYearCostAttribute($value)
    {
        return $this->sell_price * 0.01 * 12;
    }

    /**
     * Get the property's monthly price.
     *
     * @return string
     */
    public function getMonthlyPriceAttribute($value)
    {
        return $this->sell_price * 0.01;
    }

    /**
     * Get the property's remaining balance.
     *
     * @return string
     */
    public function getRemainingBalanceAttribute($value)
    {
        return $this->sell_price - ($this->sell_price * 0.01 * 36);
    }

    /**
     * Get the property's savings.
     *
     * @return string
     */
    public function getSavingsAttribute($value)
    {
        return $this->sell_price * 0.01 * 36;
    }

    /**
     * Get the property's second year cost.
     *
     * @return string
     */
    public function getSecondYearCostAttribute($value)
    {
        return $this->sell_price * 0.01 * 12;
    }

    /**
     * Get the property's third year cost.
     *
     * @return string
     */
    public function getThirdYearCostAttribute($value)
    {
        return $this->sell_price * 0.01 * 12;
    }
}
