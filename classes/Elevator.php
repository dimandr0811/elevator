<?php

namespace classes;

use classes\ElevatorText;


class Elevator
{
    private $floorDif;
    private $floorCurrent;
    private $floorFuture;
    private $neighbourFloorCurrent;
    private $neighbourFloorFuture;
    private $neighbourFloorDif;


    public function __construct($floorFuture, $floorCurrent)
    {
        $this->floorCurrent = (int)$floorCurrent;
        $this->floorFuture = (int)$floorFuture;
        $this->floorDif = abs($this->floorFuture - $this->floorCurrent);
    }



    public function additionalPassengerFloors()
    {
        if ($array = Neighbour::NeighbourGo()) {
//            $this->neighbourFloorCurrent = 1;
//            $this->neighbourFloorFuture = 9;
            $this->neighbourFloorCurrent = $array[0];
            $this->neighbourFloorFuture = $array[1];
            $this->neighbourFloorDif = abs($this->neighbourFloorFuture-$this->neighbourFloorCurrent);
            var_dump($this->neighbourFloorCurrent,$this->neighbourFloorFuture);
            return true;
        } else {
            return false;
        }

    }

//
//    public function logic()
//    {
//
//            //лифт едет только вверх
//            if ($this->floorCurrent < $this->floorFuture){
//
//                // если и я и сосед стартуем с одного этажа
//                if ($this->floorCurrent == $this->neighbourFloorCurrent) {
//                    // сосед поехал выше
//                    if ($this->floorFuture < $this->neighbourFloorFuture) {
//                        sleep($this->floorDif);
//                        $message = $this->messageText();
//                        $message .= " and your neighbour comes to the " . $this->neighbourFloorFuture . " floor";
//                        return $message;
//                    }
//
//                    //  сосед вышел со мной на этаже
//                    if ($this->floorFuture == $this->neighbourFloorFuture) {
//                        sleep($this->floorDif);
//                        $message = $this->messageText();
//                        $message .=' with your neighbour';
//                        return $message;
//                    }
//
//                    // сосед вышел раньше
//                    if ($this->floorFuture > $this->neighbourFloorFuture){
//                        sleep($this->floorDif +1);
//                        $message = $this->messageText();
//                        $message .= " and your neighbour from " . $this->neighbourFloorCurrent . " to " . $this->neighbourFloorFuture .
//                                    " floor. Your trip was 1 second longer, because your neighbour leaved elevator at ".$this->neighbourFloorFuture." floor" ;
//                        return $message;
//                    }
//                }
//
//                // если я нахожусь на этаже выше чем сосед
//                if ($this->floorCurrent > $this->neighbourFloorCurrent){
//
//                    //если разница моего этажа и моего будущего этажа меньше чем ехать до соседа
//                    if (($this->floorDif) <= ($this->floorCurrent - $this->neighbourFloorCurrent)){
//                        sleep($this->floorDif);
//                        $message = $this->messageText();
//                        $message .= " and your neighbour is waiting for elevator at " . $this->neighbourFloorCurrent ." floor";
//                        return $message;
//                    }
//
//                    //если разница моего этажа и моего будущего больше чем ехать до соседа
//                    //нужно ехать за соседом и забирать его
//                    if ($this->floorDif > $this->floorCurrent - $this->neighbourFloorCurrent ){
//                        sleep($this->floorCurrent - $this->neighbourFloorCurrent);
//
//
//                        //завозит соседа на этаж ниже чем мой изначальный или выше моего изначально но ниже будущего
//                        if ($this->floorDif > ($this->neighbourFloorFuture - $this->neighbourFloorCurrent)){
//                            sleep($this->neighbourFloorFuture - $this->neighbourFloorCurrent);
//                            sleep($this->floorFuture - $this->neighbourFloorFuture);
//                            $message = $this->messageText();
//                            $message .= ", but elevator came to  " . $this->neighbourFloorCurrent .
//                                        " floor, then leaved your neighbour at ".$this->neighbourFloorFuture." and came to ".$this->floorFuture." floor with you";
//                            return $message;
//                        }
//
//                        //выходим на одном этаже
//                        if ($this->neighbourFloorFuture == $this->floorFuture) {
//
//                            sleep($this->floorCurrent + $this->neighbourFloorCurrent);
//                            sleep($this->floorDif);
//                            $message = $this->messageText();
//                            $message .= ", but elevator came to  " . $this->neighbourFloorCurrent .
//                                        " floor, then leaved you and your neighbour at ".$this->neighbourFloorFuture." floor.";
//                            return $message;
//                        }
//
//                        //сосед поехал выше
//                        if ($this->neighbourFloorFuture > $this->floorFuture ) {
//                            sleep($this->neighbourFloorCurrent + $this->floorDif);
//                            sleep($this->floorDif);
//                            $message = $this->messageText();
//                            $message .= ", but elevator came to  " . $this->neighbourFloorCurrent .
//                                        " floor, then leaved you at ".$this->floorFuture." and came to ".$this->neighbourFloorFuture." floor with your neighbour";
//                            return $message;
//                        }
//
//                    }
//                }
//            }
//
//            //лифт едет только вниз
//            if ($this->floorCurrent < $this->floorFuture) {
//
//
//                // если и я и сосед стартуем с одного этажа
//                if ($this->floorCurrent == $this->neighbourFloorCurrent) {
//
//                    //сосед поехал ниже
//                    if ($this->floorFuture > $this->neighbourFloorFuture) {
//                        sleep($this->floorDif);
//                        $message = $this->messageText();
//                        $message .= " and your neighbour comes to the " . $this->neighbourFloorFuture . " floor";
//                        return $message;
//                    }
//
//                    //  сосед вышел со мной на этаже
//                    if ($this->floorFuture == $this->neighbourFloorFuture) {
//                        sleep($this->floorDif);
//                        $message = $this->messageText();
//                        $message .=' with your neighbour';
//                        return $message;
//                    }
//
//                    // сосед вышел раньше
//                    if ($this->floorFuture < $this->neighbourFloorFuture){
//                        sleep($this->floorDif +1);
//                        $message = $this->messageText();
//                        $message .= " and your neighbour from " . $this->neighbourFloorCurrent . " to " . $this->neighbourFloorFuture .
//                            " floor. Your trip was 1 second longer, because your neighbour leaved elevator at ".$this->neighbourFloorFuture." floor" ;
//                        return $message;
//                    }
//
//                }
//                // если я нахожусь на этаже ниже чем сосед
//                if ($this->floorCurrent < $this->neighbourFloorCurrent){
//
//                }
//                    //если разница моего этажа и моего будущего этажа меньше чем ехать до соседа
//                    if (($this->floorDif) <= ($this->floorCurrent - $this->neighbourFloorCurrent)){
//                        sleep($this->floorDif);
//                        $message = $this->messageText();
//                        $message .= " and your neighbour is waiting for elevator at " . $this->neighbourFloorCurrent ." floor";
//                        return $message;
//                    }
//
//                    //если разница моего этажа и моего будущего больше чем ехать до соседа
//                    //нужно ехать за соседом и забирать его
//                    if ($this->floorDif > $this->floorCurrent - $this->neighbourFloorCurrent ){
//                        sleep($this->floorCurrent - $this->neighbourFloorCurrent);
//
//
//                        //завозит соседа на этаж ниже чем мой изначальный или выше моего изначально но ниже будущего
//                        if ($this->floorDif > ($this->neighbourFloorFuture - $this->neighbourFloorCurrent)){
//                            sleep($this->neighbourFloorFuture - $this->neighbourFloorCurrent);
//                            sleep($this->floorFuture - $this->neighbourFloorFuture);
//                            $message = $this->messageText();
//                            $message .= ", but elevator came to  " . $this->neighbourFloorCurrent .
//                                " floor, then leaved your neighbour at ".$this->neighbourFloorFuture." and came to ".$this->floorFuture." floor with you";
//                            return $message;
//                        }
//
//                        //выходим на одном этаже
//                        if ($this->neighbourFloorFuture == $this->floorFuture) {
//
//                            sleep($this->floorCurrent + $this->neighbourFloorCurrent);
//                            sleep($this->floorDif);
//                            $message = $this->messageText();
//                            $message .= ", but elevator came to  " . $this->neighbourFloorCurrent .
//                                " floor, then leaved you and your neighbour at ".$this->neighbourFloorFuture." floor.";
//                            return $message;
//                        }
//
//                        //сосед поехал выше
//                        if ($this->neighbourFloorFuture > $this->floorFuture ) {
//                            sleep($this->neighbourFloorCurrent + $this->floorDif);
//                            sleep($this->floorDif);
//                            $message = $this->messageText();
//                            $message .= ", but elevator came to  " . $this->neighbourFloorCurrent .
//                                " floor, then leaved you at ".$this->floorFuture." and came to ".$this->neighbourFloorFuture." floor with your neighbour";
//                            return $message;
//                        }
//
//                    }
//            }
//
//
//    }

