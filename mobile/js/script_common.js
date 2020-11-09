// gnb
$(document).ready(function() {   
 	
   $(".btn").click(function() { //메뉴버튼 클릭시
       
       var documentHeight =  $(document).height();
       //실제 페이지의 높이 = $(document).height();
       $(".box").css('height',documentHeight);
       $("#gnb").css('height',documentHeight);
       //반투명박스와 네비의 높이를 실제 페이지의 높이로 바꾸어라   

       $("#gnb").animate({right:0,opacity:1}, 'slow');
       $(".box").show();
   });
   
   $(".box,.mclose").click(function() { //닫기버튼 클릭시
     $("#gnb").animate({right:'-100%',opacity:0}, 'fast');
     $(".box").hide();
   });
     
    //2depth 메뉴 교대로 열기 처리 
    $('#gnb .depth1 a').click(function(){
        $('#gnb .depth1 ul').hide(); //모든 서브를 닫고
        $(this).next('ul').slideDown('slow'); //클릭한 자신의 서브만 연다
    });    
   
  });




//footer 패밀리 사이트
$(document).ready(function(){
    $('.family_site .arrow').toggle(function(){
        $('.aList').show();
      
    },function(){
        $('.aList').hide();
    });
});



//top 버튼
$(document).ready(function(){
    $('.top_move').hide();
    
     $(window).on('scroll',function(){//스크롤의 거리가 발생하면
                  var scroll = $(window).scrollTop();
                  //스크롤이 움직이면 해당 scrolltop의 값이 저장                 
                 
//                  $('.text').text(scroll);
                  if(scroll>700){ //스크롤값이 700보다 커지면
                      $('.top_move').fadeIn('slow');//탑메뉴보여라
                  }else{//아니면
                      $('.top_move').fadeOut('fast');//말아라
                  }
             });
    
     $('.top_move').click(function(){   //상단으로 이동
           $("html,body").stop().animate({"scrollTop":0},1000); 
     });
});