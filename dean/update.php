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
          <a class="dropdown-item" href="update.php">بياناتي</a>
         
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
        <form class="form-info" method="POST">
            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <input type="text" name="name" class="form-control" value=<?php echo $name;?> require>
              </div>
            </div>

         
              <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7" dir="rtl">
                <p><?php echo $unv;?></p>
              </div>
            </div>
           
            <div class="form-group row">
            <label class="col-sm-2"></label>
            <div class="col-sm-7">
              <select class="form-control" name="unv" id="unv" onchange="chos()" require>
                <option value="1">اختار جامعة  </option>
                <option <?php if(trim($unv)=="جامعة أم القرى"){echo'selected';}?>>جامعة أم القرى </option>
                <option <?php if(trim($unv)=="الجامعة الإسلامية"){echo'selected';}?>> الجامعة الإسلامية </option>
                <option <?php if(trim($unv)=="جامعة الإمام محمد بن سعود الإسلامية"){echo'selected';}?>> جامعة الإمام محمد بن سعود الإسلامية </option>
                <option <?php if(trim($unv)=="جامعة الملك عبد العزيز"){echo'selected';}?>> جامعة الملك عبد العزيز </option>
                <option <?php if(trim($unv)=="جامعة الملك سعود"){echo'selected';}?>> جامعة الملك سعود </option>
                <option <?php if(trim($unv)=="جامعة الملك فهد للبترول والمعادن"){echo'selected';}?>> جامعة الملك فهد للبترول والمعادن </option>
                <option <?php if(trim($unv)=="جامعة نايف العربية للعلوم الأمنية"){echo'selected';}?>> جامعة نايف العربية للعلوم الأمنية </option>
                <option <?php if(trim($unv)=="جامعة الملك فيصل"){echo'selected';}?>> جامعة الملك فيصل </option>
                <option <?php if(trim($unv)=="جامعة الملك خالد"){echo'selected';}?>>جامعة الملك خالد </option>
                <option <?php if(trim($unv)=="جامعة حائل"){echo'selected';}?>>جامعة حائل</option>
                <option <?php if(trim($unv)=="جامعة القصيم"){echo'selected';}?>>جامعة القصيم </option>
                <option <?php if(trim($unv)=="جامعة طيبة"){echo'selected';}?>> جامعة طيبة </option>
                <option <?php if(trim($unv)=="جامعة جازان"){echo'selected';}?>> جامعة جازان </option>
                <option <?php if(trim($unv)=="جامعة الجوف"){echo'selected';}?>> جامعة الجوف </option>
                <option <?php if(trim($unv)=="جامعة الطائف"){echo'selected';}?>> جامعة الطائف </option>
                <option <?php if(trim($unv)=="جامعة الباحة"){echo'selected';}?>>جامعة الباحة </option>
                <option <?php if(trim($unv)=="جامعة تبوك"){echo'selected';}?>> جامعة تبوك </option>
                <option <?php if(trim($unv)=="جامعة نجران"){echo'selected';}?>> جامعة نجران </option>
                <option <?php if(trim($unv)=="جامعة الحدود الشمالية"){echo'selected';}?>> جامعة الحدود الشمالية </option>
                <option <?php if(trim($unv)=="جامعة الأميرة نورة بنت عبد الرحمن"){echo'selected';}?>> جامعة الأميرة نورة بنت عبد الرحمن </option>
                <option <?php if(trim($unv)=="جامعة الملك سعود بن عبد العزيز للعلوم الصحية"){echo'selected';}?>> جامعة الملك سعود بن عبد العزيز للعلوم الصحية </option>
                <option <?php if(trim($unv)=="جامعة الإمام عبد الرحمن بن فيصل"){echo'selected';}?>> جامعة الإمام عبد الرحمن بن فيصل </option>
                <option <?php if(trim($unv)=="جامعة الملك عبد الله للعلوم والتقنية"){echo'selected';}?>> جامعة الملك عبد الله للعلوم والتقنية </option>
                <option <?php if(trim($unv)=="جامعة الأمير سطام بن عبد العزيز"){echo'selected';}?>> جامعة الأمير سطام بن عبد العزيز </option>
                <option <?php if(trim($unv)=="جامعة شقراء"){echo'selected';}?>> جامعة شقراء </option>
                <option <?php if(trim($unv)=="جامعة المجمعة"){echo'selected';}?>> جامعة المجمعة </option>
                <option <?php if(trim($unv)=="الجامعة السعودية الالكترونية"){echo'selected';}?>> الجامعة السعودية الالكترونية </option>
                <option <?php if(trim($unv)=="جامعة جدة"){echo'selected';}?>> جامعة جدة </option>
                <option <?php if(trim($unv)=="جامعة بيشة"){echo'selected';}?>> جامعة بيشة </option>
                
                <option value="oth" <?php if(trim($unv)=="oth"){echo'selected';}?>>اخرى </option>
              </select> 
            </div>
          </div>

          <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
               <input type="hidden" name="other" class="form-control" id="other" placeholder="الجهة " value=<?php  echo $unv;?>>
              </div>
            </div>



          <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <input type="text" name="phone" class="form-control" value=<?php echo $phone;?> require>

              </div>
            </div>

           

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <input type="text" name="arriv" class="form-control" id="datepicker" value=<?php echo $date1;?> require>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-12 text-center"> <p>موعد الوصول : <?php echo $art_time;?></p></div>
              <div class="col-sm-5">
              
                <div><input type="text" name="arrivTime" class="form-control" value=<?php echo $arr_Time[0];?> require></div>
              </div>
              <div class="col-sm-4">
                <select class="form-control" name="sec" require>
                  <option <?php if(trim( $arr_Time[1])=='صباح'){echo "selected";} ?>>صباح</option>
                  <option  <?php if(trim( $arr_Time[1])=='مساء'){echo "selected";} ?>>مساء</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-7">
                <input type="text" name="checkout" class="form-control" id="datepicker2" value=<?php echo $date2;?> require>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-2 col-md-5">هل ترغب بخدمة الاستقبال في المطار ؟</label>
              <div class="col-sm-7">
               <div class="col-sm-7">
               <input type="radio" name="ha" value="yes" id="d" <?php if($air_port==="yes"){echo "checked";} ?>> <label for="d">نعم</label><br>
                <input type="radio" name="ha" value="no" id="i" <?php if($air_port==="no"){echo "checked";} ?>> <label for="i">لا</label> <br>
              </div>
              </div>
            </div>

             <div class="form-group row">
              <label class="col-sm-2 col-md-5">هل ترغب بتامين سكن؟</label>
              <div class="col-sm-7">
               <div class="col-sm-7">
               <input type="radio" name="ha1" value="yes" id="d" <?php if($hotail_inf=='yes'){echo "checked";} ?>> <label for="d">نعم</label><br>
                <input type="radio" name="ha1" value="no" id="i"<?php if($hotail_inf=='no'){echo "checked";} ?>> <label for="i">لا</label> <br>
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

        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
