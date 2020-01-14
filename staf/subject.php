<?php
session_start();
//require_once __DIR__.'template/header.php';
require '../template/header.php';
require '../control/staf.php';
$msg='';
$staf=new Staf();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="template/style.css">
	<title></title>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 

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
          مرحبا <?php echo $staf->getNabe($_SESSION['email']);?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         
         
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">تسجيل خروج </a>
        </div>
      </li>
    
    </ul>
    
  </div>
</nav>
		</div>
	</header>
<section dir="rtl" class="section-forms">
	<div class="container">
		<div class="row">
			 <div class="col-sm-9 offset-sm-1">
        <table class="table">
          <thead>
            <tr>
              <th> </th>
              <th>الاسم</th>
              <th>الجامعة</th>
              <th>الموضوع</th>
              <th>نبذه </th>
              <th> </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $subs=$staf->display();
            $counts=1;
            foreach ($subs as $key ) {
               echo '
            <tr>
            <td>'.$counts.'</td>
            <td>'.$key['name'].'</td>
            <td>'.$key['unviersity'].'</td>
            <td>'.$key['title'].'</td>
            <td>'.$key['descr'].'</td>';
            if($key['email']==$_SESSION['email']){
              echo '<td><a href="index.php?id_del='.$key['id_s'].'" class="btn btn-danger">حذف</a></td>';
            }

            echo'</tr>

            ';
             $counts++;
              # code...
            }
           
            
            ?>
          </tbody>
        </table>
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