    public function logic()
    {
        //смотрим куда ближе ехать/ к соседу или на мой этаж
        if($this->floorDif <= abs($this->neighbourFloorCurrent - $this->floorCurrent)){
            sleep($this->floorDif);
            $message = $this->messageText();
            $message .= " and your neighbour is waiting for elevator at " . $this->neighbourFloorCurrent ." floor";
            return $message;
        } else { // куда ехать ближе/ к соседу на этаж финальный или ко мне
             if (abs($this->floorFuture - $this->neighbourFloorCurrent) < $this->neighbourFloorDif){
                 sleep(abs($this->floorCurrent-$this->neighbourFloorCurrent));
                 sleep(abs($this->floorFuture-$this->neighbourFloorCurrent));
                 $message = $this->messageText();
                 $message .= ". Elevator came to  " . $this->neighbourFloorCurrent .
                     " floor, then leaved you at ".$this->floorFuture." and came to ".$this->neighbourFloorFuture." floor with your neighbour";
                 return $message;
             }
            if (abs($this->floorFuture - $this->neighbourFloorCurrent) > $this->neighbourFloorDif){
                sleep(abs($this->floorCurrent - $this->neighbourFloorCurrent));
                sleep(abs($this->floorFuture - $this->neighbourFloorCurrent));
                $message = $this->messageText();
                $message .= ". But first elevator came to  " . $this->neighbourFloorCurrent .
                    " floor, then leaved your neighbour at ".$this->neighbourFloorFuture." and came to ".$this->floorFuture." floor with you";
                return $message;
            }

        }
        // между этажей вызывает
        if ((($this->floorFuture > $this->neighbourFloorCurrent) && ($this->neighbourFloorCurrent >$this->floorCurrent))
            || (($this->floorFuture < $this->neighbourFloorCurrent) && ($this->neighbourFloorCurrent < $this->floorCurrent))){
            sleep($this->floorDif);
            $message = $this->messageText();
            $message .= ". After elevator came to ". $this->neighbourFloorCurrent . " floor and then leaved your neighbour at " . $this->neighbourFloorFuture . " floor";
        }
    }

