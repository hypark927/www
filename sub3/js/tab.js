// JavaScript Document

$(document).ready(function(){
  var cnt=2;  //탭메뉴개수  ***
  $('.tabs .contlist:eq(0)').show(); //첫번째 내용만 보여라
  $('.tabs .tab1').addClass('on');
  
  $('.tabs .tab1').css('background','#333').css('color','#fff');
           //첫번째 탭 활성화
    
  $('.tabs .tab').each(function (index) {  // index=> 0 1 2
    $(this).click(function(){   //각각의 탭메뉴를 클릭하면 
	  $('.tabs .contlist').hide(); // 모든 탭내용을 안보이게 한다
	  $('.tabs .contlist:eq('+index+')').show();
	 
     for(var i=1; i<=cnt; i++){
         $('.tab'+i).css('background','#f4f1f1').css('color','#333')
     }
     $(this).css('background','#333').css('color','#fff');
      
        
   });
  });
});


/*
window.onload=function(){    // a=1,2,3 (파라미터)값이 넘어온다.
        
    var head = document.getElementById('head');
     
    var purl=window.location; //호출된 현재창의 주소  sub.html?t=1
    tmp=String(purl).split('?');  //? 기준으로 두개로 나눔
          //tmp[0]='sub.html', tmp[1]='t=1'  //자바스크립트는 2개이상 담기면 배열로 처리됨
   

    tmp2=tmp[1].split('='); 
       // tmp2[0]='a' , tmp2[1]='1'
  
    if(tmp2[1]==1){
        head.style.color='red';
    }else if(tmp2[1]==2){
        head.style.color='blue';
    }
        
}
*/
