$(document).ready(function () {
        
        $('.tab_menu li:eq(0)').find('a').addClass('spy');
        //첫번째 서브메뉴 활성화
             
         //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();
            //스크롤top의 좌표를 담는다
           
            $('.text').text(scroll);
            //스크롤 좌표의 값을 찍는다.
            
            //sticky menu 처리
            if(scroll>890){ 
                $('.nav_box').addClass('navOn');
                //스크롤의 거리가 890px 이상이면 서브메뉴 고정
                $('header').hide();
            }else{
                $('.nav_box').removeClass('navOn');
                //스크롤의 거리가 890px 보다 작으면 서브메뉴 원래 상태로
                $('header').show();
            }
            
                      
        
            $('.tab_menu li').find('a').removeClass('spy');
            //모든 서브메뉴 비활성화~ 불꺼!!!
                  
         
            //스크롤의 거리의 범위를 처리
            if(scroll>=0 && scroll<2260){
                $('.tab_menu li:eq(0)').find('a').addClass('spy');
                //첫번째 서브메뉴 활성화
                
            //    $('.history_wrap div:eq(0)').addClass('boxMove');
                //첫번째 내용 콘텐츠 애니메이
            }else if(scroll>=2260 && scroll<2880){
                $('.tab_menu li:eq(1)').find('a').addClass('spy');
                //두번째 서브메뉴 활성화
                
          //       $('.history_wrap div:eq(1)').addClass('boxMove');
            }else if(scroll>=2880 && scroll<3450){
                $('.tab_menu li:eq(2)').find('a').addClass('spy');
                //세번째 서브메뉴 활성화
                
          //       $('.history_wrap div:eq(2)').addClass('boxMove');
            }else if(scroll>=3450){
                $('.tab_menu li:eq(3)').find('a').addClass('spy');
                //네번째 서브메뉴 활성화
                
          //       $('.history_wrap div:eq(3)').addClass('boxMove');
            }
            
            
              
             $('.tab_menu a').click(function(){  //각각의 메뉴를 클릭하면
                  var value=0;               
                 
              // *  $(this).is('.link1') / $(this).is('#link1') is는 클래스와 아이디도 사용가능     
                 
                  if($(this).hasClass('tab1')){  // .hasClass()는  '.'쓰지않고 class명만 찾음
                           value=900;
                  }else if($(this).hasClass('tab2')){
                          value=2320;                  
                  }else if($(this).hasClass('tab3')){
                           value=2940;                 
                  }else if($(this).hasClass('tab4')){
                           value=3500;                  
                  }           
                 $("html,body").stop().animate({"scrollTop":value},500);
              });
                    
            
        });
    });