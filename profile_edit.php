<?php
ob_start();
session_start();

$pageTitle="Profile";
if(isset($_SESSION['User'])){
  include 'init.php';

  $do=$_GET['do'];


if($do=='edit'){

  $userid=isset($_GET['UserId'])&&is_numeric($_GET['UserId'])?intval($_GET['UserId']):0;
  $stmt=$con->prepare("SELECT * FROM users where UserId=?  LIMIT 1");
  $stmt->execute(array($userid));
  $row=$stmt->fetch();
  $count=$stmt->rowCount();
  if($count>0){
?>

<div class="edit-profile"> 
<h2 class="text-center">تعديل البيانات</h2>

<div class="container">  

<form  action="?do=update" method="POST">


<input type="hidden" name ="UserId" value="<?php echo $userid?>">


<input placeholder="الاسم" type="text" name="UserName" value="<?php echo $row['Username'] ?>" required="required" >

<input placeholder="البريد الالكنروني" type="email" name="email" value="<?php echo $row['Email'] ?>" required="required">


<input placeholder="الاسم الكامل" type="text" name="FullName" value="<?php echo $row['FullName'] ?>" required="required" >

<input  type="hidden" name="oldpassword"  value="<?php echo $row['Password'] ?>">
<input placeholder="كلمة المرور" type="password" name="newpassword"  autoComplete="new-password">


<input value="تحديث البيانات" type="submit" />
</form>
<div class="alert alert-danger">بعد تعيل البيانات سيتم تسجيل الخروج من الحساب </div>
</div>
  </div>
<?php
  }
  else{
      echo "المستخدم غير موجود";
  }
}


else if($do=='update'){


  if($_SERVER['REQUEST_METHOD']=='POST'){
      echo "<div class='container'>";
      echo "<h2 class='text-center'>تحديث البيانات</h2>";
    $userid=$_POST['UserId'];
    $username=$_POST['UserName'];
    $email=$_POST['email'];
    $FullName=$_POST['FullName'];




  $pass="";
  


  $FormError=array();

  if(strlen($username)<3){
      $FormError="the name than bigger 3 char";
  }
  if(empty($username)){
      $FormError="the username required"; 
  }
  if(empty($email)){
      $FormError="the email required"; 
  }
  if(empty($FullName)){
      $FormError="the FullName required"; 
  }
  foreach($FormError as $FormErro){
      echo $FormErro ."</br>";
  }
  if(empty($_POST['newpassword'])){
      $pass=$_POST['oldpassword'];
  }
  else{
      $pass=sha1($_POST['newpassword']);
  }


  if(empty($FormError)){
      $stmt1=$con->prepare("SELECT * from users where Username=? And UserId!=?");
      $stmt1->execute(array($username,$userid));
      $stmt1->FetchAll();
      $count1=$stmt1->rowCount();
      if($count1==1){
          echo"sorry user is exists";
      }
      else{
    $stmt=$con->prepare("UPDATE users set Username=? ,Email=? , FullName=? ,Password=? where UserId=?");
    $stmt->execute(array($username,$email,$FullName,$pass,$userid));
    
    header("Location: logout.php");
    exit();
  }
  }
  echo "</div>";    
}
  else{
      echo "do not browser directly this page";
  }
  
}}
else{
    header("Location: login.php");
    exit();
  }
  
  include $tp."footer.php";
  ob_end_flush();
  ?>