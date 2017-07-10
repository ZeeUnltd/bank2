<?php

    include 'product.php';
    include 'book.php';
    include "dvd.php";

    $book = new book("200", "The lion and the Jewel", 500, "book");

    $pageCount =$book->getPageCount();

    echo $pageCount;



    echo "<hr>";

    $dvd = new dvd("1hr30min", "Fast N Furious", 700, "");
    $dvd_price =$dvd->getPrice() ;
    $dur=$dvd->getDuration();


    echo "<h3> DVD </h3> <p> Price is  ".$dvd_price."</p>" ;
    echo "Duration :  ".$dur;




 ?>
