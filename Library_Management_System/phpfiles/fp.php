<html>
	<head>	
		<style>
			body{
				background-image:url("../image/lib1.jfif");
				background-repeat:no-repeat;
				background-size:100%;
				//background-color:rgba(240,240,240,0.7);
			}
			.fp1{
				box-shadow:6px 6px 6px black;
				height:200px;
				width:400px;
				background-color:white;
				color:black;
				padding:40px;
				margin:100px 0px 0px 400px;
				border:4px outset;
			}
			.s{
				margin-top:100px;
				width:80px;
				padding:3px;
				border-radius:5px;
				cursor:pointer;
			}
		</style>
	</head>
	<body>
		<div id=fp1 class=fp1>
			<?php
				$leid="";
				if(isset($_POST["leid"])){
				$con=new mysqli("localhost","root","","library");
				$leid=$_POST["leid"];
				$sql="select * from user where lemail='$leid' or lid='$leid'";
				$result=$con->query($sql);
				if($result->num_rows==0)
					echo "<p style='font-size:15px;background-color:yellow;font-weight:bold; color:red;'> Invalid Entry </p>";
				else if($result->num_rows==1){
					$row=$result->fetch_assoc();					
					}
				}
			?>
			
			<form name=f2 method=post>
				Enter Email/Library ID : <input type="text" name=leid id=leid value="<?php echo $leid ?>" >
				<input type=submit value="Submit">
				<br>
				<br>
				
			</form>
			<?php
				if(isset($_POST["leid"]) && $result->num_rows==1){
					echo "Library ID :".$row['lid']."<br>";
					echo "Library Password :".$row['lpwd']."<br>";
				}
			?>
			<input type=button value="BACK" class=s onclick=window.open("login.php","_self")>
		</div>
	</body>
</html>