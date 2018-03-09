<?php

namespace App\Http\Functions;

use Carbon\Carbon;

class DateFunctions {

    public function getLastDayOfMonth($mes = null)
    {
        $currentDate = Carbon::now();

        if (is_null($mes) || $mes == '')
            $fecha = $currentDate->copy()->lastOfMonth();
        else
            $fecha = $currentDate->copy()->month($mes)->lastOfMonth();

        $fecha->hour(23)->minute(59)->second(59);
        return $fecha->format('d-m-Y H:i:s');
    }

    public function getFirstDayOfMonth($mes = null)
    {
        $currentDate = Carbon::now();

        if (is_null($mes) || $mes == '')
            $fecha = $currentDate->copy()->firstOfMonth();
        else
            $fecha = $currentDate->copy()->month($mes)->firstOfMonth();

        $fecha->hour(23)->minute(59)->second(59);
        return $fecha->format('d-m-Y H:i:s');
    }

    public function displayLastDayOfMonth()
    {
        setlocale(LC_TIME, 'es', 'es_ES', 'esp', 'esm', 'esn');
        $fecha = Carbon::createFromFormat('d-m-Y H:i:s', $this->getLastDayOfMonth());
        return $fecha->formatLocalized('%A, %d de %B del %Y');
    }

}