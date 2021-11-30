<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="/~team4/my/image/favicon.png" type="image/png">
        <title>Royal Hotel</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/~team4/my/css/bootstrap.css">
        <link rel="stylesheet" href="/~team4/my/vendors/linericon/style.css">
        <link rel="stylesheet" href="/~team4/my/css/font-awesome.min.css">
        <link rel="stylesheet" href="/~team4/my/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="/~team4/my/vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="/~team4/my/vendors/nice-select/css/nice-select.css">
        <!-- main css -->
        <link rel="stylesheet" href="/~team4/my/css/style.css">
        <link rel="stylesheet" href="/~team4/my/css/responsive.css">

    </head>
    <body style="background:aliceblue;">
        <header class="header_area">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="/~team4/main"><img src="/~team4/my/image/Logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item active"><a class="nav-link" href="/~team4/main">메인</a></li>
                            <li class="nav-item"><a class="nav-link" href="/~team4/about">리조트 소개</a></li>
							<li class="nav-item"><a class="nav-link" href="/~team4/contact">직원 소개</a></li>
                            <li class="nav-item"><a class="nav-link" href="accomodation.html">예약</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Social</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="blog.html">갤러리</a></li>
                                    <li class="nav-item"><a class="nav-link" href="blog-single.html">리뷰</a></li>
                                </ul>
                            </li>
<?
	if (!$this->session->userdata("uid")) {
		echo("<li class='nav-item'><a class='nav-link' href='/~team4/login'>로그인</a></li>
		<li class='nav-item'><a class='nav-link' href='/~team4/register'>회원가입</a></li>"); 
	}	
	else {
		echo("<li class='nav-item'><a class='nav-link' href='/~team4/member/myPage'>내 정보</a></li>
		<li class='nav-item'><a class='nav-link' href='/~team4/login/logout'>로그아웃</a></li>");
	}
?>
                            
<?
	if ($this->session->userdata("rank")==1)
		echo("<li class='nav-item'><a class='nav-link' href='/~team4/admin'>Admin</a></li>");
?>

                        </ul>
                    </div> 
                </nav>
            </div>
        </header>