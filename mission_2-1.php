<!DOCTYPE html>
<html>
   <head>

      <meta charset = "utf-8">
      <title>2-1</title>

   </head>
   <body>

     <form action = "mission_2-1.php" method = "post">

     入力欄:<br>
     <input type = "text" value = "コメント" name = "comment"><br>
     <input type = "submit" value = "送信">
     </form>

   <?php
      $comment = $_POST["comment"]; 
      echo $comment."を受け付けました";
   ?>
   </body>
<html>