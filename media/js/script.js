$(document).ready(function(){
	
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
              
	
    
	
	    
    
    
    
    // character
    
    $('.tab01 li:eq(0)').find('img').css('filter','grayscale(100%)');
	
	$('.tab01 a').click(function(){			
		$('.char_con img').hide();
		$('.char_con img').fadeIn('slow');    
		
		var ind = $(this).parent('li').index();
		var chr='';		
		
        $('.char_wrap ul img').css('filter','grayscale(0%)');
        $(this).find('img').css('filter','grayscale(100%)');
        
		if(ind==0){
              $('.char_con img').attr('src','images/char_img01.png'); 
             
              chr='<p>Joy</p>';
              chr+='<p>Joy’s goal has always been to make sure Riley stays happy. She is lighthearted, optimistic and determined to find the fun in every situation. </p>';              
             $('.char_con .txt').html(chr);
              
         }else if(ind==1){
              $('.char_con img').attr('src','images/char_img02.png'); 
             
              chr='<p>Anger</p>';
              chr+='<p>Anger feels very passionately about making sure things are fair for Riley. He is quick to overreact and has little patience for life’s imperfections.</p>';              
             $('.char_con .txt').html(chr);
             
         }else if(ind==2){
              $('.char_con img').attr('src','images/char_img03.png'); 
             
              chr='<p>Fear</p>';
              chr+='<p>Fear’s main job is to protect Riley and keep her safe. He is constantly on the lookout for potential disasters.</p>';              
             $('.char_con .txt').html(chr); 
         }	
		
	});
	
	$('.tab02 a').click(function(){
		
		$('.char_con img').hide();
		$('.char_con img').fadeIn('slow');		
		
		var ind = $(this).parent('li').index();
		var chr='';		
		
        $('.char_wrap ul img').css('filter','grayscale(0%)');
        $(this).find('img').css('filter','grayscale(100%)');
        
        
		if(ind==0){
              $('.char_con img').attr('src','images/char_img04.png'); 
             
              chr='<p>Sadness</p>';
              chr+='<p>Sadness would love to be more optimistic and helpful in keeping Riley happy, but she finds it so hard to be positive. </p>';              
             $('.char_con .txt').html(chr);
              
         }else if(ind==1){
              $('.char_con img').attr('src','images/char_img05.png'); 
             
              chr='<p>Disgust</p>';
              chr+='<p>Disgust is highly opinionated, extremely honest and prevents Riley from getting poisoned – both physically and socially. </p>';              
             $('.char_con .txt').html(chr);
             
         }else if(ind==2){
              $('.char_con img').attr('src','images/char_img06.png'); 
             
              chr='<p>Bing Bong</p>';
              chr+='<p>With the trunk of an elephant, the tail of a cat, and body of cotton candy, Bing Bong is Riley’s imaginary friend.</p>';              
             $('.char_con .txt').html(chr); 
         }
			
	});
	
	
	// top move
	 $('.topMove').click(function(){
                 $("html,body").stop().animate({"scrollTop":0},1000); 
     });  
        	
    
});