<!DOCTYPE html>
<html>
   <head>

      <meta charset = "utf-8">
      <title>2-4-α</title>

   </head>
   <body>

     <form action = "mission_2-4.php" method = "post">

     入力欄:<br>
     <input type = "text" value = "" name = "comment"><br>
     <input type = "submit" value = "送信">
     </form>

  <?php
     $filename = "mission_2-4.txt";
     
     if(!empty($_POST["comment"])){
     	$comment = $_POST["comment"];
     	$fp = fopen("$filename" , "a");
     	if ($comment === "完成"){
     	fwrite($fp , "おめでとう！" . "\n");
     	fclose($fp);
    	 }elseif($comment !== "完成"){
    		 fwrite($fp , "$comment"."を受け付けました" . "\n");
    		 fclose($fp);
    		 }
   	$line = file($filename);
    	foreach($line as $value){
     
	echo "$value" , "<br>";
		  
    	 }
     }
  ?>
   </body>
<html>