    /**
     * Метод меняет этаж пассажира когда сосед отсуствует
     *
     * @return string
     */

    public function start()
    {
        if (($this->floorFuture >0) && ($this->floorFuture <11) && ($this->floorCurrent > 0) && ($this->floorCurrent<11)) {
            if ($this->floorDif == 0) {
                $message = 'You didn\'t change floor';
            } else {
                // если есть сосед
                if ($this->additionalPassengerFloors()){
                    $message = $this->logic();
                } else {
                // если сам
                    sleep($this->floorDif);
                    $message = $this->messageText();
                }
            }
        }
        else{
            $message = 'There is not such floor. Come to the 1st.';
            session_unset();
        }
        return $message;

    }



    public function messageText()
    {
//        $current = ElevatorText::ending($this->floorCurrent);
//        $future = ElevatorText::ending($this->floorFuture);
        if ($this->floorDif == 1) {
            $message = "Your run's over! You've changed " . $this->floorDif . " floor, from " . $this->floorCurrent . " to " . $this->floorFuture . " floor";
            return $message;
        } else {
            $message = "Your run's over! You've changed " . $this->floorDif . " floors, from " . $this->floorCurrent . " to " . $this->floorFuture . " floor";
            return $message;
        }
    }



    public function Floor()
    {
        if (($this->floorFuture >0) && ($this->floorFuture <11) && ($this->floorCurrent > 0) && ($this->floorCurrent<11)) {
            $floor = ElevatorText::ending($this->floorFuture);
            return $message = 'Welcome. It\'s ' . $floor . ' floor';
        }
    }





}
