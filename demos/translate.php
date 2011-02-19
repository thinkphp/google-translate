<?php
sleep(1);
     require_once('translate.class.php'); 
     $q = (isset($_POST['text']) && $_POST['text'] != '') ? $_POST['text'] : 'hello word'; 
     $from = (isset($_POST['from']) && $_POST['from'] != '') ? $_POST['from'] : 'en'; 
     $to = (isset($_POST['to']) && $_POST['to'] != '') ? $_POST['to'] : 'ro'; 
     $langpair = "$from|$to"; 
     $data = array('version'=>'1.0',
                   'q'=>$q,
                   'langpair'=>$langpair);
     $ob = new GoogleLanguage($data);
     $arr = array('translatedText'=>stripslashes(html_entity_decode($ob->translate())));
     echo json_encode($arr);
?>