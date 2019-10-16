<?php

  $age = 21;

  if ($age >= 18 && $age < 85){ 

  echo "自動車免許が取れます";

  }elseif ($age < 18){

  echo "自動車免許はまだ取得できません";

  }else{

  echo "免許を返納しませんか？";
  
  }
  
?>