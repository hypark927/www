$(document).ready(function () {
            
        var th= $('#headerArea').height() + 
              $('.vidual').height();
              $('.topMove').hide();
        
        // console.log(th);
        // console.log( $('header').height() );
        // console.log( $('.main').height() ); 
        
             $(window).on('scroll',function(){ 
                  var scroll = $(window).scrollTop();                  
            //    $('.text').text(scroll);
                 
                  if(scroll>250){
                      $('.topMove').fadeIn('slow');
                  }else{
                      $('.topMove').fadeOut('fast');
                  }
             });  
           
              $('.topMove').click(function(){
                 $("html,body").stop().animate({"scrollTop":0},1000); 
              });             
       });


//family_site
$(document).ready(function() {
	$('.family_site .arrow').click(function(){
		$('.family_site .aList').show();			  
	});
	$('.family_site .aList').mouseleave(function(){
		$(this).hide();			  
	});
	//tab
	  $('.family_site .arrow').bind('focus', function () {        
              $('.family_site .aList').show();	
       });
       $('.family_site .aList li:last').find('a').bind('blur', function () {        
              $('.family_site .aList').hide();
       });  
});