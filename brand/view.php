<? 
	session_start(); 

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
	
	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
     
	
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
	
	for ($i=0; $i<3; $i++)  
	{
		if ($image_copied[$i]) 
		{ 
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
			        
			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i]  = $imageinfo[2];

			if ($image_width[$i] > 785)  
				$image_width[$i] = 785;
		}
		else   
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num";  
	mysql_query($sql, $connect);
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
    <link rel="stylesheet" href="css/view.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Open+Sans:wght@400;600;700&family=Pattaya&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <script src="../common/js/prefixfree.min.js"></script>
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

    <!--[if IE 9]>  
          <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <![endif]-->
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

                <div id="view_title">
                    <div id="view_title1"><?= $item_subject ?></div>
                    <ul id="view_title2">
                    <li><i class="fas fa-user"></i><?= $item_nick ?></li>
                    <li>|  <?= $item_date ?></li>
                    <li><i class="fas fa-eye"></i>조회수 : <?= $item_hit ?></li>
                    </ul>	
                </div>

                <div id="view_content">
                    <?
                        for ($i=0; $i<3; $i++) 
                        {
                            if ($image_copied[$i]) 
                            {
                                $img_name = $image_copied[$i]; 
                                $img_name = "./data/".$img_name; 

                                $img_width = $image_width[$i]; 

                                echo "<img src='$img_name' width='$img_width'>"."<br><br>";

                            }
                        }
                    ?>
                    <?= $item_content ?>
                </div>

                <div id="ripple">
                <span>댓글</span>
<?
	    $sql = "select * from brand_ripple where parent='$item_num'";
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
			<div id="ripple_writer_title">
            
			<ul>
			<li id="writer_title1"><?=$ripple_nick?></li>
			<li id="writer_title2"><?=$ripple_date?></li>
			</ul>
			<div id="ripple_content"><?=$ripple_content?></div>
            <span id="writer_title3"> 
		      <? 
					if($userid=="master" || $userid==$ripple_id)
			          echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'>[삭제]</a>"; 
			  ?>
			</span>
            </div>
			<div class="hor_line_ripple"></div>
<?
		}
?>			
			<form  name="ripple_form" method="post" action="insert_ripple.php?table=<?=$table?>&num=<?=$item_num?>">  
			<div id="ripple_box">
				<div id="ripple_box1"><textarea rows="5" cols="65" name="ripple_content" placeholder="댓글 쓰기"></textarea>
				</div>
				<div id="ripple_box2"><a href="#" onclick="check_input()">등록</a></div>
			</div>
			</form>
		</div>

                <div id="view_button">
                    <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>

                <? 
                    if($userid==$item_id || $userlevel==1 || $userid=="master" || $userid=='aaa')
                    {
                ?>
                    <a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">수정</a>
                    <a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">삭제</a>
                <?
                    }
                ?>
                <? 
                    if($userid=='admin' || $userid=='aaa'){      
                ?>
                    <a href="write_form.php?table=<?=$table?>">글쓰기</a>
                <?
                    }
                ?>
                </div>
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