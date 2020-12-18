<?php
ob_start();
session_start();

$pageTitle="Profile";
  include 'init.php';




if( isset($_SESSION['User'])){
  $getuser=$con->prepare("SELECT * from users where Username=?");
  $getuser->execute(array($_SESSION['User']));
  $info=$getuser->fetch();
?>

</section>
<h1 class="text-center">معلومات الشخصية</h1>


<div class="information block">
  <div class="container">
   <div class="panel panel-default">
    <div class="panel-heading">معلومات الحساب</div>
    <div class="panel-body">
    <ul class="list-unstyle">

    <li> <i class="fa fa-unlock-alt fa-fw"></i><span> الاسم: </span><?php echo $info['Username']?></li> <br />
    <li> <i class="fa fa-envelope-o fa-fw"></i> <span>البري الإلكروني: </span><?php echo $info['Email']?> </li><br />
    <li> <i class="fa fa-user fa-fw"></i><span> الاسم الكامل: </span><?php echo $info['FullName']?></li> <br />
    <li>  <i class="fa fa-calendar fa-fw"></i><span>التاريخ: </span><?php echo $info['date']?></li> <br />
    
    </ul>
    <a href="profile_edit.php?do=edit&UserId=<?php echo $_SESSION['Uid'];?>" class="btn btn-default">edit</a>
    </div>
   </div>
  </div>
</div>

<div class="my-ads block">
  <div class="container">
   <div class="panel panel-default">
    <div class="panel-heading">إعلاناتك</div>
    <div class="panel-body">

   <?php
      if(!empty(getItems('user_id',$info['UserId'],1))){


    echo'<section class="info_car text-center">

  
    <div class="row">';
    foreach(getItems('user_id',$info['UserId'],1) as $item){
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
  
  
  </section>';} 
 
 else{
  echo "<div class='alert alert-danger'>لم تضف أيّ سيارة </span>" ;
 }?>

    </div>
   </div>
  </div>
</div>






<?php
}
else{
  header("Location: login.php");
  exit();
}

include $tp."footer.php";
ob_end_flush();
?>
