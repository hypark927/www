// top move
	 $('.topMove').click(function(){
                 $("html,body").stop().animate({"scrollTop":0},1000); 
     });  
        
	
	// menu_open
	$('.open_menu').toggle(function(){	
		$('#gnb').slideDown('slow');
		//$(this).addClass('open');
	}, function(){
		$('#gnb').slideUp('fast');
		//$(this).removeClass('open');
	});
    
        
    var documentHeight =  $(document).height();
    var current=0;   //  0(모바일)   1(모바일 이상의 해상도)
   $(window).resize(function(){    //웹브라우저 크기 조절시 반응하는 이벤트 메소드()
      var screenSize = $(window).width(); 
      if( screenSize > 768){            
		$("#gnb").show();
         current=1; 
      }
      if(current==1 && screenSize <= 768){        
		 $("#gnb").hide();
         current=0;
      }
    }); 
    
        
			
	  // wide pc gnb scroll event
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
            var winSize= $(window).width(); 
            
            //$('.text').text(scroll);          
         if(winSize>768){    
            if(scroll>800){ 
                $('#headerArea').css('background', 'rgba(0,0,0,.8)');
                
            }else{
                $('#headerArea').css('background', 'none');
            }
         } 
        });
              
	
    