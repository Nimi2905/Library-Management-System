<html>
	<head>
		<link type=text/css rel="stylesheet" href=../cssfile/bcss.css>
	</head>
	<body>
		<?php
			session_start();
		?>
		<div class=d1 style="height:28.5em;">
		<h2 align=center>Update Student Details</h2>
		<?php 
			$sid=$fname=$lname="";
			$addr=$gen=$semail=$mobile="";
			if(isset($_POST["sid"])){
				if(isset($_POST["search"])){
				$con=new mysqli("localhost","root","","library");
				$sid=$_POST["sid"];
				$sql="select *from student where sid='$sid'";
				$result=$con->query($sql);
				if($result->num_rows>0){
					$row=$result->fetch_assoc();
					$fname=$row["fname"];
					$lname=$row["lname"];
					$addr=$row["address"];
					$gen=$row["gen"];
					$semail=$row["semail"];
					$mobile=$row["mobile"];
					
				}
				else
				echo "<script>alert(\"Enter Valid ID\");</script>";
			       }
			       if(isset($_POST["update"])){
					$con=new mysqli("localhost","root","","library");
					$sid=$_POST["sid"];
					$sql="select *from student where sid='$sid'";
					$result=$con->query($sql);
					if($result->num_rows==0){
						echo "<script>alert('Wrong Id')</script>"; 
						
					}
					else{
					$fname=$_POST["fname"];
					$lname=$_POST["lname"];
					$addr=$_POST["addr"];
					$gen=$_POST["gen"];
					$semail=$_POST["email"];
					$con=new mysqli("localhost","root","","library");
					$mobile=$_POST["mno"];
					$sql="UPDATE student SET fname='$fname',lname='$lname',address='$addr',gen='$gen',semail='$semail',mobile='$mobile' where sid='".$sid."'";
					if($con->query($sql))
					echo "<script>alert('Details Updated Successfully')</script>"; 
					}
				}
			}
		?>	
		<form name=f1 method=post>
		<div class=d2  align=center>
			Enter ID <input type=text name="sid" id="sid" value="<?php echo $sid ?>"  required>
			<input type=submit value=search name=search>
		</div>
			<h3>Details/Make Changes Here</h3>
			<table>
				<tr>
					<td><label>First Name</label></td>
					<td><input type=text name="fname" id="fname" value="<?php echo $fname ?>"></td>
					<td><label>Last Name</label></td>
					<td><input type=text name="lname" id="lname" value="<?php echo $lname ?>"></td>
				</tr>
				<tr>
					<td><label>Address</label></td>
					<td><textarea rows=3  cols=30 name="addr" id="addr"><?php echo $addr ?></textarea></td>
				</tr>
				<tr>
					<td><label>Gender</label></td>
					<td><input type=text name="gen" id="gen" value="<?php echo $gen ?>" style="text-transform:lowercase;" pattern="(fe)?male" title="only male or female">
					    
				</tr>
				<tr>
					<td><label>Email Id</label></td>
					<td><input type=email name="email" id="email" value="<?php echo $semail ?>"></td>
				</tr>
				<tr>
					<td><label>Mobile</label></td>
					<td><input type=text name="mno" id="mno" value="<?php echo $mobile ?>" pattern=".{10}"></td>
				</tr>
			</table>
			<input type=submit value=Update class=s name=update>
			<input type=button value=Reset class=s onclick=cls()>
		</form>
		</div>
		<script>
			function cls(){
				document.getElementById("fname").value="";
				document.getElementById("lname").value="";
				document.getElementById("addr").value="";
				document.getElementById("gen").value="";
				document.getElementById("email").value="";
				document.getElementById("mno").value="";
				document.getElementById("sid").value="";
			}
		</script>
	</body>
</html>

			