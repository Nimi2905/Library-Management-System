<html>
	<head>
		<link type=text/css rel="stylesheet" href=../cssfile/bcss.css>
		
	</head>
	<body>

		<?php
			$sid="";
			if(isset($_POST["sid"]))
				$sid=$_POST["sid"];
		?>
		<div class=d1 style="margin-left:100px;height:33em;width:50em;">
		<h2 align=center>Book Issue</h2>
		<form action="bissue.php" name="form1" method=post>
		<div class=d2  align=center>
		
			Enter Student ID <input type=text name="sid" id="sid" value="<?php echo $sid ?>" required>
			<input type=submit value=search name=s><br><br>
			
			<?php
				if(isset($_POST["sid"])&&isset($_POST["s"])){
					
					$con=new mysqli("localhost","root","","library");
					$sql="select * from student where sid='".$_POST['sid']."'";
					$result=$con->query($sql);
					if($result->num_rows>0){
						echo"<h3>Details</h3>";
						$row=$result->fetch_assoc();
						echo "<table border=2 align=center>";
						echo"<tr>";
							echo "<th>Student ID</th>";
							echo "<th>Name</th>";
							echo "<th>Address</th>";
							echo "<th>Gender</th>";
							echo "<th>Email Id</th>";
							echo "<th>Mobile</th>";
							
						echo"</tr>";
						echo "<tr>";
							echo "<td>".$row['sid']."</td>";
							echo "<td>".$row['fname']." ".$row['lname']."</td>";
							echo "<td>".$row['address']."</td>";
							echo "<td>".$row['gen']."</td>";
							echo "<td>".$row['semail']."</td>";
							echo "<td>".$row['mobile']."</td>";
						echo"</tr>";
						echo"</table>";
						echo'<p style="color:red;margin:100px 0px 0px 50px;font-size:20px;">Enter Number of books to be issue</p><br><br>';
						echo'<input type=number name="n" id="n" style="margin-left:60px;" required><br>';					
						echo'<input type=submit value="Enter" class=s name=e>';
					}
					else
						echo"<script>alert('Wrong ID')</script>";
					
				}
			?>
		</div>
	
			<?php
			
				
				if(isset($_POST["e"])&&isset($_POST["n"])){
				$n=$_POST["n"];
				if($n<=0){
					echo"<script>alert('wrong entry:Number of books can\'t be negative or zero');</script>";
					exit;
				}
				echo"<center><strong>Enter Books ISBN:</strong><br><br>";
				echo"<table>";
				for($i=1;$i<=$n;$i++){
					echo "<tr>";
					echo "<td>";
					echo "<input type=text placeholder=$i name=$i>";
					echo "</td>";
					echo "</tr>";
				}
				echo"</table>";
				echo"<input type=hidden name=n value=$n>";
			    	echo"<input type=submit style='margin-top:20px;padding:5px;font-weight:bold;' name=issue value=Issue></center>"; 
				}
				else if(isset($_POST["issue"])){
					$con=new mysqli("localhost","root","","library");
					for($i=1;$i<=$_POST["n"];$i++){
						$a=$_POST[$i];
						$sql="select * from books where isbn='$a'";
						$res=$con->query($sql);
						if($res->num_rows>0){
						$row=$res->fetch_assoc();
						if($row['issued']==true)
							echo"<script>alert(\"Book ISBN: '$a' is already issued\");</script>";
						else{
							$sql="update books set issued=true,sid='".$_POST["sid"]."' where isbn='$a'";
							if($con->query($sql)){
								echo"<script>alert(\"Book ISBN: '$a' is issued successfully\");</script>";
							 }
						 }
						}
						else
							echo"<script>alert(\"Book ISBN: '$a' is wrong please enter correct one\");</script>";
					}
				}
					
			?>
		
		</form>
		</div>
				
	</body>
</html>

			