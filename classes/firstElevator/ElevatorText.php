<?php

namespace classes\firstElevator;


class ElevatorText
{


    public static function ending($text)
    {
        switch ($text) {
            case 1:
                $floor = $text . 'st';
                break;
            case 2:
                $floor = $text . 'nd';
                break;
            case 3:
                $floor = $text . 'rd';
                break;
            default:
                $floor = $text . 'th';
        }
        return $floor;
    }


}