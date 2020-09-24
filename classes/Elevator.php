<?php

namespace classes;

use classes\ElevatorText;

class Elevator
{
    private $floorDif;
    private $floorCurrent;
    private $floorFuture;


    public function __construct($floorFuture, $floorCurrent)
    {
        $this->floorCurrent = (int)$floorCurrent;
        $this->floorFuture = (int)$floorFuture;
        $this->floorDif = abs($this->floorFuture - $this->floorCurrent);
    }

    public function timeToWait()
    {
        if (($this->floorFuture >0) && ($this->floorFuture <11) && ($this->floorCurrent > 0) && ($this->floorCurrent<11)) {
            if ($this->floorDif == 0) {
                $message = 'You didn\'t change floor';
            } else {
                $current = ElevatorText::ending($this->floorCurrent);
                $future = ElevatorText::ending($this->floorFuture);
                if ($this->floorDif == 1) {
                    $message = 'Your run\'s over! You\'ve changed ' . $this->floorDif . ' floor (and second) , from ' . $current . ' to ' . $future . ' floor';
                } else {
                    $message = 'Your run\'s over! You\'ve changed ' . $this->floorDif . ' floors (and seconds) , from ' . $current . ' to ' . $future . ' floor';
                }
            }
        }
        else{
            $message = 'There is not such floor. Come to the 1st.';
            session_unset();
        }
        return $message;

    }

    public function sleep()
    {
        if (($this->floorFuture >0) && ($this->floorFuture <11) && ($this->floorCurrent > 0) && ($this->floorCurrent<11)) {
            sleep($this->floorDif);
            return true;
            }
    }

    public function goFloor()
    {
        if ($this->sleep()) {
            $floor = ElevatorText::ending($this->floorFuture);
            return $message = 'Welcome. It\'s ' . $floor . ' floor';
        }
    }





}
