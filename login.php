<?php

session_start();
$pageTitle="Login";
include "init.php";

if(isset($_SESSION['User'])){

    header('Location:index.php');
   
    }
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['login'])){
    $username=$_POST['name'];
    $pass=$_POST['password'];
    $hashPass=sha1($pass);
    $stmt=$con->prepare("SELECT UserId,Username,Password FROM users where Username=? AND Password=?  LIMIT 1");
    $stmt->execute(array($username,$hashPass));
    $get=$stmt->fetch();
    $count=$stmt->rowCount();
    if($count>0){
       $_SESSION['User']=$username;
       $_SESSION['Uid']=$get['UserId'];
       header('Location:home.php');
       exit();
    }
}
else{
  
    
      $passw=$_POST['password'];
      $username=$_POST['name'];
      $email=$_POST['email'];
    $formerror=array();
    if(isset($_POST['name'])){
        $formName=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
    if(strlen($formName)<4){
        $formerror[]="the name than > 4 ";
    }
    if(isset($_POST['password'])&& isset($_POST['new-password'])){
       
      $pass=sha1(($_POST['password']));
      $pass2=sha1(($_POST['new-password']));
      if(empty($_POST['password'])){
        $formerror[]="password is required"; 
      }
      if($pass!==$pass2){
        $formerror[]="the password is not matche new-password";
      }
    }
    if(isset($_POST['email'])){
        $formemail=filter_var($_POST['name'], FILTER_SANITIZE_EMAIL);
     //  if(filter_var($formemail,FILTER_VaLIDATE_EMAIL)!=true){
       //     $formerror="the email is not correct";
        //}
    }

    if(empty($FormError)){

        $check=checkItem('Username' , 'users' , $username);
        if($check===1){
            echo "sory user is exites";
        }
        else{
      $stmt=$con->prepare("INSERT into users (Username,Password,RegStatus,Email,date) values(:zusername,:zpassword,0,:zemail,now())");
      $stmt->execute(array(
         'zusername'=>$username,
         'zpassword'=>sha1($passw),
         
         'zemail'=>$email

      ));
      
      echo $stmt->rowCount().'Record Insert';
    }
    }
}
}
?>
<div class="container login-page">
    <h2 class="text-center "><span class="selected" data-class=".loginF">تسجيل الدخول</span> | <span data-class=".singupF">إنشاء حساب</span></h2>
    <form class="loginF" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <input type="text" class="form-control" name="name" autocomplete="off" placeholder="الاسم">
        <input type="password" class="form-control" name="password" autocomplete="new-password"  placeholder="كلمة المرور">
        <input type="submit" value="تسجيل الدخول" name="login" class="btn btn-primary btn-block">
    </form>
    <form class="singupF" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <input type="text" pattern=".{4,8}"  title="UserName Must < 4 chartaers"    class="form-control" name="name" autocomplete="off" placeholder="الاسم">
        <input type="password" minlength=6 class="form-control" name="password" autocomplete="new-password"  placeholder="كلمة المرور">
        
        <input type="password" minlength=6 class="form-control" name="new-password" autocomplete="new-password"  placeholder="تأكيد كلمة المرور">
        <input type="email" class="form-control" name="email" autocomplete="off" placeholder="البريد الالكتروني">
        <input type="submit" value="إنشاء حساب" name="singup" class="btn btn-success btn-block">
    </form>
</div>
<div class="form-errors"><?php
  if(!empty($formerror)){
      foreach($formerror as $error){
          echo $error ."<br />";
      }
  }
  ?>
</div>
<?php
include $tp."footer.php";
?>
