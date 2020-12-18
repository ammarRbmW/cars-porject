<?php
ob_start();
session_start();
$pageTitle="car";
include "init.php";

$id=isset($_GET['itemid'])&&is_numeric($_GET['itemid'])?intval($_GET['itemid']):0;
$stmt=$con->prepare("SELECT cars.* ,categories.nameC, users.Username 
from cars INNER JOIN categories ON categories.id =cars.cat_id INNER JOIN users ON
 users.UserId =cars.user_id 
 where cars.id=? And approve=1");
$stmt->execute(array($id));

$count=$stmt->rowCount();
if($count>0){
    $row=$stmt->fetch();
    $imagearr=array();
    $imagearr[]=explode(',',$row['image']);
?>
<h1 class="text-center"><?php echo $row['name_c']?></h1>
<div class="container">
  <div class="row">
    <div class="col-md-3">
    <?php for ($i=0; $i<sizeof($imagearr[0]);$i++ )
     echo '<img class="img-responsive img-thumbnail center-block" src="upload/cars/'.$imagearr[0][$i].'" alt="img">';
     ?>
    </div>
    <div class="col-md-9 item-info">
      <h2><?php  echo"سيارة  ". $row['name_c']?></h2>
      <p><?php  echo $row['discription']?></p>
      
    <ul class="list-unstyled">
      <li><i class="fa fa-calendar fa-fw"> </i><span> :تاريخ اضافة العرض</span><?php  echo $row['date']?></li>
      <li><i class="fa fa-money fa-fw"></i><span>سعر التاجير اليومي </span><?php  echo $row['price']?></li>
      <li><i class="fa fa-building fa-fw"></i><span> البلد المصنع </span><?php  echo $row['countryMade']?></li>
      <li><i class="fa fa-tags fa-fw"></i><span> الصنف </span><?php  echo $row['nameC']?></li>
      <li><i class="fa fa-tags fa-fw"></i><span>  لون السيارة:  </span><?php  echo $row['color']?></li>
      <li><i class="fa fa-tags fa-fw"></i><span>  الشركة المصنعة: </span><?php  echo $row['company_made']?></li>
      <li><i class="fa fa-tags fa-fw"></i><span>  تاريخ الصنع: </span><?php  echo $row['date_made']?></li>
      <li><i class="fa fa-tags fa-fw"></i><span>  موديل السيارة: </span><?php  echo $row['model_car']?></li>
      <li><i class="fa fa-tags fa-fw"></i><span>  المحافظة: </span><?php  echo $row['city']?></li>
      <li><i class="fa fa-user fa-fw"></i><span>  اسم المؤجر</span><?php  echo $row['Username']?></li>
      </ul>
    </div>
  </div>
</div>
<?php
}
else{
  echo "No such id or add car is watiing aaprovw";
}
include $tp."footer.php";
ob_end_flush();
?>