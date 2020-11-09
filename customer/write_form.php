<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    //새글쓰기 =>  $table='concert'
	//수정하기 => $table=concert  $mode=modify   $num=1  $page=1

	include "../lib/dbconn.php";

	if ($mode=="modify") //수정 글쓰기면
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);
		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>국순당-고객의소리</title>
     <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../sub6/common/css/sub6common.css">
	<link rel="stylesheet" href="css/customer.css">
	<script src="../common/js/prefixfree.min.js"></script>
    <script src="https://kit.fontawesome.com/941ac268b7.js" crossorigin="anonymous"></script>
    <!--[if IE9]>  
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");    
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<body>
    
<? include "../common/sub_head.html" ?>   

  
<!-- 메인비주얼영역 --> 
   <div class="visual">        
      <div class="company_ttl">
      <h3>홍보마당</h3> 
      <p>좋은 술과 좋은 술문화를 전하려 합니다.</p>  
      </div>
      <img src="../sub6/common/images/subvisual.jpg" alt=""> 
   </div>    
  
  
<!-- 서브네비영역 --> 
    <div class="subNav">
           <ul>
               <li>
                   <a id="nav1" href="../notice/list.php">공지사항</a>
               </li>
               <li>
                   <a id="nav2" href="list.php" class="current">고객의 소리</a>
               </li> 
               <li>
                   <a id="nav3" href="../sub6/sub6_3.html">광고자료</a>
               </li>
           </ul>           
    </div>
        
<!-- 본문콘텐츠 영역 -->
               
<article id="content">
		<div class="title_area">
            <div class="lineMap">
                <span>home </span>&gt;<span> 홍보마당 </span>&gt;<strong> 고객의 소리</strong> 
            </div>           
            <div class="title_con">        
                 <h2>고객의 소리</h2>                
            </div>  
        </div>
        
  <div class="content_area">
    
    <div class="write_wrap">
		
       

<?
	if($mode=="modify") //수정모드  
	{

?>
		 <div id="write_form_title">
            <h3>수정하기</h3>
        </div>
        
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
	else  // 새글쓰기모드  
	{
?>
		 <div id="write_form_title">
            <h3>글쓰기</h3>
        </div>
        
		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
?>
		<div id="write_form">
			<div class="write_line"></div>
			<ul class="write_row1">
			    <li class="col1"> 닉네임 </li>
				<li class="col2"><?=$usernick?></li>
<?
	if( $userid && ($mode != "modify") )
	{   //새글쓰기 에서만 HTML 쓰기가 보인다
?>
				<li class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</li>
<?
	}
?>						
			</ul>		
			<ul class="write_row2">
                 <div class="col1"> 제목   </div>
                  <li class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></li>
			</ul>			
			<ul class="write_row3">
                 <li class="col1"> 내용 </li>
                 <li class="col2">
                     <textarea rows="15" cols="79" name="content"><?=$item_content?></textarea>
                 </li>
			</ul>			
			
            <!-- 이미지 첨부 --> 						
			<ul class="write_row4">
                 <li class="col1"> 이미지파일1   </li>
                 <li class="col2"><input type="file" name="upfile[]"></li>
			
			
<? 	if ($mode=="modify" && $item_file_0)
	{
?>
                <li class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. 
                    <input type="checkbox" name="del_file[]" value="0"> 삭제
                </li>
             </ul>			
<?
	}
?>			
             <ul class="write_row4">
                <li class="col1"> 이미지파일2  </li>
			    <li class="col2"><input type="file" name="upfile[]"></li>
			
<? 	if ($mode=="modify" && $item_file_1)
	{
?>
                <li class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. 
                        <input type="checkbox" name="del_file[]" value="1"> 삭제
                </li>
             </ul>			
<?
	}
?>				
            <ul class="write_row4">
                <li class="col1"> 이미지파일3   </li>
			    <li class="col2"><input type="file" name="upfile[]"></li>
			
<? 	if ($mode=="modify" && $item_file_2)
	{
?>
                <li class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. 
                        <input type="checkbox" name="del_file[]" value="2"> 삭제
                </li>	
			 </ul>		
<?
	}
?>
		
		</div>  <!-- end of write_form --> 

		<div id="write_button">
             <input type="button" value="확인" onclick="check_input()">&nbsp;
			 <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
		</div>
           
		</form>
    	
	
	</div>  <!-- end of write_wrap --> 
 
  </div>   <!-- end of content_area --> 
                                            
</article>      
    
    <? include "../common/sub_foot.html" ?>
	
</body>
</html>