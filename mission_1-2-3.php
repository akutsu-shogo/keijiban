<?php
  //�~�b�V�����P�|�Q�|�R
     $hensu = "hello workd";
     $filename = "mission_1-2.txt";
     $fp = fopen($filename,"a");
     fwrite($fp, $hensu);
     fclose($fp); 
?>