var slideIndex = 0;
var maxScrollLeft = $('.destination_nav_div')[0].scrollWidth - $('.destination_nav_div')[0].clientWidth;
showSlides();

function showSlides() {
  let i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";  
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}

function autoSlide(){

    var maxScrollLeft = $('.destination_nav_div')[0].scrollWidth - $('.destination_nav_div')[0].clientWidth;
    


    if($('.destination_nav_div').scrollLeft() >= maxScrollLeft){
       
        $(".destination_nav_div").animate( { scrollLeft: '-=2300' }, 1000);
          
    }else{   
        $(".destination_nav_div").animate( { scrollLeft: '+=470px' }, 1000);   
    }
    setTimeout(autoSlide, 10000);
    
}



$(function(){
    setTimeout(autoSlide, 20000);


    $("#btn_menu").click(function(){
        if($("#navbar").css("display")=="none"){
            $("#navbar").css({"display":"block"});
            if (window.matchMedia('(max-width: 750px)').matches) {
                $("#btn_menu").css({"margin-left":"0"});
            } else {
                $("#btn_menu").css({"margin-left":"25%"});
            }
            
        }else if($("#navbar").css("display")=="block"){
            $("#navbar").css({"display":"none"});
            $("#btn_menu").css({"margin-left":"0"});
        }
    });

    $("#container").click(function(){
        $("#navbar").css({"display":"none"});
            $("#btn_menu").css({"margin-left":"0"});
    });

    $("#btn_loginuser").click(function(){
        $("#btn_create").attr("disabled",true);

        LoginUser();
        
    });

    $("#btn_newuser").click(function(){
        window.location.href='./userside/newuser/newuser.php';
    });

    $("#btn_newuseradmin").click(function(){
        window.location.href='./userside/new_useradmin/new_useradmin.php';
    });

    $("#user_login_modal").click(function(event){
        if(event.target.id=="user_login_modal"){
            window.location.href = '/tourism_information_system/index.php'
        }
    });

    $(document.body).on('click', '.news_container', function(){
        window.location.href = "/tourism_information_system/userside/user_news/u_news.php?news_category="+$(this).attr("news_category")+"&news_id="+$(this).attr("news_id");
    });

    $(document.body).on('click', '.tips_container', function(){
        window.location.href = "/tourism_information_system/userside/user_tips/u_tips.php?tips_id="+$(this).attr("tips_id");
    });


    $("#slideRight_d").click(function(){
        $(".destination_nav_div").animate( { scrollLeft: '+=460px' }, 1000);

        
    });

    $("#slideLeft_d").click(function(){
        $(".destination_nav_div").animate( { scrollLeft: '-=460px' }, 1000);
    });

});

function LoginUser(){
    var cParam = "";
        cParam = "txt_username="+$("#txt_username").val();
        cParam += "&txt_password="+$("#txt_password").val();
        console.log(cParam);
        $.ajax({
            "type":"POST",
            "url":"loginuser.php",
            "data": cParam,
            "dataType": "json",
            "success": function(response){
                if(response.success){
                    alert(response.message);
                    window.location.href = '/tourism_information_system/index.php'
                }else{
                    alert(response.message);
                    $("#txt_username").val("");
                    $("#txt_password").val("");
                }
            }
        });
}
