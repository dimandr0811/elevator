<?php


namespace classes;


class Neighbour
{
    private $currentFloor;

    public static function NeighbourRandom()
    {
        if (1 === rand(1,20)){
            return true;
        }
    }

    public static function NeighbourFloor($currentFloor)
    {
        $neighbourFloor = rand(1,10);
        if ($currentFloor != $neighbourFloor){
            return $neighbourFloor;
        }
        return 'Your neighbour at the same floor as you';
    }

    public static function NeighbourGo($floorCurrent, $floorDif)
    {
        
    }
}