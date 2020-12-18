
let colorOption=localStorage.getItem("color-option");
let backgroundrandom=true;
let backgroungrand;
if(colorOption!=null){
   
    document.documentElement.style.setProperty("--main--color",colorOption);
    document.querySelectorAll(".colors li").forEach(element=>{
        element.classList.remove("active");
        if(element.dataset.color==colorOption){
            element.classList.add("active");    
        }
    });
    
}
document.querySelector(".toggle-settings .fa-gear").onclick=function(){

this.classList.toggle('fa-spin');
document.querySelector('.settings-box').classList.toggle('open');
}


const colorlist=document.querySelectorAll('.colors li');
colorlist.forEach(li=>{
    li.addEventListener("click",(e)=>{
        document.documentElement.style.setProperty("--main--color",e.target.dataset.color);
        localStorage.setItem("color-option",e.target.dataset.color);
        e.target.parentElement.querySelectorAll(".active").forEach(element=>{
            element.classList.remove("active");
        });
        e.target.classList.add("active")
    });
})


const backgroundoption=document.querySelectorAll('.background-random span');
backgroundoption.forEach(li=>{
    li.addEventListener("click",(e)=>{
       
        
        e.target.parentElement.querySelectorAll(".active").forEach(element=>{
            element.classList.remove("active");
        });
        if(e.target.dataset.background=='yes'){
            backgroundrandom=true;
            
            randomize();
            localStorage.setItem("background-oprtion",true);
        }
        else{
            backgroundrandom=false;
            clearInterval(backgroungrand);  
            localStorage.setItem("background-oprtion",false);
        }
        e.target.classList.add("active")
    });
})
let localbackgeound=localStorage.getItem("background-oprtion");
if(localbackgeound!==null){
if(localbackgeound==="true"){
    backgroundrandom=true;
            
    
}
else{
    backgroundrandom=false;
   
}
}
document.querySelectorAll(".background-random span").forEach(elem=>{
    elem.classList.remove("active");
    
});

if(localbackgeound==="true"){
    document.querySelector(".background-random .Yes").classList.add("active");
}
else{
    document.querySelector(".background-random .No").classList.add("active");  
}





/*let gallaryImg=document.querySelectorAll(".gallary .option-images img");

gallaryImg.forEach(img=>{
img.addEventListener("click",function(e){
 let overlay=document.createElement("div");
 overlay.className="pop-overlay";
 document.body.appendChild(overlay);
 let popbox=document.createElement("div");
 popbox.className="pop-box";
 let popimg=document.createElement("img");
 popimg.src=img.src;


 

    // Create a form synamically 
    var form = document.createElement("div"); 
    form.className="form-box";
    var span1 = document.createElement("span");
    span1.textContent=document.getElementById("carName").value;
    var span2 = document.createElement("span");
    span2.textContent=document.getElementById("carPrice").value;
    var span3 = document.createElement("span");
    span3.textContent=document.getElementById("carCity").value;
    var a1 = document.createElement("a");
    a1.textContent="المزيد من التفاصيل";
   a1.href="assad.html";
   form.appendChild(span1);
   form.appendChild(span2);
   form.appendChild(span3);
   form.appendChild(a1);
   let closebutton=document.createElement("span");
   let closetext=document.createTextNode("X");
   closebutton.appendChild(closetext);
   closebutton.className="close-button";

   popbox.appendChild(popimg);
   popbox.appendChild(form);
    popbox.appendChild(closebutton);
   document.body.appendChild(popbox);
})
});*/


document.addEventListener("click",function(e){
    if(e.target.className=="close-button"){
        e.target.parentNode.remove();
        document.querySelector(".pop-overlay").remove();
    }
});


let log=document.querySelectorAll('.login-page span');

log.forEach(element=>{
element.addEventListener("click",function(e){
    log.forEach(ele=>{
        ele.classList.remove("selected");
      
    });
        e.target.classList.add('selected');
    
      if(e.target.dataset.class==".singupF"){
        document.querySelector('.login-page .singupF').style.display = "block";
        document.querySelector('.login-page .loginF').style.display = "none";
      }
      if(e.target.dataset.class==".loginF"){
        document.querySelector('.login-page .singupF').style.display = "none";
        document.querySelector('.login-page .loginF').style.display = "block";
      }
});
    
    });
  
  //let names=document.querySelector(".add-name")
 // names.addEventListener('keyup',function(event) {
    
   // document.querySelector(".add-cap h3").textContent += String.fromCharCode(event.keyCode);
  //});

  /*let des=document.querySelector(".add-description");
  
  des.addEventListener('keyup',function(event) {
    document.querySelector(".add-cap p").innerHTML += String.fromCodePoint(event.keyCode);
  });
  let price=document.querySelector(".add-price");
  
  price.addEventListener('keyup',function(event) {
    document.querySelector(".add-cap span").innerHTML += event.keyCode;
  });
  
  


*/