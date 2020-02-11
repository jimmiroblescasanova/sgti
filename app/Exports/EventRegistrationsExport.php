<?php

namespace App\Exports;

use App\EventRegistration;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class EventRegistrationsExport implements FromQuery
{
    use Exportable;

    public function evento(int $event)
    {
        $this->event_id = $event;

        return $this;
    }

    public function query()
    {
        return EventRegistration::query()->where('event_id', '=', $this->event_id);
    }
}
