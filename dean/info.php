<?php
session_start();
//require_once __DIR__.'template/header.php';
require '../template/header.php';
require '../control/dean.php';
$dean=new Dean();
if(!$dean-> checkPerm($_SESSION['email'],$_SESSION['pass'])){
  header("location:../login.php");
}
$msg='';
if (isset($_POST['submit'])) {
  $name=strip_tags($_POST['name']);
  $phone=strip_tags($_POST['phone']);
  $unv=strip_tags($_POST['unv']);
  $arriv=strip_tags($_POST['arriv']);
  $arrivTime=strip_tags($_POST['arrivTime'])." - ".strip_tags($_POST['sec']);
  $checkout=strip_tags($_POST['checkout']);
  $airport=strip_tags($_POST['ha']);
  $hotail=strip_tags($_POST['ha1']);
  //echo $unv;
  if($unv!=1){
    $msg=$dean->addInfo($name,$unv,$airport,$hotail,$arriv,$arrivTime,$checkout,$phone,$_SESSION['email']);

  }
  //(name,email,phone,unviersity,airport,hotel,timeariv,dateariv,datecheck)
  //($name,$unvv,$car,$hotil,$tik,$Ttime,$checkout,$phone,$email)
 // $msg=$dean->addInfo($name,$unv,$airport,$hotail,$arriv,$arrivTime,$checkout,$phone,$_SESSION['email']);
 // echo $name . $hotail;
}
//$arr_data;
$name='';
$unv='';
$phone='';
$date1='';
$time='';
$date2='';
$air_port='';
$hotail_inf='';
$art_time='';
$arr_Time='';
if ($dean->checkinfo($_SESSION['email'])) {
  # code...
  $data=$dean->displayData($_SESSION['email']);
  $coun=0;
  foreach ($data as $value) {
    $name=$value['name'];
    $phone=$value['phone'];
    $unv=$value['unviersity'];
    $date1=$value['dateariv'];
    $date2=$value['datecheck'];
    $air_port=$value['airport'];
    $hotail_inf=$value['hotel'];
    $art_time=$value['timeariv'];
    $arr_Time=explode(' - ',$art_time);


  }
}

if (isset($_POST['update'])) {
  # code...
  /*$name=strip_tags($_POST['name']);
  $phone=strip_tags($_POST['phone']);
  
  $arriv=strip_tags($_POST['arriv']);
  
  $checkout=strip_tags($_POST['checkout']);
  // updateInfo($name,$phone,$dat1,$dat2,$email,$timearr,$airport,$hotel)
  $msg=$dean->updateInfo($name,$phone,$arriv,$checkout,$_SESSION['email']);*/
  $name=strip_tags($_POST['name']);
  $phone=strip_tags($_POST['phone']);
 // $unv=strip_tags($_POST['unv']);
  $arriv=strip_tags($_POST['arriv']);
  $arrivTime=strip_tags($_POST['arrivTime'])." - ".strip_tags($_POST['sec']);
  $checkout=strip_tags($_POST['checkout']);
  $airport=strip_tags($_POST['ha']);
  $hotail=strip_tags($_POST['ha1']);
  $msg=$dean->updateInfo($name,$phone,$arriv,$checkout,$_SESSION['email'],$arrivTime,$airport,$hotail);
 
}
//print_r($arr_data);
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
    $( "#datepicker" ).datepicker({
      altFormat: "yyyy-mm-dd"
    });
  } );

  $( function() {
    $( "#datepicker2" ).datepicker({
       altFormat: "yyyy-mm-dd"
    });
  } );

  function chos(){
    let sele=document.getElementById('unv').value;
    let othe=document.getElementById('other');
    if(sele=="oth"){
      othe.setAttribute('type','text');
      othe.setAttribute('name','unv');
      sele.setAttribute('name','other2');
    }else{
      //hidden
      othe.setAttribute('type','hidden');

    }
   // alert(sele);
  }
  </script>

  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</head>
