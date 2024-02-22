<?php

namespace App\Models\Traits;

use Carbon\Carbon;

trait GetDate
{
    /**
     * Оборачиваем created_at
     * в топиках и коммнетариях
     * для использования методов Carbon
     *
     * @return Carbon
     */
    public function getDateAsCarbonAttribute()
    {
        return Carbon::parse($this->created_at);
    }
}
