<?php
sleep(1);
     require_once('translate.class.php'); 
     $q = (isset($_POST['q']) && $_POST['q'] != '') ? $_POST['q'] : 'hello word'; 
     $from = (isset($_GET['from']) && $_GET['from'] != '') ? $_GET['from'] : 'en'; 
     $to = (isset($_GET['to']) && $_GET['to'] != '') ? $_GET['to'] : 'ro'; 
     $langpair = "$from|$to"; 
     $data = array('version'=>'1.0',
                   'q'=>$q,
                   'langpair'=>$langpair);
     $ob = new GoogleLanguage($data);
     echo$ob->translate();
?>