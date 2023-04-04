<?php

use Carbon\Carbon;

if (! function_exists("flatPrevStations")) {
    function flatPrevStations($station)
    {
        $stations = [];
        if ($station->prevStation) {
            $stations[] = $station->prevStation;
            $stations = array_merge($stations, flatPrevStations($station->prevStation));
        }

        return $stations;
    }
}

if (! function_exists("flatNextStations")) {
    function flatNextStations($station)
    {
        $stations = [];
        if ($station->nextStation) {
            $stations[] = $station->nextStation;
            $stations = array_merge($stations, flatNextStations($station->nextStation));
        }

        return $stations;
    }
}


if (! function_exists("compareFromAndTo")) {
    function compareFromAndTo($q, $column, $from, $to)
    {
        $from = Carbon::parse($from)->startOfDay()->format('Y-m-d H:i:s');
        $to = Carbon::parse($to)->endOfDay()->format('Y-m-d H:i:s');

        return $q->where(function($q) use ($from, $to, $column) {
            return $q->whereBetween($column, [$from, $to]);
        });
    }
}

if (! function_exists("compareFrom")) {
    function compareFrom($q, $column, $from)
    {
        $from = Carbon::parse($from)->startOfDay()->format('Y-m-d H:i:s');

        return $q->where(function($q) use ($from, $column) {
            return $q->where($column, ">=", $from);
        });
    }
}

if (! function_exists("compareTo")) {
    function compareTo($q, $column, $to)
    {
        $to = Carbon::parse($to)->endOfDay()->format('Y-m-d H:i:s');

        return $q->where(function($q) use ($to, $column) {
            return $q->where($column, "<=", $to);
        });
    }
}
