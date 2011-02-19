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

	          $url = "http://translate.google.com/translate_a/t?client=t&text=".urlencode($this->text)."&pc=0&sl=".$this->from."&tl=".$this->to;

                $json = ($this->get($url));

                return $json;

         }//end method

         private function get($url) {

                $ch = curl_init();

                curl_setopt($ch,CURLOPT_URL,$url);

                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

                curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,2);

                $data = curl_exec($ch);

                curl_close($ch);

                if(empty($data)) {

                   return "Error retrieve data. try again.";

                } else {

                  return $data;
                }

         }       

   }//end class


?>