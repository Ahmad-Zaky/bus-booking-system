<?php


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
