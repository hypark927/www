<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    // $table=concert  $num=1  $page=1

	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);
    $row = mysql_fetch_array($result);   // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];

	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}
    if ($is_html=="y")
	{
        $item_content = str_replace("&lt;", "<", $item_content);
		$item_content = str_replace("&gt;", ">", $item_content);
    }	


	for ($i=0; $i<3; $i++)  //  0~2 첨부된 이미지 처리를 위한 반복문
	{
		if ($image_copied[$i]) //업로드한 파일이 존재하면 0 1 2
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
            //GetImageSize(서버에 업로드된 파일 경로 파일명) 
                // => 배열형태의 리턴값
              // => 파일의 $imageinfo[0];(너비)와 $imageinfo[1](높이)값, $imageinfo[2](종류=>이미지 타입:확장자 ..)
			$image_width[$i] = $imageinfo[0];  //파일너비
			$image_height[$i] = $imageinfo[1]; //파일높이
			$image_type[$i]  = $imageinfo[2];  //파일종류

            if ($image_width[$i] > 800)  //첨부된 이미지의 최대 너비를 785로 지정
				$image_width[$i] = 800;
		}
		else  //업로드된 이미지가 없으면
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;
	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>국순당-고객의 소리</title>
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
		if (!document.ripple_form.ripple_content.value)
		{
			alert("내용을 입력하세요!");    
			document.ripple_form.ripple_content.focus();
			return;
		}
		document.ripple_form.submit();
    }

    function del(href) 
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
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
                   <a id="nav1" href="../notice/list.php" >공지사항</a>
               </li>
               <li>
                   <a id="nav2" href="list.php" class="current">고객의 소리</a>
               </li> 
               <li>
                   <a id="nav3" href="../sub6/sub6_3.html">광고자료</a>
               </li>
           </ul>           
    </div>
          
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
              
	     <div class="view_wrap">
            <div class="view_title">						
                <dl>
                    <dt class="view_title1"><?= $item_subject ?></dt>
                    <dd class="view_title2"><i class="fas fa-user"></i><span class="hidden">작성자</span> <?= $item_nick ?></dd>
                    <dd class="view_title2"><i class="fas fa-eye"></i><span class="hidden">조회</span> <?= $item_hit ?></dd>
                    <dd class="view_title2"><i class="far fa-clock"></i><span class="hidden">등록일</span> <?= $item_date ?></dd>
                </dl>	
            </div>

            <div id="view_content">
    <?
        for ($i=0; $i<3; $i++)  //업로드된 이미지를 출력한다
        {
            if ($image_copied[$i])
            {
                $img_name = $image_copied[$i];  // 2019_03_22_10_07_15_0.jpg
                $img_name = "./data/".$img_name; 
                 // ./data/2019_03_22_10_07_15_0.jpg
                $img_width = $image_width[$i];

                echo "<img src='$img_name' width='$img_width'>"."<br><br>";
            }
        }
    ?>
                <?= $item_content ?>
            </div>

           
   <!-- start of ripple -->        
	<div id="ripple">
<?
	    $sql = "select * from customer_ripple where parent='$item_num'";
	    $ripple_result = mysql_query($sql);

		while ($row_ripple = mysql_fetch_array($ripple_result))
		{
			$ripple_num     = $row_ripple[num];
			$ripple_id      = $row_ripple[id];
			$ripple_nick    = $row_ripple[nick];
			$ripple_content = str_replace("\n", "<br>", $row_ripple[content]);
			$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
			$ripple_date    = $row_ripple[regist_day];
?>
			<div class="ripple_writer_title">
			<ul>
                <li class="writer_title1"><i class="fas fa-user"></i>&nbsp;<?=$ripple_nick?></li>
                <li class="writer_title2"><?=$ripple_date?></li>
                <li class="writer_title3"> 
                  <? 
                        if($userid=="admin" || $userid==$ripple_id)
                          echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'>[삭제]</a>"; 
                  ?>
                </li>
			</ul>
			</div>
			<div class="ripple_content"><?=$ripple_content?></div>
			<div class="hor_line_ripple"></div>
<?
		}
?>			
			<form  name="ripple_form" method="post" action="insert_ripple.php?table=<?=$table?>&num=<?=$item_num?>">  
			<ul class="ripple_box">
				<li><span>댓글쓰기</span></li>
                <li><i class="fas fa-user"></i>&nbsp;<?=$usernick?></li>
				<li><textarea rows="4" cols="75" name="ripple_content"></textarea>
				</li>
				<li>
				<input id="ripple_btn" type="button" value="확인" onclick="check_input()">
				</li>
			</ul>
			</form>
		</div> <!-- end of ripple -->           
           
           
           
            <div id="view_button">
                    <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
    <? 
        if($userid==$item_id || $userid=="admin" || $userlevel==1 )
        {
    ?>
                    <a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">수정</a>&nbsp;
                    <a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">삭제</a>&nbsp;
    <?
        }
    ?>
    <? 
        if($userid)
        {
    ?>
                    <a href="write_form.php?table=<?=$table?>">글쓰기</a>
    <?
        }
    ?>
            </div>
          </div> <!-- end of view_wrap -->
     </div> <!-- content_area -->
     
   </article>

<? include "../common/sub_foot.html" ?>

	
</body>
</html>