<?php


namespace classes;


class Neighbour
{
    /**
     * Метод определяет шанс появления соседа
     *
     * @return bool
     */
    public static function NeighbourRandom()
    {
        if (1 === rand(1,1)){
            return true;
        }
    }

    /**
     * Метод проверяет наличия соседа и если он есть - возвращает массивом его этажи
     * Иначе возвращает false
     * @return array|bool
     */
    public static function NeighbourFloor()
    {
        $array = [];

        if (static::NeighbourRandom()){
            $neighbourFloor = rand(1,10);
            $neighbourFutureFloor = rand(1,10);

            if ($neighbourFloor = $neighbourFutureFloor){
                $neighbourFutureFloor = rand(1,10);
            }

            array_push($array,$neighbourFloor,$neighbourFutureFloor);
            return $array;

        }
        return false;
    }

    public static function NeighbourGo()
    {
        return static::NeighbourFloor(); // определяем этажи соседа

    }
}