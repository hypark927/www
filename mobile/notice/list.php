<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "notice";    // 해당 게시판의 테이블명.
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">    
	<meta name="viewport" content="width=device-width">
	<meta name="format-detection" content = "telephone=no">
    <title>국순당-공지사항</title>
    <link rel="apple-touch-icon-precomposed" href="app_icon.png">
	<link rel="apple-touch-startup-image" href="startup.png">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Nanum+Myeongjo:wght@400;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/common.css">
	<link rel="stylesheet" href="css/notice.css">
	<script src="../js/prefixfree.min.js"></script>
    <script src="../js/nav.js"></script>
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
<?
	include "../lib/dbconn.php";

    
   if (!$scale)
    $scale=10;			// 한 화면에 표시되는 글 수

    
    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>

<body>

 <? include "notice_head.html" ?>
  
        
<!-- 본문콘텐츠 영역 -->
               
 <article id="content">
 
 	<h2>공지사항</h2>    
        
  <div class="content_area">
  
	<div class="notice_wrap">
 
  
	<div class="list_search"> 
		<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 	
	    	<ul class="search_con">
				<li>
					<select name="find">
						<option value='subject'>제목</option>
						<option value='content'>내용</option>
						<option value='nick'>별명</option>
						<option value='name'>이름</option>
					</select>
				</li>
				<li>
					<label for="search" class="hidden">검색창</label>
					<input type="text" id="search" name="search">
				</li>
				<li>                      
           			<input type="button" title="검색하기" onclick="check_input()" value="검색">
           		</li>
             </ul>	
             
		    <ul class="search_bottom">             	
           		<li>
					<select name="scale" onchange="location.href='list.php?scale='+this.value" class="scale_view">
						<option value=''>보기</option>
						<option value='5'>5</option>
						<option value='10'>10</option>
						<option value='15'>15</option>
						<option value='20'>20</option>
					</select>
				</li>
                <li>            
                  	<p>총 <?= $total_record ?>개의 게시물 </p>
            	</li>
            </ul>
		
		    
		</form>
	 </div> <!-- end of customer_search -->      	
		 
           
            <div class="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // 가져올 레코드로 위치(포인터) 이동  
      $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	  $item_content = str_replace(" ", "&nbsp;", $row[content]);
        
      $len_subject = strlen($row[content]);       
       if ($len_subject > 70)  //글자길이 제한 ...처리
            {
              $content = mb_substr($row[content], 0, 120, 'utf-8');  //임의의 문자열을 추출하는 함수
              $content = $content."...";
             }
       
       
      if($row[file_copied_0]){  //첫번째 첨부 이미지가 있으면
        $item_img = './data/'.$row[file_copied_0];  
      }else{
        $item_img = './data/default.jpg'  ;
      }
      
?>
			<ul class="list_item">
				<li class="list_item1"><?= $number ?></li>
				<li class="list_item2"><a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
				<img src="<?=$item_img?>" alt="">				
					<span><?= $item_subject ?></span>	</a><li>		
				<li class="list_item3"><i class="fas fa-user"></i>&nbsp;<?= $item_nick ?></li>
                <li class="list_item4"><i class="far fa-clock"></i>&nbsp;<?= $item_date ?></li>
                <li class="list_item5"><i class="fas fa-eye"></i>&nbsp;<?= $item_hit ?></li>
			</ul>
<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num"> <span class="hidden">이전</span> <i class="fas fa-chevron-left"></i>  &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
            
          if($mode=="search"){
             echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
          }else{    
            
			  echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
           }
            
          
		}      
   }
?>			
			 &nbsp;&nbsp;&nbsp;&nbsp; <span class="hidden">다음</span> <i class="fas fa-chevron-right"></i>
				</div>
				<div class="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if($userid==admin)
	{
?>
		<a href="write_form.php?table=<?=$table?>">글쓰기</a>
<?
	}
?>
                    </div>
                </div> <!-- end of page_button -->		
            </div> <!-- end of list content -->

	</div> <!-- end of notice_wrap -->
              
   </div>   <!-- end of content_area -->
                                            
  </article>  
                           
    <? include "notice_foot.html" ?>  
	
</body>
</html>