$(document).ready(function () {
   
    
    $('.product_list a').each(function (index) {  // index=> 0 1 2
        $(this).click(function(){   //각각의 a를 클릭하면 
           $('.content_area #box').show()
           $('.product_info .info').hide(); 
           $('.product_info .info'+ (index+1)).fadeIn('fast'); 
            
       });
        
    $('.content_area #box, .close').click(function(){ // 상세창 바깥영역을 클릭하면 
        $('.content_area #box').hide()  // 바깥영역 안보이게
        $('.product_info .info:eq('+index+')').hide(); // 상세창 안보이게
    });
        
    });
    
});