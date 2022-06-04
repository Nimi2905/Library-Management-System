<html>
	<head>
		<link type=text/css rel="stylesheet" href=../cssfile/bcss.css>
		<style>
				
		</style>
	</head>
	<body>
		<?php
			session_start();
		?>
		<div class=d1>
		<h2>Insert Student Details</h2>
		
		<form method=post>
			<table>
				<tr>
					<td><label>First Name</label></td>
					<td><input type=text name="fname" id="fname" required></td>
					<td><label>Last Name</label></td>
					<td><input type=text name="lname" id="lname" required></td>
				</tr>
				<tr>
					<td><label>ID</label></td>
					<td><input type=text name="sid" id="sid" required></td>
				</tr>
				<tr>
					<td><label>Address</label></td>
					<td><textarea rows=3  cols=30 name="addr" id="addr" required></textarea></td>
				</tr>
				<tr>
					<td><label>Gender</label></td>
					<td><input type=radio name="gen" value="male">Male<br>
					    <input type=radio name="gen" value="female">Female</td>
				</tr>
				<tr>
					<td><label>Email Id</label></td>
					<td><input type=email name="email" id="email" required></td>
				</tr>
				<tr>
					<td><label>Mobile</label></td>
					<td><input type=text name="mno" id="mno" pattern="[0-9]{10}" title="should be 10 digit number" required></td>
				</tr>
			</table>
			<input type=submit value=Submit class=s>
			<input type=reset value=Reset class=s>
			<?php
				if(isset($_POST["sid"])){
					$fname=$_POST["fname"];
					$lname=$_POST["lname"];
					$sid=$_POST["sid"];
					$addr=$_POST["addr"];
					$gen=$_POST["gen"];
					$semail=$_POST["email"];
					$con=new mysqli("localhost","root","","library");
					$f=0;
					$sql="select sid,semail from student";
					$result=$con->query($sql);
					if($result->num_rows>0)
						while($row=$result->fetch_assoc()){
							if($sid==$row["sid"]){
								echo "<script>alert('$sid Email Is Already Taken Insert Correct One')</script>";
								$f=1;
							}
							if($semail==$row["semail"]){
								echo "<script>alert('$semail Email Is Already Taken Insert Correct One')</script>";
								$f=1;
							}
						}
					if($f==1)
						exit;
					$mobile=$_POST["mno"];
					$lid=$_SESSION["lid"];
					
					$sql="insert into student values('$sid','$fname','$lname','$addr','$gen','$semail','$mobile',$lid)";
					$con->query($sql);
					echo "<script>alert('Details Inserted Successfully')</script>";
				}
			?>
		</form>
		</div>
	</body>
</html>

			