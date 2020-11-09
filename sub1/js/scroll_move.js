$(document).ready(function () {
           
         //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();  //스크롤top의 좌표를 담는다           
            $('.text').text(scroll);   //스크롤 좌표의 값을 찍는다.
             //스크롤의 거리의 범위를 처리
                   
            if(scroll>=570 && scroll<1000){
                $('.content_area .intro').addClass('boxMove');
                //첫번째 내용 콘텐츠 애니메이션
            }else if(scroll>=1000 && scroll<1500){
                 $('.content_area .philo1').addClass('boxMove');
            }else if(scroll>=1500 && scroll<2100){
                $('.content_area .philo2').addClass('boxMove');
            }else if(scroll>=2100){
                 $('.content_area .philo3').addClass('boxMove');
            }                   
            
        });

    });