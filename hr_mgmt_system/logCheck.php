<?php
	session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$name = trim($_POST['name']);
		$password = trim($_POST['password']);

		$isValid = "";

		if($name == "" && $password == "" ){

			header("location: login.php?status=nullvalue");
		}else
		{
			$conn = oci_connect('system', 'hr', 'localhost/XE');

			if(!$conn){
				echo "DB Error: ";
			}else{
				echo "Success <br/>";
			}


	$sql= "select username,password from dba_users";

	$result = oci_parse($conn, $sql);
	$r=oci_execute($result);

	$connU = oci_connect('dj_khalid', 'kiki', 'localhost/XE');

	if(!$connU){
				echo "DB Error: ";
			}else{
				echo "Success <br/>";
			}

	$sqlu= "select LOGIN_USERNAME,USER_PASSWORD from LOGIN_INFO";

	


	$resultu = oci_parse($connU, $sqlu);
	oci_execute($resultu);



	while($row = oci_fetch_assoc($result)){
			
			
		if($row['USERNAME'] == strtoupper($name) && strtolower($password) =="kiki"  ){
					
					$_SESSION['abc'] = "validadmin";

					$isValid = "validAdmin";

					
				}



				} 
	while($rowu = oci_fetch_assoc($resultu)){
			
			
		if($rowu['LOGIN_USERNAME'] == strtolower($name) && $rowu['USER_PASSWORD'] == strtolower($password) ){
					
					$_SESSION['def'] = "validuser";

					$isValid = "User";

					
				}


				} 

			if($isValid == "User"){
				header("location: user/index.php");

			}elseif ($isValid == "validAdmin"){
				header("location:index.php");
			}
			else
			{
					
				header("location: login.php?status=invaliduser");
			}
			
			
		}

	
}
else
{
	echo "invalid";
}



	
?>