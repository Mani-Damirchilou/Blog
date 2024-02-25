<?php

namespace App\Traits;

use Hekmatinasser\Verta\Verta;

trait HasPersianDateTime
{
    public function getCreatedAtToPersianAttribute()
    {
        return (new Verta($this->created_at))->formatDifference();
    }
    public function getUpdatedAtToPersianAttribute()
    {
        return (new Verta($this->updated_at))->formatDifference();
    }
}
