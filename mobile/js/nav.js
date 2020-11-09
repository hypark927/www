$(document).ready(function() {   
 	
   $(".btn").click(function() {        
       var documentHeight =  $(document).height();
       $(".box").css('height',documentHeight);
       $("#gnb").css('height',documentHeight); 

       $("#gnb").animate({right:0,opacity:1}, 'slow');
       $(".box").show();
   });
   
   $(".box,.mclose").click(function() { //닫기버튼 클릭시
     $("#gnb").animate({right:'-100%',opacity:0}, 'fast');
     $(".box").hide();
   });
      
    $('#gnb .depth1 a').click(function(){
        $('#gnb .depth1 ul').hide(); //모든 서브를 닫고
        $(this).next('ul').slideDown('slow'); //클릭한 자신의 서브만 연다
    });    
   
  });