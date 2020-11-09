$(document).ready(function () {
           
         //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();  //스크롤top의 좌표를 담는다           
            $('.text').text(scroll);   //스크롤 좌표의 값을 찍는다.
             //스크롤의 거리의 범위를 처리
                   
            if(scroll>=450 && scroll<900){
                $('.content_area .intro').addClass('boxMove');
                //첫번째 내용 콘텐츠 애니메이션
            }else if(scroll>=900 && scroll<1600){
                 $('#cultures section:eq(0)').fadeIn(1500);
            }else if(scroll>=1600 && scroll<2300){
                $('#cultures section:eq(1)').fadeIn(1500);
            }else if(scroll>=2300 && scroll<3100){
                $('#cultures section:eq(2)').fadeIn(1500);
            }else if(scroll>=3100 && scroll<3800){
                $('#cultures section:eq(3)').fadeIn(1500);
            }else if(scroll>=3800){
                 $('#cultures section:eq(4)').fadeIn(1500);
            }                   
            
        });

    });