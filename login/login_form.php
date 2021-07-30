<? session_start(); ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&family=Open+Sans:wght@400;600;700&family=Pattaya&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body>

<form  name="member_form" method="post" action="login.php"> 

	<div class="form_box">
    <h1 class="logo">                   
            <a href="/">코카-콜라음료주식회사 로고</a>
        </h1>
           
               <ul>
                   <li><span><i class="fas fa-user"></i></span><input type="text" name="id" class="login_input"></li>
                   <li><span><i class="fas fa-lock"></i></span><input type="password" name="pass" class="login_input"></li>
               </ul>						
           
           <div id="login_button">
            <button type="submit">Login</button>
            <a href="../index.html" onclick="join_cancel()">Cancel</a>
           </div>
           <div id="join_button">
               <span>Don't you have ID?</span><a href="../member/member_check.html">JOIN</a>
           </div>
    </div>

    <div class="form_img"></div>

</form>

</body>
</html>