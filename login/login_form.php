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
    <title>국순당-로그인</title>    
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link href="css/member.css" rel="stylesheet">  
</head>
<body>

<div class="wrap">
   <h1>
        <a href="../index.html">
            <img src="../common/images/logo.jpg" alt="국순당로고">
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