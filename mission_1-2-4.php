<?php
  //ƒ~ƒbƒVƒ‡ƒ“‚P|‚Q|‚S
     $hensu = "hello workd";
     $filename = "mission_1-2.txt";
     $fp = fopen($filename,"w");
     fwrite($fp, $hensu);
     fclose($fp); 
?>