   $(document).ready(function () {

     $('.product_sub ul:eq(0)').show();  
     $('.product_tab li a').click(function () {    
         var ind = $(this).parent('li').index(); 
         var chr='';
         
         $('.product_sub ul').hide();
         $('.product_sub ul:eq('+ind+')').fadeIn('slow');
           
         $('.product_tab').find('a').removeClass('current');
         $(this).addClass('current');
         
         if(ind==0){
              $('.product_main img').attr('src','images/product_main.jpg'); 
             
              chr='<h3><span>좋은술</span>백세주</h3>';
              chr+='<p>양조전용쌀 설갱미와 좋은 누룩 <br> 엄선한 열두 가지 좋은 약재를 넣어 발효</p>';
              chr+='<p>주류 최초 우수문화상품으로 지정</p>';
              chr+='<a href="sub2/sub2_1.html">제품 소개 <i class="fas fa-long-arrow-alt-right"></i></a>';
             $('.product_main .txt').html(chr);
              
         }else if(ind==1){
              $('.product_main img').attr('src','images/product_main2.jpg'); 
             
              chr='<h3><span>국순당</span>쌀막걸리</h3>';          
              chr+='<p>전통제법을 복원한 생쌀발효법<br> 필수아미노산이 풍부하며 부드러운 맛</p>';
              chr+='<p>우리쌀 100%로 빚은 우리 막걸리</p>';
              chr+='<a href="sub2/sub2_2.html">제품 소개 <i class="fas fa-long-arrow-alt-right"></i></a>';
             $('.product_main .txt').html(chr);
             
         }else if(ind==2){
              $('.product_main img').attr('src','images/product_main3.jpg');  
             
              chr='<h3><span>복원주</span>법고창신</h3>';
              chr+='<p>국순당의  ‘우리술 복원사업’으로<br> 다시 태어난 천 년 전 우리술</p>';
              chr+='<p>우리의 삶 속에 함께 살아 있는 전통주</p>';
              chr+='<a href="sub2/sub2_3.html">제품 소개 <i class="fas fa-long-arrow-alt-right"></i></a>';
             $('.product_main .txt').html(chr);            
             
         }
     });


     });  