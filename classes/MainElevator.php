<?php


namespace classes;



abstract class MainElevator
{
    /**
     * Запускает лифт
     *
     */
    abstract public function start();

    /**
     * Выполняет все действия лифта
     */
    abstract public function logic();


    /**
     * Метод определяет количество этажей
     *
     */
    abstract public function floor();
}