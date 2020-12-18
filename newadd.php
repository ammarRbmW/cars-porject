<?php
session_start();
$pageTitle="Profile";
include "init.php";


if( isset($_SESSION['User'])){

  if($_SERVER['REQUEST_METHOD']=='POST'){

   $formserror=array();
   $name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $color=filter_var($_POST['color'], FILTER_SANITIZE_STRING);
   $company_made=filter_var($_POST['company_made'], FILTER_SANITIZE_STRING);
   $model_car=filter_var($_POST['model_car'], FILTER_SANITIZE_STRING);
   $date_made=filter_var($_POST['date_made'], FILTER_SANITIZE_STRING);
   $city=filter_var($_POST['city'], FILTER_SANITIZE_STRING);
   $description=filter_var($_POST['description'], FILTER_SANITIZE_STRING);
   $price=filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT);
   $numberP=filter_var($_POST['numberP'], FILTER_SANITIZE_STRING);
   $country=filter_var($_POST['country'], FILTER_SANITIZE_STRING);
   $status=filter_var($_POST['status'], FILTER_SANITIZE_NUMBER_INT);
   $category=filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
   $image=$_FILES['image'];
   $nameavater=$image['name']; 
   $sizeavater=$image['size']; 
   $typeavater=$image['type']; 
   $tmpavater=$image['tmp_name']; 
   $erravater=$image['error']; 
   $arrextention=array("png","jpg","jpeg","gif");
   $countImg=count($nameavater);
   $imgesName=array();$imgesNam=array();
   if($erravater[0]==4){
     $formserror[]="رجاء ادخل صورة واحدة للسيارة على الاقل";
   }
   for($i=0;$i<$countImg;$i++){
  $extaintionv[$i]=explode('.',$image['name'][$i]);
  $extaintionA[$i]=strtolower(end($extaintionv[$i]));
  $imgesNam[$i]=rand(0, 300000)."_".$nameavater[$i];
  if(!in_array($extaintionA[$i],$arrextention)){
    $formserror[]="the  extantion ".$extaintionA[$i]."  not allowed ";
  }
     if($sizeavater[$i] >4300004){
      $formserror[]="image".($i+1)." Can not large than <strong>4MB</strong>";
     }
     if(empty($formserror)){
      move_uploaded_file($tmpavater[$i],"upload/cars//".$imgesNam[$i]);
     
      $imgesName[]=$imgesNam[$i];
     }
   }
   $img_filed=implode(',',$imgesName);
   

   if(strlen($name)<4){
    $formserror[]="the Tite must Be at least 4 characters";
}
if(strlen($description)<10){
  $formserror[]="the description must Be at least 10 characters";
}
if(strlen($country)<2){
  $formserror[]="the country must Be at least 2 characters";
}
if(empty($price)){
  $formserror[]="the price must  not empty";
}
if(empty($status)){
  $formserror[]="the status must  not empty";
}
if(empty($category)){
  $formserror[]="the category must  not empty";
}
if(empty($formserror)&&empty($errorsimage)){

        
  $stmt=$con->prepare("INSERT into cars (name_c,discription,countryMade,price,status,cat_id,user_id,date,image,color,date_made,city,company_made,numberP,model_car) values(:zname,:zdiscription,:zcountry,:zprice,:zstatus,:zcat,:zuser,now(),:zimage,:zcolor,:zdate_made,:zcity,:zcompany_made,:znumberP,:zmodel_car)");
  $stmt->execute(array(
     'zname'=>$name,
     'zdiscription'=>$description,
     'zcountry'=>$country,
     'zprice'=>$price,
      'zstatus'=>$status,
      'zcat'=>$category,
      'zuser'=>$_SESSION['Uid'],
       'zimage'=>$img_filed,
       'zcolor'=>$color,
       'zdate_made'=>$date_made,
        'zcity'=>$city,
        'zcompany_made'=>$company_made,
        'znumberP'=>$numberP,
        'zmodel_car'=>$model_car

  ));

  if($stmt){
  $success="تمت اضافة طلبك بنجاح سيتم مراجعى طلبك من قبل ادارة الموضع ضمن 24 ساعة";
}
else{
  echo "not insert car";
}
  }
}
?>
<h1 class="text-center">أضف سيارة جديدة</h1>


