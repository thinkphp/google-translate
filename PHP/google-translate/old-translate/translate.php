<?php

sleep(1);

    require_once('translate.class.php');

    if(isset($_GET['from'])) {
 
             $from = $_GET['from'];

    } else {

             $from = "en";
    }

    if(isset($_GET['to'])) {
 
             $to = $_GET['to'];

    } else {

             $to = "ro";
    }


    if(isset($_GET['text'])) {

           $text = $_GET['text'];  

           $ob = new Translator($text,$from,$to);

           echo htmlentities($ob->translate()).'|'.$ob->from.'|'.$ob->to;
    }


         
?>