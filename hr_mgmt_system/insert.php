<?php 
    session_start();
    if (isset($_SESSION['abc'])||isset($_SESSION['def'])) 
    {
        myf();
    }
    else
    {
        header("location: login.php");
    }
    function myf(){
include "db.php";
$conn=DBconnection();

if (isset($_POST['submit2'])) {
    
    $pass=$_POST['pass'];
    $mail=$_POST['mail'];
    $mob=$_POST['mob'];
    
  
  

  $sqlInsert="Insert into  employee_info values (emp_id_seq.NEXTVAL,'$pass','$mail','$mob',dept_id_seq.NEXTVAL )";
  $result = oci_parse($conn, $sqlInsert);
  oci_execute($result);

   header('location:index.php');
  }
  else
  {
    $id="";
    $pass="";
    $mail="";
    $mob="";
    $did="";
}

if (isset($_POST['submit3'])) {
    
    $desc=$_POST['desc'];
    $name=$_POST['name'];
    $place=$_POST['place'];
    $type=$_POST['type'];
    
  
  

  $sqlInsert="Insert into  department_info values (dept_id_seq.NEXTVAL,'$desc','$name','$place','$type' )";
  $result = oci_parse($conn, $sqlInsert);
  oci_execute($result);

   header('location:department.php');
  }
  else
  {
    $desc="";
    $name="";
    $place="";
    $type="";
}

if (isset($_POST['submit4'])) {
    

    $amt=$_POST['pass'];
    $type=$_POST['mail'];
    $desc=$_POST['mob'];
    
  
  

  $sqlInsert="Insert into  sal_info values (sal_id_seq.NEXTVAL,'$amt','$type','$desc',emp_id_seq.NEXTVAL )";
  $result = oci_parse($conn, $sqlInsert);
  oci_execute($result);

   header('location:salary.php');
  }
  else
  {
    $id="";
    $amt="";
    $desc="";
    $type="";
    $eid="";
}

if (isset($_POST['submit5'])) {
    

    $desc=$_POST['desc'];
    $type=$_POST['type'];
    
  
  

  $sqlInsert="Insert into  trainings_info values (trng_id_seq.NEXTVAL,'$desc','$type',dept_id_seq.NEXTVAL )";
  $result = oci_parse($conn, $sqlInsert);
  oci_execute($result);

   header('location:training.php');
  }
  else
  {
    $id="";
    $desc="";
    $type="";
    $did="";
}

if (isset($_POST['submit6'])) {
    


    $pass=$_POST['pass'];
    $name=$_POST['name'];

   
    
  
  

  $sqlInsert="Insert into  login_info values (log_id_seq.NEXTVAL,'$name','$pass',user_id_seq.NEXTVAL,role_id_seq.NEXTVAL )";
  $result = oci_parse($conn, $sqlInsert);
  oci_execute($result);

   header('location:logininfo.php');
  }
  else
  {
    $pass="";
    $name="";

}

if (isset($_POST['submit7'])) {
    
    $id=$_POST['id'];
    $name=$_POST['name'];
    $desc=$_POST['desc'];

   
    
  
  

  $sqlInsert="Insert into  roles_info values (role_id_seq.NEXTVAL,'$name','$desc' )";
  $result = oci_parse($conn, $sqlInsert);
  oci_execute($result);

   header('location:roles.php');
  }
  else
  {
    
    $id="";
    $name="";
    $desc="";


}
if (isset($_POST['submit8'])) {
    
    $name=$_POST['name'];
    $mob=$_POST['mob'];
    $mail=$_POST['mail'];
    $add=$_POST['add'];
   
    
  
  

  $sqlInsert="Insert into  user_info values (user_id_seq.NEXTVAL,'$name','$mob','$mail','$add')";
  $result = oci_parse($conn, $sqlInsert);
  oci_execute($result);

    header('location:users.php');
  }
  else
  {
    $id="";
    $name="";
    $mob="";
    $mail="";
    $add="";


}


if (isset($_POST['submit9'])) {
    
    $id=$_POST['id'];
    $name=$_POST['name'];
    $mod=$_POST['mod'];
    $rid=$_POST['rid'];
   
    
  
  

  $sqlInsert="Insert into  permission_info values (per_id_seq.NEXTVAL,'$name','$mod',role_id_seq.NEXTVAL)";
  $result = oci_parse($conn, $sqlInsert);
  oci_execute($result);

    header('location:users.php');
  }
  else
  {
    $id="";
    $name="";
    $mod="";
    $rid="";


}


}

 ?>