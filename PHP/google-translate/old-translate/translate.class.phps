<?php

/*
   Author: Adrian Statescu
   Filename: translate.class.php
   Last Modified: 2:09 AM
   Description: This is a simple class translator to get the results[from language TO language]  
                it uses the google           
*/

//The values can be:
	//				from
	//					en: English
	//					de: German
	//					es: Spanish
	//					fr: French
	//					it: Italian
	//					pt: Portuguese
	//				to
	//				 	de: German
	//					es: Spanish
	//					fr: French
	//					it: Italian
	//					pt: Portuguese
	//					en: English




   class Translator {

     //data members

     //expression string text to translate ->required
     private $text;

     //string that represent source language of the text
     public $from;

     //string that represent language to translate
     public $to;

         //constructor of class Translator
         public function __construct($text,$from="ro",$to="en"){

                $this->text = $text; 

                $this->from = $from;

                $this->to = $to;
         }

         //public member translate that really translate the text
         public function translate() {

		$rest = "http://translate.google.com/translate_t?text=" . urlencode($this->text) . "&langpair=$this->from|$this->to";

                $f = file($rest);

                            foreach($f as $v) {

                                    if(strstr($v,'<textarea')) {

                                              $x = strstr($v,'<textarea');
                                    }
                            }

                $arr = explode("</textarea>",$x);

                $arr = explode('id=suggestion>',$arr[1]);

                return $arr[1];

         }//end method

   }//end class


?>