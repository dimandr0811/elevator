<?php

namespace classes\firstElevator;


use classes\MainElevator;


class Elevator extends MainElevator
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




    public function additionalPassengerFloors()
    {
        if ($array = Neighbour::NeighbourGo()) {
            $this->setNeighbourFloorCurrent($array[0]);
            $this->setNeighbourFloorFuture($array[1]);
            $this->setNeighbourFloorDif(abs($this->neighbourFloorFuture-$this->neighbourFloorCurrent));
            var_dump($this->neighbourFloorCurrent,$this->neighbourFloorFuture);
            return true;
        } else {
            return false;
        }

    }





    public function logic()
    {
        //смотрим куда ближе ехать/ к соседу или на мой этаж
        if (($this->floorCurrent == $this->neighbourFloorCurrent)&& ($this->floorFuture == $this->neighbourFloorFuture)){
            sleep($this->floorDif);
            $message = $this->messageText(" with your neighbour");
            return $message;
        }
        if($this->floorDif <= abs($this->neighbourFloorCurrent - $this->floorCurrent)){
            sleep($this->floorDif);
            $message = $this->messageText(" and your neighbour is waiting for elevator at " . $this->neighbourFloorCurrent ." floor");
            return $message;
        } else { // куда ехать ближе/ к соседу на этаж финальный или ко мне
             if (abs($this->floorFuture - $this->neighbourFloorCurrent) < $this->neighbourFloorDif){
                 sleep(abs($this->floorCurrent-$this->neighbourFloorCurrent));
                 sleep(abs($this->floorFuture-$this->neighbourFloorCurrent));
                 $message = $this->messageText(". Elevator came to  " . $this->neighbourFloorCurrent .
                     " floor, then leaved you at ".$this->floorFuture." and came to ".$this->neighbourFloorFuture." floor with your neighbour");
                 return $message;
             }
            if (abs($this->floorFuture - $this->neighbourFloorCurrent) >= $this->neighbourFloorDif){
                sleep(abs($this->floorCurrent - $this->neighbourFloorCurrent));
                sleep(abs($this->floorFuture - $this->neighbourFloorCurrent));
                if ($this->neighbourFloorCurrent == $this->floorCurrent){
                    $message = $this->messageText(". Your neighbour was with you at the same floor and elevator came with him to " . $this->neighbourFloorFuture .
                        " floor and after that came to " . $this->floorFuture. " floor with you");
                } else {
                    if ($this->floorFuture == $this->neighbourFloorFuture){
                        $message = $this->messageText(". But first elevator came to  " . $this->neighbourFloorCurrent .
                            " floor, then leaved you and your neighbour at ".$this->neighbourFloorFuture." floor ");
                    }else {
                        $message = $this->messageText(". But first elevator came to  " . $this->neighbourFloorCurrent .
                            " floor, then leaved your neighbour at ".$this->neighbourFloorFuture." and came to ".$this->floorFuture." floor with you");
                    }

                }
                return $message;
            }

        }
        // между этажей вызывает
        if ((($this->floorFuture > $this->neighbourFloorCurrent) && ($this->neighbourFloorCurrent >$this->floorCurrent))
            || (($this->floorFuture < $this->neighbourFloorCurrent) && ($this->neighbourFloorCurrent < $this->floorCurrent))){
            sleep($this->floorDif);
            $message = $this->messageText(". After elevator came to ". $this->neighbourFloorCurrent . " floor and then leaved your neighbour at " . $this->neighbourFloorFuture . " floor");
            return $message;
        }
    }




    public function messageText($text = "")
    {
        if ($this->floorDif == 1) {
            $message = "Your run's over! You've changed " . $this->floorDif . " floor, from " . $this->floorCurrent . " to " . $this->floorFuture . " floor" . $text;
            return $message;
        } else {
            $message = "Your run's over! You've changed " . $this->floorDif . " floors, from " . $this->floorCurrent . " to " . $this->floorFuture . " floor" .$text;
            return $message;
        }
    }



    public function floor()
    {
        if (($this->floorFuture >0) && ($this->floorFuture <11) && ($this->floorCurrent > 0) && ($this->floorCurrent<11)) {
            $floor = ElevatorText::ending($this->floorFuture);
            return $message = 'Welcome. It\'s ' . $floor . ' floor';
        }
    }


    /**
     * @return float|int
     */
    public function getFloorDif()
    {
        return $this->floorDif;
    }

    /**
     * @return int
     */
    public function getFloorCurrent()
    {
        return $this->floorCurrent;
    }

    /**
     * @return int
     */
    public function getFloorFuture()
    {
        return $this->floorFuture;
    }

    /**
     * @return mixed
     */
    public function getNeighbourFloorCurrent()
    {
        return $this->neighbourFloorCurrent;
    }

    /**
     * @return mixed
     */
    public function getNeighbourFloorFuture()
    {
        return $this->neighbourFloorFuture;
    }

    /**
     * @return mixed
     */
    public function getNeighbourFloorDif()
    {
        return $this->neighbourFloorDif;
    }


    /**
     * @param mixed $neighbourFloorCurrent
     */
    public function setNeighbourFloorCurrent($neighbourFloorCurrent)
    {
        $this->neighbourFloorCurrent = $neighbourFloorCurrent;
    }

    /**
     * @param mixed $neighbourFloorFuture
     */
    public function setNeighbourFloorFuture($neighbourFloorFuture)
    {
        $this->neighbourFloorFuture = $neighbourFloorFuture;
    }


    /**
     * @param mixed $neighbourFloorDif
     */
    public function setNeighbourFloorDif($neighbourFloorDif)
    {
        $this->neighbourFloorDif = $neighbourFloorDif;
    }

}
