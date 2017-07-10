<?php
    abstract class product
    {
          protected $title;
          protected $price;
          protected $type;

          public function __construct($title, $price)
          {
            $this->title = $title;
            $this->price = $price;

            #$this->type =$type;
          }

          public function getPrice(){
            return $this->price;
          }

          public function setprice($price)
          {
            return $this->price;
          }

          public function gettype(){
            return $this->type;
          }

          abstract public function preview();
    }






  ?>
