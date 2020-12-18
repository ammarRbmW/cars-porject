<?php
session_start();
$pageTitle="HomePage";
include "init.php"

?>
<div class="container">
<h2 class="text-center"><?php echo str_replace('-','', $_GET['pagename'])?></h2>
    <div class="row">


<?php 

if(!empty(getAllcar('cars','id',str_replace('-','', $_GET['pagename'])))){

  echo'<section class="info_car text-center">
<div class="container">

  <div class="row">';
  foreach(getAllcar('cars','id',str_replace('-','', $_GET['pagename'])) as $item){
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
  </div>
</div>


</section>';}

  
 
 else{
   echo "<div class='alert alert-danger'>حالياً لا يوج سيارة من هذه العلامة التجارية</div>";
 }?>
    </div>
</div>
<?php
include $tp."footer.php";
?>
