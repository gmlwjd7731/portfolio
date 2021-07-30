<? 
	session_start();
    
      @extract($_POST);
      @extract($_GET);
      @extract($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>회원가입</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="css/member_form.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Open+Sans:wght@400;600;700&family=Pattaya&display=swap" rel="stylesheet">
	
	<script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
	
	<script>
	 $(document).ready(function() {

		 
//nick 중복검사		 
$("#nick").keyup(function() {    // id입력 상자에 id값 입력시
    var nick = $('#nick').val();

    $.ajax({
        type: "POST",
        url: "check_nick.php",
        data: "nick="+ nick,  
        cache: false, 
        success: function(data)
        {
             $("#loadtext2").html(data);
        }
    });
});		 


});
	
	
	
	</script>
	<script>
   

  
   function check_input()
   {

      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit(); 
		  
   }

   function reset_form()
   {
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.pass.focus();

      return;
   }
</script>

<?
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);

    $hp = explode("-", $row[hp]);
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>

</head>
<body>
	 
	<article id="content">  
    
	  <form  name="member_form" method="post" action="modify.php"> 
      <h1 class="logo">                   
            <a href="/">코카-콜라음료주식회사 로고</a>
        </h1>
	  <h2>회원정보 수정</h2>
      <span><i class="fas fa-check"></i> 항목은 필수 입력 항목입니다.</span>
     <table>
      <caption class="hidden">회원정보 수정</caption>
     	<tr>
     		<th scope="col"><label for="id">아이디</label><i class="fas fa-check"></i></th>
     		<td>
			     
                <?= $row[id] ?>
			     
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="pass">비밀번호</label><i class="fas fa-check"></i></th>
     		<td>
     			 <input type="password" name="pass" id="pass" required>
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="pass_confirm">비밀번호확인</label><i class="fas fa-check"></i></th>
     		<td>
     			<input type="password" name="pass_confirm" id="pass_confirm"  required>
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="name">이름</label><i class="fas fa-check"></i></th>
     		<td>
     			<input type="text" name="name" id="name" value="<?= $row[name] ?>" required> 
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="nick">닉네임</label><i class="fas fa-check"></i></th>
     		<td>
     			 <input type="text" name="nick" id="nick" value="<?= $row[nick] ?>" required>
			     <div id="loadtext2"></div>
     		</td>
     	</tr>
     	<tr class="hp">
     		<th scope="col">휴대폰<i class="fas fa-check"></i></th>
     		<td>
     			<label class="hidden" for="hp1">전화번호앞3자리</label>
     			<select class="hp" name="hp1" id="hp1" value="<?= $hp1 ?>"> 
                    <option value='010'>010</option>
                    <option value='011'>011</option>
                    <option value='016'>016</option>
                    <option value='017'>017</option>
                    <option value='018'>018</option>
                    <option value='019'>019</option>
                </select>  - 
          <label class="hidden" for="hp2">전화번호중간4자리</label>
          <input type="text" class="hp" name="hp2" id="hp2" value="<?= $hp2 ?>" required> - 
          <label class="hidden" for="hp3">전화번호끝4자리</label>
          <input type="text" class="hp" name="hp3" id="hp3" value="<?= $hp3 ?>" required>     			
     		</td>
     	</tr>
     	<tr class="mail">
     		<th scope="col">이메일</th>
     		<td>
     		  <label class="hidden" for="email1">이메일아이디</label>
     			<input type="text" id="email1" name="email1" value="<?= $email1 ?>" required> @ 
     			<label class="hidden" for="email2">이메일주소</label>
     			<input type="text" name="email2" id="email2" value="<?= $email2 ?>" required>
     		</td>
     	</tr>
     	<tr class="mem_btn">
     		<td colspan="2">
     			<a href="#"  onclick="check_input()" class="fin">수정완료</a>&nbsp;&nbsp;
				 <a href="#"  onclick="reset_form()" class="re"> 다시쓰기</a>
     		</td>
     	</tr>
     </table>

	 </form>
	  
	</article>
</body>
</html>


