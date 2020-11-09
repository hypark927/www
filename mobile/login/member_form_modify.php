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
	<meta name="viewport" content="width=device-width">
	<meta name="format-detection" content = "telephone=no">
	<title>국순당-회원정보수정</title>	
	<link rel="apple-touch-icon-precomposed" href="app_icon.png">
	<link rel="apple-touch-startup-image" href="startup.png">
	<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/member.css">
	    
	<script src="../js/prefixfree.min.js"></script>
    <script src="../js/jquery-1.12.4.min.js"></script>
	<script src="../js/jquery-migrate-1.4.1.min.js"></script>	
	<script src="https://kit.fontawesome.com/941ac268b7.js" crossorigin="anonymous"></script><script>
  // <![CDATA[
  try {
   window.addEventListener('load', function(){
    setTimeout(scrollTo, 0, 0, 1); 
   }, false);
  } 
  catch(e) {}
  // ]]>
 </script>

 <!--[if lt IE 9]> 
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]--> 	

<script>
 $(document).ready(function() {
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
        
function check_input()
   {
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

<?
    //$userid='aaa';    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-0000-0000
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>
<body> 
		 
<div class="join_wrap">
	  <h1 class="loginLogo">
        <a class="logo" href="../index.html">
            <img src="../images/logox2.jpg" alt="국순당로고">
        </a>
      </h1>
      
  <h2>회원정보수정</h2>    
    <form name="member_form" method="post" action="modify.php" class="join_form"> 
    <ul>     
		<li class="modify_id">
           <label for="id" class="hidden">아이디</label>
            <?= $row[id] ?> 
 		</li>     
  		<li>          
           <label for="pass" class="hidden">비밀번호</label>
           <input type="password" name="pass" id="pass" required placeholder="비밀번호를 입력하세요">
		</li>
        <li>   
            <label for="pass_confirm" class="hidden">비밀번호확인</label>
            <input type="password" name="pass_confirm" id="pass_confirm" required placeholder="비밀번호를 다시 입력하세요">
		 </li>
     	 <li class="modify_name">     
            <label for="name" class="hidden">이름</label>
            <?= $row[name] ?> 
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
             <input type="text" id="email1" name="email1" required placeholder="이메일 아이디 (id)">
             <span class="email_gol">@</span> 
             <label class="hidden" for="email2">도메인 (domain.com)</label>
             <input type="text" name="email2" id="email2" required placeholder="domain.com">
         </li>      
     </ul>
        
         <div class="submit">     		
            <input type="button" id="submitGo" title="수정 완료" value="회원정보수정 하기" onclick="check_input()"> 
            <input type="reset" value="다시 쓰기" title="회원정보 다시 쓰기" onclick="reset_form()" class="reset_form">
         </div>    
 </form>
	  
	
</div>
	
</body>
</html>


