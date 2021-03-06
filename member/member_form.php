<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);  
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>국순당-회원가입</title>	
	<link rel="stylesheet" href="css/member_form.css">
	<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    
	<script src="../common/js/prefixfree.min.js"></script>
    <script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>	
		
	<script>
	 $(document).ready(function() {
     
 
 //id 중복검사
 $("#id").keyup(function() {    // id입력 상자에 id값 입력시
    var id = $('#id').val(); //a   // val(value method)

    $.ajax({
        type: "POST",
        url: "check_id.php",  // 실제 처리되는 php경로
        data: "id="+ id,      // ?에 넘어가는 값
        cache: false,         // 기록 남기지 않기
        success: function(data)   // data에게 check_id.php에서 echo문으로 처리된 값이 넘어옴
        {
             $("#loadtext").html(data);   // span태그(다른아이디를 사용하세요 어쩌구) 값을 태그로 찍어내라
        }
    });
});
		 
//nick 중복검사		 
$("#nick").keyup(function() {    // id입력 상자에 id값 입력시
    var nick = $('#nick').val();

    $.ajax({
        type: "POST",
        url: "check_nick.php",
        data: "nick="+ nick,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext2").html(data);
        }
    });
});		 


});
	
	</script>
	
    <script>
   
  
   function check_input()
   {
      if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");    
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit(); 
		   // insert.php 로 변수 전송
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
</head>
<body> 
		 
<div class="join_wrap">
	  <h1 class="loginLogo">
        <a class="logo" href="../index.html">
            <img src="../common/images/logo.jpg" alt="국순당로고">
        </a>
      </h1>
      
  <h2>회원가입</h2>    
  <form name="member_form" method="post" action="insert.php" class="join_form"> 
    <ul>     
		<li>
           <label for="id" class="hidden">아이디</label>
           <input type="text" name="id" id="id" required placeholder="아이디를 입력하세요 (영문,숫자만 사용 가능)">
           <span id="loadtext"></span>
 		</li>     
  		<li>          
           <label for="pass" class="hidden">비밀번호</label>
           <input type="password" name="pass" id="pass" required placeholder="비밀번호를 입력하세요">
		</li>
        <li>   
            <label for="pass_confirm" class="hidden">비밀번호확인</label>
            <input type="password" name="pass_confirm" id="pass_confirm" required placeholder="비밀번호를 다시 입력하세요">
		 </li>
     	 <li>     
            <label for="name" class="hidden">이름</label>
            <input type="text" name="name" id="name" required placeholder="이름">
         </li>   
         <li>    
            <label for="nick" class="hidden">닉네임</label>
            <input type="text" name="nick" id="nick" required placeholder="닉네임">
            <span id="loadtext2"></span>
         </li>        
                
         <li class="phone">
             <p class="hidden">휴대폰</p>
             <label class="hidden" for="hp1">전화번호앞3자리</label>
             <select class="hp" name="hp1" id="hp1"> 
                  <option value='010'>010</option>
                  <option value='011'>011</option>
                  <option value='016'>016</option>
                  <option value='017'>017</option>
                  <option value='018'>018</option>
                  <option value='019'>019</option>
              </select>  - 
              <label class="hidden" for="hp2">전화번호중간4자리</label><input type="text" class="hp" name="hp2" id="hp2"  required> - <label class="hidden" for="hp3">전화번호끝4자리</label><input type="text" class="hp" name="hp3" id="hp3"  required>
         </li>          
          
         <li class="email">     
             <p class="hidden">이메일</p>
             <label class="hidden" for="email1">이메일아이디</label>
             <input type="text" id="email1" name="email1" required> @ 
             <label class="hidden" for="email2">이메일주소</label>
             <input type="text" name="email2" id="email2" required>
         </li>      
     </ul>
        
         <div class="submit">     		
            <input type="button" id="submitGo" title="회원가입 하기" value="가입 하기" onclick="check_input()"> 
            <input type="reset" value="다시 쓰기" title="회원정보 다시 쓰기" onclick="reset_form()" class="reset_form">
         </div>        
         
     
 </form>
	  
	
</div>
	
</body>
</html>


