//공지사항
// JavaScript Document
$(document).ready(function() {
   var position=0;  //최초위치
   var movesize=18; //이미지 하나의 너비, 이동 폭 
   var timeonoff;
   // 자동 넘어가기
   function moveNitice(){
	    position-=movesize;  // 17씩 감소
    	$('.slide').stop().animate({top:position}, 'slow',
	         function(){							
		    if(position==-90){
			   $('.slide').css('top',0);
			   position=0;
		    }
	 });
   }
     
     timeonoff= setInterval(moveNitice, 3000);  
    $('.slide ul').after($('.slide ul').clone()); // a의 뒤에 b를 복사해서 넣기
       //슬라이드 갤러리를 한번 복제
    $('.slide ul').hover(function(){clearInterval(timeonoff);},function(){timeonoff= setInterval(moveNitice, 3000); });
 });
 


//orientation
$(document).ready(function(){

    $(window).on("orientationchange", function(event){
        if(window.matchMedia("(orientation: portrait)").matches){
            // 세로 모드 (평소 사용하는 각도)
            $('.land1').attr('src','images/pdt01x2.jpg'); 
            $('.land2').attr('src','images/pdt02x2.jpg'); 
            $('.land3').attr('src','images/pdt03x2.jpg'); 
        }else if(window.matchMedia("(orientation: landscape)").matches){
            // 가로 모드 (동영상 볼때 사용하는 각도)
            $('.land1').attr('src','images/land_pdt01x2.jpg');  
            $('.land2').attr('src','images/land_pdt02x2.jpg');
            $('.land3').attr('src','images/land_pdt03x2.jpg');
        }
    });

 });