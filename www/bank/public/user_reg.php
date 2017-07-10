<?php

    define("DBNAME",'bank');
    define("DBUSER", 'root');
    define("DBPASS", 'oluwafemi17');

        try{

      $conn = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);
          #SET verbose error mb_encoding_aliases
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    } catch(PDOException $e) {
            echo $e->getMessage();

    }

    $err_msg= array();
    if(array_key_exists('register', $_POST)){


        if(empty($_POST['fName'])){
          $err_msg[]="Enter your Firstname";
        } else {
          $fName= $_POST['fName'];
        }

        if(empty($_POST['lName'])){
          $err_msg['lName']="Enter your Lastname";
        }else {
          $lName=$_POST['lName'];
        }

        if(empty($_POST['eMail'])){
          $err_msg['eMail']="Enter an Email";
        }else {
          $eMail=$_POST['eMail'];
        }

        if(empty ($_POST['gender'])){
          $err_msg['gender']="Select Gender";
        }else {
          $gender=$_POST['gender'];
        }

        if(empty ($_POST['pWord'])){
          $err_msg['pWord']="Enter Password";
        }else {
          $pWord=$_POST['pWord'];
        }

        if($_POST['pWord'] != $_POST['cpWord']){
          $err_msg['cpWord']="Password mismatch!";
        }

          if(empty($err_msg)){
          $clean=array_map('trim',$_POST);
          //print_r($clean);exit();
          $hash=password_hash($clean['pWord'], PASSWORD_BCRYPT);
          //$cpWord=$hash;
          /*$check= $conn->prepare("SELECT * FROM user WHERE email = '".$eMail."'") = $_POST['eMail'];
          //$data =[":eMail_exist"=>];
          if(mysql_num_rows($check)>0){
            echo "Email already Exist!";
          } else {

          }*/
          $stmt= $conn->prepare("INSERT INTO user VALUES(NULL, :fn,:ln,:em,:pw,:cpw,:gn)");
          $data=[":fn"=>$clean['fName'],
          ":ln"=>$clean['lName'],
          ":em"=>$clean['eMail'],
          ":pw"=>$clean['pWord'],
          ":cpw"=>$hash,
          ":gn"=>$clean['gender']];

          $stmt->execute($data);
          echo "Registration Successful";


          }// else {
          //  $incorrect = "Email already exists";
  				//	header("Location:user_reg.php?incorrect=$incorrect");
          //  echo $incorrect;
        //  }



        } else{
      foreach( $err_msg as $errs){ echo '<p class=error>*'.$errs.'</p>';}
    }


 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>User Register</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
  </head>
  <body>
    <div class="">
      <h2 id="register">Registration</h2>
      <form action="" method="post">
        <p>Firstname:
          <input type="text" name="fName" placeholder=" Firstname"/>
        </p>
        <p>Lastname:
          <input type="text" name="lName" placeholder=" Lastname"/>
        </p>
        <p>Email:
          <input type="text" name="eMail" placeholder=" E-mail"/>
        </p>
        <p>Gender:<br>
          <input type="radio" name="gender" value="male"> Male<br>
          <input type="radio" name="gender" value="female"> Female<br>
        </p>
        <p>Password:
          <input type="password" name="pWord" placeholder="  Password"/>
        </p>
        <p>Confirm Password:
          <input type="password" name="cpWord" placeholder="  Password"/>
        </p>
        <input type="submit" name="register" value="Register"/>
      </form>
    </div>


  </body>
</html>
