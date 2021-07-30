<? 
	session_start(); 
	$table = "brand";
  $ripple = "brand_ripple";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>코카-콜라음료주식회사:뉴스&amp;이벤트</title>

    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="common/css/sub5common.css">
    <link rel="stylesheet" href="css/list.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Open+Sans:wght@400;600;700&family=Pattaya&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <script src="../common/js/prefixfree.min.js"></script>

    <!--[if IE 9]>  
          <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <![endif]-->

        <?
    @extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

	include "../lib/dbconn.php";

	if (!$scale){
       $scale=6; 			
	}

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

	$total_record = mysql_num_rows($result); 

	
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 
		$page = 1;             
 
	 
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>
</head>
<body>

    <div class="wrap">        
        <!-- 서브헤더영역 -->
        <? include "../common/sub_head.html" ?>

        <div class="visual">
            <img src="common/images/visual.jpg" alt="비주얼이미지">
        </div>

        <div class="sub_menu">
            <h3>뉴스&amp;이벤트</h3>
            <p>News&amp;Event</p>
                <ul>
                    <li><a href="../greet/list.php">공지사항</a></li>
                    <li class="current"><a href="../brand/list.php">브랜드 소식</a></li>
                    <li><a href="../concert/list.php">이벤트</a></li>
                </ul>
        </div>

        <article id="content">
            <div class="title_area">
                <div class="line_map">
                    HOME &gt; 뉴스&amp;이벤트 &gt; <strong>브랜드 소식</strong>
                </div>
                <h2>브랜드 소식</h2>
                <p><span>코카-콜라 음료</span>의 새로운 브랜드 소식을 알려드립니다.</p>
            </div>
                
			<div class="content_area">
            <div class="event_top">
                <form  name="board_form" method="post" action="list.php?mode=search"> 
                    <div id="list_search">
                        
                        <div class="list_box">
							<div id="list_search1">
								<select name="find">
									<option value='subject'>제목</option>
									<option value='content'>내용</option>
									<option value='nick'>별명</option>
									<option value='name'>이름</option>
								</select>
							</div>
							<div id="list_search2">
								<label for="search" class="hidden">검색</label>
								<input type="text" id="search" name="search">
							</div>
							<div id="list_search3">
								<label for="search_button" class="hidden">검색버튼</label>
								<input type="submit" id="search_button" value="검색">
							</div>
						</div>
                    </div>
					<div id="list_total">▷ 총 <?= $total_record ?> 개의 브랜드 소식이 있습니다.</div>
                </form>

                <select class="scale" name="scale" onchange="location.href='list.php?scale='+this.value">
                            <option value=''>보기</option>
                            <option value='6'>6</option>
                            <option value='12'>12</option>
                            <option value='18'>18</option>
                            <option value='24'>24</option>
                </select>
            </div>

            <div id="list_top_title">
                <ul class="hidden">
                    <li id="list_title1">번호</li>
                    <li id="list_title2">제목</li>
                    <li id="list_title3">글쓴이</li>
                    <li id="list_title4">등록일</li>
                    <li id="list_title5">조회</li>
                </ul>		
		    </div>

            <div id="list_content">
    <?		
       for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
       {
          mysql_data_seek($result, $i);       
          $row = mysql_fetch_array($result);       


          $item_num     = $row[num];
          $item_id      = $row[id];
          $item_name    = $row[name];
          $item_nick    = $row[nick];
          $item_hit     = $row[hit];
          $item_date    = $row[regist_day];
          $item_date = substr($item_date, 0, 10);  
          $item_subject = str_replace(" ", "&nbsp;", $row[subject]); 

          if($row[file_copied_0]){ 
            $item_img = './data/'.$row[file_copied_0]; 

          }else{ 
            $item_img = './data/default.jpg';
          }

          $sql = "select * from $ripple where parent=$item_num";  
          $result2 = mysql_query($sql, $connect);
          $num_ripple = mysql_num_rows($result2);

    ?>
                <div id="list_item">
                    <div id="list_item1" class="hidden"><?= $number ?></div>
                    <div id="list_item2">
                        <a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
                            <img src="<?=$item_img?>" alt="" class="e_list_image">
                            <p><?= $item_subject ?>
                            <?
		if ($num_ripple){  // 해당글의 덧글이 있으면
				echo "<span> <i class='fas fa-comment'></i> [$num_ripple] </span>";
		}else{
			    echo '<span> <i class="fas fa-comment"></i> [0] </span>';
		}
?>
</p>
                        </a>
                        
                    </div>
                    <div id="list_item3" class="hidden"><?= $item_nick ?></div>
                    <div id="list_item4"><?= $item_date ?></div>
                    <div id="list_item5" class="hidden"><?= $item_hit ?></div>
                </div>
    <?
           $number--;
       }
    ?>
                <div id="page_button">
                    <div id="page_num"> 
    <?

       for ($i=1; $i<=$total_page; $i++)
       {
            if ($page == $i)
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
                    </div>
                    <div id="button">
                        <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
    <? 
        if($userid=='master' || $userid=='aaa')
        {
    ?>
            <a href="write_form.php?table=<?=$table?>">글쓰기</a>
    <?
        }
    ?>
                    </div>
                </div> <!-- end of page_button -->		
            </div> <!-- end of list content -->
        </div>
        </article>


        <!-- 서브푸터영역 -->
        <? include "../common/sub_foot.html" ?>
    </div>

          <!-- JQuery -->
          <script src="../common/js/jquery-1.12.4.min.js"></script>
          <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
          <script src="../common/js/fullnav.js"></script>

          
</body>
</html>