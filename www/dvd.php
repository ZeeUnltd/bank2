<?php

    class dvd extends product {

        private $duration;

        public function __construct($dur, $title, $price)
        {
          parent::__construct($title, $price);
          $this->duration =$dur;

        }

        public function getDuration(){
          return $this->duration;
        }

        public function setDuration($duration){
          return $this->duration=$duration;

        }

        public function preview(){
          echo "<p> Duration:</p>".$this->getDuration();
          echo "<p> Price: </p>".$this->getPrice();
          echo "<p> Title:>/p>".$this->getTitle();

        }






    }
















 ?>
