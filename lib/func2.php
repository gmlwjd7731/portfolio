<?
   //"greet", 5, 20

   function latest_article($table, $loop, $char_limit, $cnt)   
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
            
			if($cnt==2){
			   $file_copied = $row[file_copied_0]; 
			   if($file_copied){  
			      $file_copied = './'.$table.'/data/'.$file_copied;
			   }else{  
				  $file_copied = './'.$table.'/data/default.jpg';
			   }	
			}

			if($cnt==1){
					echo "      
						<li>
							<a href='./$table/view.php?table=$table&num=$num'>
							<p>$subject</p> <span>$regist_day</span>
							</a>
						</li>
					";
			}else if($cnt==2){
					echo "      
						<li>
							<a href='./$table/view.php?table=$table&num=$num'>
							   <img src='$file_copied' width='50' height='50' alt="">	
							   <p>$subject</p> <span>$regist_day</span>
							</a>
						</li>
					";
			}
		}
		mysql_close();  
   }
?>