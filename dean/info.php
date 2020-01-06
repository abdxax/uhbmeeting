<?php
session_start();
//require_once __DIR__.'template/header.php';
require '../template/header.php';
require '../control/dean.php';

if (isset($_POST['submit'])) {
  $name=strip_tags($_POST['name']);
  $phone=strip_tags($_POST['phone']);
  $unv=strip_tags($_POST['unv']);
  $arriv=strip_tags($_POST['arriv']);
  $arrivTime=strip_tags($_POST['arrivTime'])." - ".strip_tags($_POST['sec']);
  $checkout=strip_tags($_POST['checkout']);
  $airport=strip_tags($_POST['ha']);
  $hotail=strip_tags($_POST['ha1']);
  $dean=new Dean();
  //(name,email,phone,unviersity,airport,hotel,timeariv,dateariv,datecheck)
  $msg=$dean->addInfo($name,$_SESSION['email'],$phone,$unv,$airport,$hotail,$arrivTime,$arriv,$checkout);
 // echo $name . $hotail;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="../template/style.css">
  <title></title>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );

  $( function() {
    $( "#datepicker2" ).datepicker();
  } );
  </script>
</head>
<body>
	<header dir="rtl">
		<div class="">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand " href="#"><img src="../image/header2.png" width="30" height="30"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">بياناتي</a>
         
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">تسجيل خروج </a>
        </div>
      </li>
    
    </ul>
    
  </div>
</nav>
		</div>
	</header>
<section class="section-forms" dir="rtl">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center tit">
          <h3>ملتقى العمداء في الجامعات السعودية الرابع والعشرين</h3>
        </div>
      <div class="col-sm-7 ">

        <div class="col-sm-12">
          
        </div>

        

        <div class="col-sm-8 ">
          <form class="form-info" method="POST">
            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <input type="text" name="name" class="form-control" placeholder="الاسم ">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <select class="form-control" name="unv">
                  <option>جامعة حائل </option>
                </select> 
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <input type="text" name="phone" class="form-control" placeholder="رقم الجوال
">
              </div>
            </div>

           

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <input type="text" name="arriv" class="form-control" id="datepicker" placeholder="موعد الوصول">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-5">
                <input type="text" name="arrivTime" class="form-control" placeholder="وقت الوصول
">
              </div>
              <div class="col-sm-3">
                <select class="form-control" name="sec">
                  <option>صباح</option>
                  <option>مساء </option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <input type="text" name="checkout" class="form-control" id="datepicker2" placeholder="تاريخ المغادرة ">
              </div>
            </div>

             <div class="form-group row">
              <label class="col-sm-2 col-md-5">هل ترغب بخدمة الاستقبال في المطار ؟</label>
              <div class="col-sm-7">
               <div class="col-sm-7">
               <input type="radio" name="ha" value="yes" id="d"> <label for="d">نعم</label><br>
                <input type="radio" name="ha" value="no" id="i"> <label for="i">لا</label> <br>
              </div>
              </div>
            </div>

             <div class="form-group row">
              <label class="col-sm-2 col-md-5">هل ترغب بتامين سكن؟</label>
              <div class="col-sm-7">
               <div class="col-sm-7">
               <input type="radio" name="ha1" value="yes" id="d"> <label for="d">نعم</label><br>
                <input type="radio" name="ha1" value="no" id="i"> <label for="i">لا</label> <br>
              </div>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <input type="submit" name="submit" class="btn btn-block btn-info" value="حفظ">
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>


<footer></footer>
</body>
</html>



<?php
//require_once __DIR__.'template/footer.php';
require '../template/footer.php';
?>