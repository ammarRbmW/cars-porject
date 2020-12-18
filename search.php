<?php
session_start();
$pageTitle="HomePage";
include "init.php"

?>



<?php 
  if($_SERVER['REQUEST_METHOD']=='POST'){
    echo '<section class="info_car text-center">
    <div class="container">
        <div class="row">';
    $formserror=array();
 
    $price1=filter_var($_POST['price1'], FILTER_SANITIZE_NUMBER_INT);
    $price2=filter_var($_POST['price2'], FILTER_SANITIZE_NUMBER_INT);

    $stmt1=$con->prepare("SELECT * from cars where price >= $price1 And price <=$price2 order by id DESC");
    $stmt1->execute();
    $getcat=$stmt1->fetchAll();
if(!empty($getcat)){
    
 


  
    foreach($getcat as $item){
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
  } 
 
  


 
 else{
   echo "<div class='alert alert-danger'>لاتوجد سيارة بالاسعار المطلوبة</span>" ;
 }
 echo ' </div>
 </div></section>';
}
 
 ?>
   















<div class="add-car block">
  <div class="container">
   <div class="panel panel-default">
    <div class="panel-heading">معلومات السيارة</div>
    <div class="panel-body">
     <div class="row">
    <div class="col-md-7">
    <form  action="<?php $_SERVER['PHP_SELF']?>" method="POST" class="form-horizontal">
           <div class="form-group form-group-lg">
           <label class="col-sm-2 col-md-4 label-control">السعر يبدأ من</label>
          <div class="col-sm-10 col-md-8 ">
           <input class="form-control add-name" placeholder="السعر يبدا من" type="text" name="price1"  required="required" >
           </div> 
           </div>
           <div class="form-group form-group-lg">
           <label class="col-sm-2 col-md-4 label-control">السعر ينتهي</label>
          <div class="col-sm-10 col-md-8">
           <input class="form-control add-name" placeholder="السعر ينتهي ب" type="text" name="price2"  required="required" >
           </div> 
           </div>
           <div class="form-group form-group-lg"> 
         <div class="col-sm-10 col-md-8 col-md-offset-4 col-sm-offset-2"> 
           <input value="ابحث"  type="submit" class="btn btn-primary">
           </div>   
        </div> 
</form>  

     </div>

      </div>   

    </div>
   </div>
  </div>
</div>         
<?php
include $tp."footer.php";
?>
