<?
   //"greet", 5, 20

   function latest_article($table, $loop, $char_limit)    
   {
		include "dbconn.php";    

		$sql = "select * from $table order by num desc limit $loop";  
                                        
		$result = mysql_query($sql, $connect); 

		while ($row = mysql_fetch_array($result)) 
		{
			$num = $row[num];   
			$len_subject = strlen($row[subject]);  
			$subject = $row[subject];    

			if ($len_subject > $char_limit)  
			{
				$subject = mb_substr($row[subject], 0, $char_limit, 'utf-8');   

				$subject = $subject."...";   
			}

			$regist_day = substr($row[regist_day], 0, 10);  

			echo "      
			       <li>
				      <a href='./$table/view.php?table=$table&num=$num'>
					  <p>$subject</p> <span>$regist_day</span>
					  </a>
				   </li>
			";
		}
		mysql_close();  
   }
?>