<body>
	<header dir="rtl">
		<div class="">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand " href="index.php"><img src="../image/header2.png" width="30" height="30"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          مرحبا <?php echo $dean->getNabe($_SESSION['email']);?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">بياناتي</a>
         
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">تسجيل خروج </a>
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

        <div class="col-12">
           <?php
       // print($arr_Time[1]);
          if(isset($_GET['code'])==101){
            echo '<div class="alert alert-success text-center">تم التحديث بنجاح </div>';
          }
           else if($msg=='error update'){
            echo '<div class="alert alert-success text-center">الرجاء التواصل مع الدعم الفني </div>';
          }


          ?>
        </div>
      <div class="col-sm-7 ">

        <div class="col-sm-12">
          
        </div>

        

        <div class="col-sm-8 ">

          <?php 
          if($dean->checkinfo($_SESSION['email'])){
            echo '
            <form class="form-info" method="POST">
            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <input type="text" name="name" class="form-control" value='.$name.' require>
              </div>
            </div>';

            // unv
          /*  echo '
              <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7" dir="rtl">
                <p>'.$unv.'</p>
              </div>
            </div>'
            ;*/
            echo ' <div class="form-group row">
            <label class="col-sm-2"></label>
            <div class="col-sm-7">
              <select class="form-control" name="unv" id="unv" onchange="chos()" require>
                <option value="1">اختار جامعة  </option>
                <option';if(trim($unv)=="جامعة أم القرى"){echo'selected';} echo'>جامعة أم القرى </option>
                <option> الجامعة الإسلامية </option>
                <option> جامعة الإمام محمد بن سعود الإسلامية </option>
                <option> جامعة الملك عبد العزيز </option>
                <option> جامعة الملك سعود </option>
                <option> جامعة الملك فهد للبترول والمعادن </option>
                <option> جامعة نايف العربية للعلوم الأمنية </option>
                <option> جامعة الملك فيصل </option>
                <option>جامعة الملك خالد </option>
                <option>جامعة القصيم </option>
                <option> جامعة طيبة </option>
                <option> جامعة جازان </option>
                <option> جامعة الجوف </option>
                <option>جامعة الباحة </option>
                <option> جامعة تبوك </option>
                <option> جامعة نجران </option>
                <option> جامعة الحدود الشمالية </option>
                <option> جامعة الأميرة نورة بنت عبد الرحمن </option>
                <option> جامعة الملك سعود بن عبد العزيز للعلوم الصحية </option>
                <option> جامعة الإمام عبد الرحمن بن فيصل </option>
                <option> جامعة الملك عبد الله للعلوم والتقنية </option>
                <option> جامعة الأمير سطام بن عبد العزيز </option>
                <option> جامعة شقراء </option>
                <option> جامعة المجمعة </option>
                <option> الجامعة السعودية الالكترونية </option>
                <option> جامعة جدة </option>
                <option> جامعة بيشة </option>
                
                <option value="oth">اخرى </option>
              </select> 
            </div>
          </div>';

           echo' <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <input type="text" name="phone" class="form-control" value='.$phone.' require
">
              </div>
            </div>

           

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <input type="text" name="arriv" class="form-control" id="datepicker" value='.$date1.' require>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-12 text-center"> <p>موعد الوصول : '.$art_time.'</p></div>
              <div class="col-sm-5">
              
                <div><input type="text" name="arrivTime" class="form-control" value='.$arr_Time[0].' require></div>
              </div>
              <div class="col-sm-4">
                <select class="form-control" name="sec" require>
                  <option>صباح</option>
                  <option>مساء</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <input type="text" name="checkout" class="form-control" id="datepicker2" value='.$date2.' require>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-md-5">هل ترغب بخدمة الاستقبال في المطار ؟</label>
              <div class="col-sm-7">
               <div class="col-sm-7">
               <input type="radio" name="ha" value="yes" id="d" ';if($air_port==="yes"){echo "checked";} echo '> <label for="d">نعم</label><br>
                <input type="radio" name="ha" value="no" id="i" ';if($air_port==="no"){echo "checked";} echo'> <label for="i">لا</label> <br>
              </div>
              </div>
            </div>

             <div class="form-group row">
              <label class="col-sm-2 col-md-5">هل ترغب بتامين سكن؟</label>
              <div class="col-sm-7">
               <div class="col-sm-7">
               <input type="radio" name="ha1" value="yes" id="d" ';if($hotail_inf=='yes'){echo "checked";} echo'> <label for="d">نعم</label><br>
                <input type="radio" name="ha1" value="no" id="i"';if($hotail_inf=='no'){echo "checked";} echo'> <label for="i">لا</label> <br>
              </div>
              </div>
            </div>

             

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <input type="submit" name="update" class="btn btn-block btn-info" value="تحديث">
              </div>
            </div>

          </form>

            ';

          }
          else{
            echo '<form class="form-info" method="POST">
            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <input type="text" name="name" class="form-control" placeholder="الاسم " require>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <select class="form-control" name="unv" id="unv" onchange="chos()" require>
                  <option value="1">اختار جامعة  </option>
                  <option>جامعة حائل</option>
                  <option>جامعة أم القرى </option>
                  <option> الجامعة الإسلامية </option>
                  <option> جامعة الإمام محمد بن سعود الإسلامية </option>
                  <option> جامعة الملك عبد العزيز </option>
                  <option> جامعة الملك سعود </option>
                  <option> جامعة الملك فهد للبترول والمعادن </option>
                  <option> جامعة نايف العربية للعلوم الأمنية </option>
                  <option> جامعة الملك فيصل </option>
                  <option>جامعة الملك خالد </option>
                  <option>جامعة القصيم </option>
                  <option> جامعة طيبة </option>
                  <option> جامعة جازان </option>
                  <option> جامعة الجوف </option>
                  <option>جامعة الباحة </option>
                  <option> جامعة تبوك </option>
                  <option>جامعة الطائف</option>
                  <option> جامعة نجران </option>
                  <option> جامعة الحدود الشمالية </option>
                  <option> جامعة الأميرة نورة بنت عبد الرحمن </option>
                  <option> جامعة الملك سعود بن عبد العزيز للعلوم الصحية </option>
                  <option> جامعة الإمام عبد الرحمن بن فيصل </option>
                  <option> جامعة الملك عبد الله للعلوم والتقنية </option>
                  <option> جامعة الأمير سطام بن عبد العزيز </option>
                  <option> جامعة شقراء </option>
                  <option> جامعة المجمعة </option>
                  <option> الجامعة السعودية الالكترونية </option>
                  <option> جامعة جدة </option>
                  <option> جامعة بيشة </option>
                  
                  <option value="oth">اخرى </option>
                </select> 
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
               <input type="hidden" name="other" class="form-control" id="other" placeholder="الجهة ">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <input type="text" name="phone" class="form-control" placeholder="رقم الجوال
" require>
              </div>
            </div>

           

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <input type="text" name="arriv" class="form-control" id="datepicker" placeholder="موعد الوصول" require>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-5">
                <input type="text" name="arrivTime" class="form-control" placeholder="وقت الوصول
" require>
              </div>
              <div class="col-sm-4">
                <select class="form-control" name="sec" require>
                  <option>صباح</option>
                  <option>مساء </option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <input type="text" name="checkout" class="form-control" id="datepicker2" placeholder="تاريخ المغادرة " require>
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

          </form>';
          }


          ?>
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