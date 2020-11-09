$(document).ready(function () {
           
         //스크롤의 좌표가 변하면.. 스크롤 이벤트
        $(window).on('scroll',function(){
            var scroll = $(window).scrollTop();  //스크롤top의 좌표를 담는다           
            $('.text').text(scroll);   //스크롤 좌표의 값을 찍는다.
             //스크롤의 거리의 범위를 처리
                   
            if(scroll>=500 && scroll<650){
                $('.company .company_left').addClass('boxMove');                
                //첫번째 내용 콘텐츠 애니메이션
            }else if(scroll>=700 && scroll<800){
                 $('.company_right .cpn1').addClass('boxMove');
            }else if(scroll>=800 && scroll<850){
                $('.company_right .cpn2').addClass('boxMove');
            }else if(scroll>=850 && scroll<900){
                 $('.company_right .cpn3').addClass('boxMove');
            }else if(scroll>=3160 && scroll<3250){
                 $('.promote .promote_left').addClass('boxMove');
            }else if(scroll>=3250){
                 $('.promote .promote_right').addClass('boxMove');
            }   
        });

    });