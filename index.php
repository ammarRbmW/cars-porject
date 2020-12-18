<?php
session_start();
$pageTitle="HomePage";
include "init.php"

?>
<div class="container">
    <div class="row">


<?php 

if(!empty(getAllForm('cars','id','where approve=1'))){

  echo'<section class="info_car text-center">
<div class="container">
<h1>أقوى العروض المقدمة من شركتنا</h1>
  <div class="row">';
  foreach(getAllForm('cars','id','where approve=1') as $item){
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

     // echo '<div class=" col-md-6 col-lg-4">';
      //echo '<div class="items-box">'; 
      //echo '<div class="thumabnail item-box">';
      //echo '<span class="price-tag">'.$item['price'].'</span>';
      
      //echo '<div class="caption">';
      
      //$imagearr[]=explode(',',$item['image']);
      
     

     // echo "<img src='upload/cars/".$imagearr[0][0]."'alt='image' class='img-responsive'style='width:350px;height:200px;'>"; 
      //if(sizeof($imagearr[0])>1){
     //   echo "عرض المزيد من الصور";
      //}
      /*echo '<h3> <a href="items.php?itemid='.$item['id'].'">'.$item['name_c'].'</a></h3>';
      echo '<p>'.$item['discription'].'</p>';
      echo '<div class="date">'.$item['date'].'</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';*/

  
 
 else{
   echo "there is not item";
 }?>
    </div>
</div>
<?php
include $tp."footer.php";
?>
