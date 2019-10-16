<!DOCTYPE html>
<html>
   <head>

      <meta charset = "utf-8">
      <title>2-2</title>

   </head>
   <body>

     <form action = "mission_2-3.php" method = "post">

     入力欄:<br>
     <input type = "text" value = "コメント" name = "comment"><br>
     <input type = "submit" value = "送信">
     </form>

  <?php
     $filename = "mission_2-3.txt";

     if(!empty($_POST["comment"])){
     $comment = $_POST["comment"];
     $fp = fopen("$filename" , "a");   
     fwrite($fp , $comment . "\n");
     fclose($fp);
          if($comment !== "完成"){
          echo $comment . "を受け付けました";
	  }elseif($comment === "完成"){
          echo "おめでとう";
          }
     }
  ?>
   </body>
<html>