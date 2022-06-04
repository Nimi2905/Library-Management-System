<html>
	<head>
		<style>
			body{
				background-image:url("../image/lib1.jfif");
				background-repeat:no-repeat;
				background-size:cover;
				color:white;
				font-family:"Century Gothic";
			}
			h1{
				text-align:center;
				text-decoration:underline;
				margin-top:50px;
			}
			.d{
				font-size:90px;
				margin:30px;
				text-align:justify;
				font-weight:bold;
				text-shadow:3px 3px 3px black;
			}
				
			div.d1{
				height:500px;
				width:400px;
				margin-top:-10px;
				margin-left:80px;
				background-color:rgba(253,115,35,0.8);
				
			}
			h1{
				margin-top:20px;
			}
			div.d2{
				margin-left:30px;
				margin-top:30px;
				padding:20px;
				height:300px;
				width:300px;
				border-style:outset;
				background-color:rgba(253,115,75);
			}
			tr{
				padding:20px;
			}
			td{
				padding:20px;
			}
			p{
				text-align:center;
				word-spacing:2px;
			}
			.i1{
				padding:5px;
				padding-left:10px;
				padding-right:10px;
				background-color:lightgray;
				float:left;
				margin-left:60px;
				margin-top:30px;
				cursor:pointer;
			}
			
			
		</style>
	</head>
					
	<body>
		<?php
			session_start();
		?>
		<table>
		<tr>
		<td><div class=d>Library<br>Management<br>System</div></td>	
		<td>
		<div class=d1>
		<h1>Login</h1>
		<div class=d2>
		<form name=f1 method=post>
			<table>
				<tr>
					<td><label>Library Id</Label></td>
					<td><input type=number name=lid required></td>
				</tr>
				<tr>
					<td><label>Password</label></td>
					<td><input type=password name=lpwd required></td>
				</tr>
				
			</table>
			<?php
				if(isset($_POST["lid"])){
				$con=new mysqli("localhost","root","","library");
				$lid=$_POST["lid"];
				$lpwd=$_POST["lpwd"];
				$sql="select * from user where lid='".$lid."' and lpwd='".$lpwd."'";
				$result=$con->query($sql);
				if($result->num_rows==0)
					echo "<p id=p1 style='font-size:15px;background-color:yellow;font-weight:bold; color:red;'> Invalid Entries </p>";
				else if($result->num_rows==1){
					$_SESSION["lid"]=$lid;
					header("location:homepage.php");
					exit;
					}
				}
			?>
					
			<p><a href=fp.php>Forgot password</a></p>
			<p>If Not Register,<a href=signup.php>Sign Up</a></p>
			<input type=submit value="Login" class=i1>
			<input type=Reset value="Clear" class=i1 onclick="document.getElementById('p1').innerHTML=''">
			
		</form>
		</div>
		</div>
		</td>
		</tr>
		</table>
	</body>
</html>
		