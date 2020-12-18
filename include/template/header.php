<!DOCTYPE html>
<html>
<head>
<meat charset="UTF-8">
<title><?php getTitle() ?></title>
<link rel="stylesheet" href="layouts/css/font-awesome.min.css">
<link rel="stylesheet" href="layouts/css/normlize.css">
<link rel="stylesheet" href="layouts/css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">


</head>
<body>

<div class="settings-box">
		<div class="toggle-settings">

			<i class="fa fa-gear"></i>
		</div>	
		
		<div class="settings-container">
			<div class="option-color">
				<h4>Colors</h4>
				<ul class="colors">
				   <li class="active" data-color="#610a1a"></li>
				   <li data-color="#420cd8"></li>
				   <li data-color="#b60d75"></li>
				   <li data-color="#8aca13"></li>
				   <li data-color="#fca108"></li>
			   </ul>
		   </div>
		   <div class="option-color">
			   <h4>BackGround-Color</h4>
			   <div class="background-random">
				   <span class="Yes active" data-background="yes">Yes</span>
				   <span class="No" data-background="no">No</span>
			   </div>
		   </div>
	   </div>
	</div>
	
<div class="header-b">
	<div class="container text-center">
	 <div class="info">
		<div class=" col-sm-3">		
		<span class="succ"><a href='search.php' class='btn btn-success'> حجز الان</a></span>";
		</div>
		<div class="col-sm-9">	
            <span class="pull-rightt btnn">
			<?php
			if(isset($_SESSION['User'])){

				echo "<span class='welcom'>أهلاً بك  ".$_SESSION['User']."</span>";
				echo"<a href='profile.php' class='btn btn-primary'>معلوماتي الشخصية</a>";
				echo"<a href='logout.php'class='btn btn-danger'>تسجيل الخروج</a>";
				/*if(checkStatus($_SESSION['User'])==1){
					echo "الحساب يحتاج الى مراجعة ن قبل الادارة";
				}*/
			}
			else{
				echo "<a href='login.php'class='btn btn-primary'>تسجيل الدخول | إنشاء حساب </a>";
			}
			
			
			?></span>
		</div>	
	</div>


	

		   </div> 

		</div>
		<div class="header-area">
	        
			<!--	<button class="green">7411 111</button>
				<button class="red">حجز الآن</button>-->
		
			<ul class="links">
			    <li><a href="home.php" class="active"> الرئيسية</a></li>
				<li><a href="search.php" >حجز الان </a></li>
				<li><a href="newadd.php"> آجر سيارتك</a></li>
				<li><a href="categories.php">استئجار سيارات</a></li>
				<li>
					<div class="dropdown">
						<button class="dropbtn">  العلامات التجارية
						  <i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-content">
						  <?php foreach(getcar() as $car){ 
                          echo '<a href="cars.php?pagename='.str_replace('','-',$car['name_c']).'">'.$car['name_c'].'</a>';
                          }
                        ?>
						</div>
					  </div>
				</li>				
				<li>
					<div class="dropdown">
						<button class="dropbtn"> اصناف السيارات
						  <i class="fa fa-caret-down"></i>
						</button>
						<div class="dropdown-content">
                          <?php foreach(getCat() as $cat){ 
                          echo '<a href="categories.php?pageid='.$cat['id'].'&pagename='.str_replace('','-',$cat['nameC']).'">'.$cat['nameC'].'</a>';
                          }
                        ?>
						</div>
					  </div>
				</li>
				

			</ul>
		
		
						</div>
