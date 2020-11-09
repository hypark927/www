<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
	<meta name="format-detection" content = "telephone=no">
    <title>국순당-로그인</title>    
    <link rel="apple-touch-icon-precomposed" href="app_icon.png">
	<link rel="apple-touch-startup-image" href="startup.png">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="css/member.css" rel="stylesheet"> 
 
<script src="../js/prefixfree.min.js"></script>
<script src="https://kit.fontawesome.com/941ac268b7.js" crossorigin="anonymous"></script>


 <script>
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
</head>
<body>

<div class="wrap">
   <h1>
        <a href="../index.html">
            <img src="../images/logox2.jpg" alt="국순당로고">
        </a>
   </h1>
   <div class="login_wrap">
        <form name="member_form" method="post" action="login.php">                 
            <fieldset class="login_form">
                <legend>국순당 회원 로그인</legend>
                <label for="id" class="hidden">아이디</label>
                <input type="text" id="loginId" name="id" title="유저 아이디" placeholder="아이디">
                <label for="pw" class="hidden">비밀번호</label>
                <input type="password" id="loginPw" name="pass" title="비밀번호" placeholder="비밀번호">
                <input id="loginButton" type="submit" title="로그인" value="로그인">
            </fieldset>        
        </form>
    
        <div class="join_btn">
            <p>아직 회원이 아니신가요?</p>            
            <a href="../member/join.html">회원가입</a>
        </div>
   </div>
       
</div>  
      
</body>
</html>