<div class="add-car block">
  <div class="container">
   <div class="panel panel-default">
    <div class="panel-heading">معلومات السيارة</div>
    <div class="panel-body">
     <div class="row">
    <div class="col-md-7">
      <form  action="<?php $_SERVER['PHP_SELF']?>" method="POST" class="form-horizontal"  enctype="multipart/form-data">
           <div class="form-group form-group-lg">
           <label class="col-sm-2 col-md-4 label-control">النوع</label>
          <div class="col-sm-10 col-md-8">
           <input class="form-control add-name" placeholder="اكتب نوع السيارة" type="text" name="name"  required="required" >
           </div> 
           </div>
         
           <div class="form-group form-group-lg">
           <label class="col-sm-2 col-md-4 label-control">الوصف</label> 
           <div class="col-sm-10 col-md-8"> 
           <input class="form-control add-description" placeholder="اكتب وصف للسيارة" type="text" name="description" required="required">
           </div> 
           </div> 

           <div class="form-group form-group-lg">
           <label class="col-sm-2 col-md-4  label-control">السعر </label>
           <div class="col-sm-10 col-md-8">
           <input class="form-control add-price" placeholder="اكتب سعر الاجار اليومي" type="text" name="price" required="required">
           </div> 
           </div> 
           <div class="form-group form-group-lg">
           <label class="col-sm-2 col-md-4  label-control">البلد</label>
           <div class="col-sm-10 col-md-8">
           <input class="form-control add-country" placeholder="اكتب اسم البلد المصنع للسيارة" type="text" name="country" required="required">
           </div> 
           </div> 
           <div class="form-group form-group-lg">
           <label class="col-sm-2 col-md-4  label-control">تاريخ التصنيع</label>
           <div class="col-sm-10 col-md-8">
           <input class="form-control add-country" placeholder="اكتب تاريخ تصنيع السيارة" type="text" name="date_made" required="required">
           </div> 
           </div> 
           <div class="form-group form-group-lg">
           <label class="col-sm-2 col-md-4  label-control">لون السيارة</label>
           <div class="col-sm-10 col-md-8">
           <input class="form-control add-country" placeholder="ادخل لون سيارتك" type="text" name="color" required="required">
           </div> 
           </div> 
           <div class="form-group form-group-lg">
           <label class="col-sm-2 col-md-4  label-control">رقم اللوحة</label>
           <div class="col-sm-10 col-md-8">
           <input class="form-control add-country" placeholder="ادخل رقم لوحة السيارة" type="text" name="numberP"required="required">
           </div> 
           </div> 
           <div class="form-group form-group-lg">
           <label class="col-sm-2 col-md-4  label-control">المحافظة</label>
           <div class="col-sm-10 col-md-8">
           <input class="form-control add-country" placeholder="ادخل اسم المحافظة" type="text" name="city" required="required">
           </div> 
           </div> 
           <div class="form-group form-group-lg">
           <label class="col-sm-2 col-md-4  label-control">الشركة المصنعة</label>
           <div class="col-sm-10 col-md-8">
           <input class="form-control add-country" placeholder="ادخل اسم الشركة المصنعة" type="text" name="company_made"required="required" >
           </div> 
           </div> 
           <div class="form-group form-group-lg">
           <label class="col-sm-2 col-md-4  label-control">موديل السيارة</label>
           <div class="col-sm-10 col-md-8">
           <input class="form-control add-country" placeholder="ادخل موديل السيارة " type="text" name="model_car" required="required">
           </div> 
           </div> 

           <div class="form-group form-group-lg">
           <label class="col-sm-2 col-md-4 label-control">الحالة</label>
           <div class="col-sm-10 col-md-8">
             <select class="form-control" name="status">
                 <option value="0">...</option>
                 <option value="1">جديدة</option>
                 <option value="2">مستخدمة</option>
                 <option value="3">قديمة</option>
                 
             </select >
           </div> 
           </div> 
           <div class="form-group form-group-lg">
           <label class="col-sm-2 col-md-4 label-control">التصنيف</label>
           <div class="col-sm-10 col-md-8">
             <select class="form-control" name="category">
                 <option value="0">...</option>
                 <?php 
                 $stam1=$con->prepare("select id,nameC from categories");
                 $stam1->execute();
                  $rows=$stam1->fetchAll();
                  foreach ($rows as $row){
                 ?>
                 <option value="<?php echo $row['id']?>"><?php echo $row['nameC']?></option>
                  <?php }?>
             </select >
           </div> 
           </div> 
           <div class="form-group form-group-lg"> 
            <label class="col-sm-2 col-md-4 control-label">صور السيارة</label>
         <div class="col-sm-10 col-md-8">  
           <input class="form-control" type="file" name="image[]"  multiple="multiple" required="required">
         </div>   
        </div>

        <div class="form-group form-group-lg"> 
         <div class="col-sm-10 col-md-8 col-md-offset-4 col-sm-offset-2"> 
           <input value="أضف سيارة"  type="submit" class="btn btn-primary">
           </div>   
        </div>   
        </form>
     </div>

      </div>   
         <?php
           if(!empty($formserror)){
             foreach($formserror as $formerror){
               echo '<div class="alert alert-danger">'.$formerror.'</div>';
             }}
             
           if(isset($success)){
             echo   '<div class="alert alert-success">'.$success.'</div>';
           }
         ?>
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
?>
