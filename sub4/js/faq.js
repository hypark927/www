// JavaScript Document

 $(document).ready(function () {
	 var tf_qa=false;  // false(모두닫힘) , true(모두열림)
     var cnt_onoff=0; //닫힌 개수
     var faq_list = $('.faq .faq_list');  //모든 리스트들..
	//article.find('.a').slideUp(100); //모든 답변 닫아라
	
     
     
     $('.faq .faq_list .trigger').click(function(){ 
          //각각의 질문을 클릭하면
        var myfaq_list = $(this).parents('.faq_list'); 
           //클릭한 질문의 리스트
         
 
        if(myfaq_list.hasClass('hide')){ 
             //클릭한 리스트의 답변이 닫혀있어?  
            faq_list.find('.a').slideUp(100); //모든 답변을 닫아
            faq_list.removeClass('show').addClass('hide');//hide
            faq_list.find('span').text('+');
            
            myfaq_list.removeClass('hide').addClass('show');  
            myfaq_list.find('.a').slideDown(100); 
            myfaq_list.find('span').text('-');
         } else { // 클릭한 리스트의 답변이 열려있어? show
           myfaq_list.removeClass('show').addClass('hide');  
           myfaq_list.find('.a').slideUp(100);
           myfaq_list.find('span').text('+');     
        }  
         
         
          cnt_onoff = $('.faq .hide').length;
         //alert(cnt_onoff);
         if(cnt_onoff==10){
            faq_list.find('.a').slideUp(100);
	        faq_list.removeClass('show').addClass('hide');
            faq_list.find('span').text('+');
            $('.all').text('모두열기▼');
          
            tf_qa=false;
         } 
         
         
      });    
	

	$('.all').click(function(){
         
      if(tf_qa==false){
          
        faq_list.find('.a').slideDown(100);
	    faq_list.removeClass('hide').addClass('show');
        faq_list.find('span').text('-');
        $(this).text('모두닫기▲');
          
        tf_qa=true;
      }else{
        faq_list.find('.a').slideUp(100);
	    faq_list.removeClass('show').addClass('hide');
        faq_list.find('span').text('+');
        $(this).text('모두열기▼');
          
        tf_qa=false;
      }    

	});
	
}); 