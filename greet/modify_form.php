<? 
	session_start(); 

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
	/*
		$_SESSION['userid']
		$_SESSION['username']
		$_SESSION['usernick']
		$_SESSION['userlevel']

		$num=1  
		$page=2
	*/
	
	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

	$row = mysql_fetch_array($result);       	
	$item_subject     = $row[subject];
	$item_content     = $row[content];
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
    <link rel="stylesheet" href="css/write_form.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Open+Sans:wght@400;600;700&family=Pattaya&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <script src="../common/js/prefixfree.min.js"></script>

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
            <p>CS CENTER</p>
                <ul>
                    <li class="current"><a href="list.php">공지사항</a></li>
                    <li><a href="../brand/list.php">브랜드 소식</a></li>
                    <li><a href="../concert/list.php">이벤트</a></li>
                </ul>
        </div>

        <article id="content">
            <div class="title_area">
                <div class="line_map">
                    HOME &gt; 뉴스&amp;이벤트 &gt; <strong>공지사항</strong>
                </div>
                <h2>공지사항</h2>
                <p><span>코카-콜라 음료</span>의 새로운 소식을 알려드립니다.</p>
            </div>
            <div class="content_area">
                
            <form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>"> 
                <div id="write_form">
                    <div id="write_row1">
                        <div class="col1">닉네임</div>
                        <div class="col2"><?=$usernick?></div>
                    </div>
                    <div id="write_row2">
                        <label for="subject" class="col1">제목</label>
                        <input type="text" name="subject" value="<?=$item_subject?>" class="col2">
                    </div>
                    <div id="write_row3">
                        <label for="content" class="col1">내용</label>
                        <textarea rows="15" cols="79" id="content" name="content" class="col2"><?=$item_content?></textarea>
                    </div>
                </div>

                <div id="write_button">
                    <label for="m_submit" class="hidden">수정버튼</label>
                    <input type="submit" id="m_submit" value="수정">
                    <a href="list.php?page=<?=$page?>">목록</a>
                </div>
            </form>
                   
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