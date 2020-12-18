<?php

include "init.php";
if(isset($_GET['pagename'])){
?>

<div class="container">
    <h2 class="text-center"><?php echo str_replace('-','', $_GET['pagename'])?></h2>

<?php 

    echo'<section class="info_car text-center">
  <div class="container">';
  if(!empty(getItems('cat_id',$_GET['pageid'],1))){
    echo'<div class="row">';
    foreach(getItems('cat_id',$_GET['pageid'],1) as $item){
      $imagearr=array();
      $imagearr[]=explode(',',$item['image']);
      
      echo '<div class="col-md-3 col-sm-6">
          <div class="price_car">
            <h3 class="text-info">'.$item['name_c'].'</h3>';
            echo'<p class="center-block">'.$item['price']. '  ل.س</p>';
          echo'<ul class="list-unstyled text-center">;
              <li> <span>موديل السيارة </span> ' .$item['model_car'].'</li>
              <li> <span>الشركة المصنعة </span>'.$item['company_made'].'</li>
              <li> <span>لون السيارة </span>'.$item['color'].'</i>
              <li> <span>المحافظة </span>'.$item['city'].'<li>
            </ul>';
            echo '<img src="upload/cars/'.$imagearr[0][0].'" alt="صورة"/>';
            echo'<a href="items.php?itemid='.$item['id'].'" class="btn btn-info"> المزيد من التفاصيل</a>
          </div>
      </div>';
      
    }
  echo'
    </div>';
  }
  else{
    echo "<div class='alert alert-danger'>حالياً لا يوج سيارة من هذا الصنف  </div>";
  }
  echo '</div>
  
  
  </section>';
 ?>


</div>
<?php
}
else{
  header("Location: index.php");
  exit();
}include $tp."footer.php";
?>
