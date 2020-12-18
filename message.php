<?php
include "init.php";

if($_SERVER['REQUEST_METHOD']=='POST'){

 
    $name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email=filter_var($_POST['email'],  FILTER_SANITIZE_EMAIL);
    $subject=filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $phone=filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
    $message=filter_var($_POST['message'], FILTER_SANITIZE_NUMBER_INT);
    $stmt=$con->prepare("INSERT into messages (name_m,email,phone,subject,date,message) values(:zname,:zemail,:zphone,:zsubject,now(),:zmessage)");
    $stmt->execute(array(
        ':zname'=>$name,
        ':zemail'=>$email,
        ':zphone'=>$phone,
        'zsubject'=>$subject,
        'zmessage'=>$message
    ));
    if($stmt){
        echo "<div class='alert alert-success'>تم إرسال الرسالة سيتم مراجعة رسالتك </div>";
        header("Refresh:3; url=home.php");
      }
      else{
        echo "<div class='alert alert-danger'>حدث خطأ أعد ارسال الرسالة  </div>";
        header("Refresh:3; url=home.php");
      }
    }
    else{
        echo "<div class='alert alert-danger'>لا يمكن الدخول إلى الرابط بشكل مباشر  </div>";
        header("Refresh:3; url=home.php");
    }
?>