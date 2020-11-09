<?
   function latest_article1($table, $loop, $char_limit) 
   {
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);

		while ($row = mysql_fetch_array($result))
		{
			$num = $row[num];
			 $len_subject = mb_strlen($row[subject], 'utf-8');
			$subject = $row[subject];

			if ($len_subject > $char_limit)
			{
				 $subject = str_replace( "&#039;", "'", $subject);               
                                                       $subject = mb_substr($subject, 0, $char_limit, 'utf-8');
				$subject = $subject."...";
			}

			$regist_day = substr($row[regist_day], 0, 10);

			echo "      
				<li><a href='../$table/view.php?table=$table&num=$num'>$subject</a></li>
			";
		}
		mysql_close();
   }

// <li><a href='./$table/view.php?table=$table&num=$num'>$subject</a><span>$regist_day</span></li>
// <li><a href="#">영업일자 조정안내<span>2020-03-04</span></a></li>

?>