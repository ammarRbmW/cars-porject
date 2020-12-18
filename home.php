<?php
session_start();
$pageTitle="HomePage";
include "init.php"

?>
	
<div class="gallary">
	<div class="container">
		<h2>معرض السيارات</h2>
		<div class="option-images">
     <?php       
         $stmt1=$con->prepare("SELECT * from cars where approve=1 order by id DeSC");
         $stmt1->execute();
         $count=$stmt1->rowCount();
      if($count>0){

        echo'<section class="info_car text-center">';
            $getitems=$stmt1->fetchAll();

            echo '<div class="row">';
            foreach($getitems as $item){
              $imagearr=array();
              $imagearr[]=explode(',',$item['image']);
              echo '<div class="col-md-3 col-sm-6">';
            echo '<a  href="items.php?itemid='.$item['id'].'"><img  src="upload/cars/'.$imagearr[0][0].'" alt="img"></a>';
    
    ?>

   </div>
   <?php 

}?>	
	</div>
    </section>

<section class="our-comp text-center">
<div class="b-comp">
 <div class="container">
    <h1 class="text-center">فروع شركة سبيدي   لتأجير  السيارات</h1>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="place">
             <img class="img-circle"src="layouts/images/dam.jpg" alt="دمشق"/>
              <h3>فرع دمشق</h3>
              <p>ساحة سبع بحرات - مقابل بنك البركة</p>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-12">
           <div class="place">
           <img class="img-circle" src="layouts/images/hom.jpg" alt="حمص"/>
           <h3>حمص</h3>
           <p>حي المحطة جنوب الملعب البلدي</p>
           </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
           <div class="place">
           <img class="img-circle" src="layouts/images/ham.jpg" alt="حماة"/>
           <h3>حماة</h3>
           <p>ساحة العاصي جانب مصرف التسليف الشعبي</p>
           </div>
           </div>  
        <div class="col-lg-3 col-md-6 col-sm-12">
         <div class="place">
         <img class="img-circle" src="layouts/images/tr.jpg" alt="طرطوس"/>
         <h3>طرطوس</h3>
         <p>ساحة المدينة مقابل الهرم للحوالات المالية</p>
          </div>
        </div>
    </div>
 </div>
 </div>
</section>


<div class="container">
		<div class="about-info">
			<h2>تأجير السيارات بأسعار رخيصة سوريا</h2>
			<p>سبيدي  لتأجير السيارات هي شركة مستقلة لاستئجار وتأجير السيارات مقرها في دبي، حيث توفر مجموعة ضخمة من السيارات للإيجار لكل من السياح والمقيمين. وسواء كنت بحاجة إلى سيارة اقتصادية أو فاخرة أو سيارة دفع رباعي، فلدينا سيارات تناسب جميع المناسبات والميزانيات.

				يتكون أسطول تأجير السيارات لدينا من أكثر من 1000 مركبة من العلامات التجارية الرائدة سواء الاقتصادية أو الفاخرة مثل نيسان وأودي وتويوتا ومرسيدس وغيرها الكثير. إنه لمن دواعي فخرنا الشديد اننا لا نوفر لعملائنا سيارات عالية الجودة فحسب، بل نقدم أيضًا خدمة مخصصة حسب متطلبات كل عميل ونتبع سياسة الرسوم غير الخفية.
				
				تبدأ خطط تأجير السيارات ذات الأسعار الرخيصة لدينا من
				<span>5000 ليرة سورية في اليوم</span> 
				، حيث يمكن للعملاء اختيار استئجار سيارة على أساس يومي أو أسبوعي أو شهري أو لفترات طويلة الأجل.</p>
		</div>
	</div>
	<div class="container">

		<div class="about-us">
		<div class="row">
			<div class="info-box col-lg-6 col-sm-12">
				<h2> نحن مسؤولون عن السلامة</h2>
				<p>يتم فحص وصيانة كل مركبة في أسطولنا بعناية شديدة لضمان سلامة ركابها. يمكننا أيضًا تخصيص سيارتك حسب طلبك وجعلها مثالية لأي مناسبة مع ميزات مثل المقاعد الخاصة للأطفال ونظام تحديد المواقع العالمي GPS وحتى اضافات مثل سائقين إضافيين للسيارات المستأجرة. وبالإضافة الى خدمتنا لتأجير السيارات بأسعار رخيصة، نوفر أيضا خدمة الاستئجار طويل الأجل للسيارات لجميع متطلبات السفر الشخصية والتجارية داخل دبي. لمعرفة المزيد حول خدماتنا لتأجير السيارات في دبي، تواصل مع فريقنا اليوم!</p>
			</div>
			<div class="img-box col-lg-6 col-sm-12">
				<img src="layouts/images/car.png" alt="car">
			</div>
			</div>
		</div>
   </div>
   

   <div class="timeline">
	<div class="container">
		<div class="timeline-content">
			<div class="year">2020</div>
			<div class="left">
				<div class="content">
					<h3>اعمالنا في النصف الاول من العام</h3>
					<p>قمنا بتخديم اكثر من الفي زبون وتاجير مختلف انواع السيارات وتجهيز سيارات عديدة للحفلات والأعراس 
						</p>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="right">
				<div class="content">
					<h3> اعمالنا في النصف الثاني من العام</h3>
					<p>حصلنا على وسام التميز من مركز الابحاث للتميز ازداد عدد مشتركين نظراً لجودة خدماتنا كان عدد مشتركين اكثر ن 3 الاف مشتركس
						</p>
				</div>
			</div>
		</div>
	</div>
</div>

   <?php 

}?>
	
		</div>
	
	</div>
 
</div>
<?php
include $tp."footer.php";
?>




