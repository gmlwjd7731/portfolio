<? 
	session_start(); 

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);
	
	include "../lib/dbconn.php";

	if ($mode=="modify")  //수정 글쓰기면....
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>코카-콜라음료주식회사:뉴스&amp;이벤트</title>

    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="common/css/sub5common.css">
    <link rel="stylesheet" href="css/write_form.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Open+Sans:wght@400;600;700&family=Pattaya&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <script src="../common/js/prefixfree.min.js"></script>
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
                    <li><a href="../brand/list.php">브랜드 소식</a></li>
                    <li class="current"><a href="../concert/list.php">이벤트</a></li>
                </ul>
        </div>

        <article id="content">
            <div class="title_area">
                <div class="line_map">
                    HOME &gt; 뉴스&amp;이벤트 &gt; <strong>이벤트</strong>
                </div>
                <h2>이벤트</h2>
                <p>함께하면 더 즐거운 <span>코카-콜라!</span> 코카-콜라 음료의 다양한 이벤트에 참여하세요.</p>
            </div>
            <div class="content_area">
                
                    
        <?
	if($mode=="modify")
	{

?>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data">
<?      
	}
	else 
	{
?>
		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
?>
		<div id="write_form">
			<div id="write_row1">
			    <div class="col1">닉네임</div>
			    <div class="col2"><?=$usernick?></div>
<?
	if( $userid && ($mode != "modify") )
	{   
?>
				<div class="col3">
                    <label for="html_ok">HTML 쓰기</label>
				    <input type="checkbox" id="html_ok" name="html_ok" value="y">
				</div>
<?
	}
?>						
			</div>

			<div id="write_row2">
                 <label for="subject" class="col1">제목</label>
                 <input type="text" id="subject" name="subject" value="<?=$item_subject?>" class="col2">
			</div>

			<div id="write_row3">
                 <label for="content" class="col1">내용</label>
                 <textarea rows="15" cols="79" id="content" name="content" class="col2"><?=$item_content?></textarea>
			</div>

			<div id="write_row4">
                 <label for="file1" class="col1">이미지파일1</label>
			     <input type="file" id="file1" name="upfile[]" class="col2">
			</div>

<? 	if ($mode=="modify" && $item_file_0)
	{
?>
			<div class="delete_ok">
			    <?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" id="i_delete1" name="del_file[]" value="0"><label for="i_delete1">삭제</label>
            </div>

<?
	}
?>

			<div id="write_row5">
                <label for="file2" class="col1">이미지파일2</label>
			    <input type="file" id="file2" name="upfile[]" class="col2">
			</div>
<? 	if ($mode=="modify" && $item_file_1)
	{
?>
			<div class="delete_ok">
			    <?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" id="i_delete2" name="del_file[]" value="1"><label for="i_delete2">삭제</label>
            </div>
	
<?
	}
?>


			<div id="write_row6">
                <label for="file3" class="col1">이미지파일3</label>
			    <input type="file" id="file3" name="upfile[]" class="col2">
			</div>
<? 	if ($mode=="modify" && $item_file_2)
	{
?>
			<div class="delete_ok">
			    <?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" id="i_delete3" name="del_file[]" value="2"><label for="i_delete3">삭제</label>
            </div>

<?
	}
?>

         </div>



		<div id="write_button">
            <a href="#" onclick="check_input()">등록</a>
            <a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
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