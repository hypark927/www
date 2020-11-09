$(document).ready(function () {   
    
    $('.pdt_list a').each(function (index) {  // index=> 0 1 2
        $(this).click(function(){   //각각의 a를 클릭하면 
           $('body .box').show()
           $('.pdt_info .info').hide(); 
           $('.pdt_info .info'+ (index+1)).fadeIn('fast');             
        });
        
        $('body .box, .close').click(function(){ // 상세창 바깥영역을 클릭하면 
            $('body .box').hide()  // 바깥영역 안보이게
            $('.pdt_info .info:eq('+index+')').hide(); // 상세창 안보이게
        });        
    });
    
});