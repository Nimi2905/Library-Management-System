<html>
	<head>
		<link type=text/css rel="stylesheet" href=../cssfile/bcss.css></link>
		<style>
			.a{
				padding:10px;
				margin-left:200px;
				font-size:15px;
				font-weight:bold;
				border-radius:10px;
				cursor:pointer;
			}
			.a:hover{
				background-color:gray;
				color:white;
			}
		</style>
	</head>
	<body>
		<div class=d1 style="width:50em;margin-left:100px;">
			<h2 align=center>Search Book/Student</h2>
			<form method=post>
				<input type=submit name=books class=a value="Search Books" >
				<input type=submit name=stu  class=a value="Search Student">
			<br><br><br>
			<?php
				if(isset($_POST['books'])){
					echo"<label>Enter ISBN :</label>";
					echo"<input type=text style='margin-left:50px;' name=isbn required>";
					echo"<input type=submit name=sub1  value='Submit'  style='padding:5px; font-weight:bold;margin-left:100px;'>";
				}
				else if(isset($_POST['stu'])){
					echo"Enter Student ID :";
					echo"<input type=text name=sid style='margin-left:50px;' pattern='[a-zA-Z0-9]+' title='only characters and numbers' required>";
					echo"<input type=submit name=sub2 value='Submit' style='padding:5px; font-weight:bold;margin-left:100px;'>";
				}
				else if(isset($_POST['sub1'])){
					$con=new mysqli("localhost","root","","library");
					$sql="select * from books where isbn='".$_POST['isbn']."'";
					$result=$con->query($sql);
					if($result->num_rows>0){
						$row=$result->fetch_assoc();
						$i="";
						if($row['issued']==1)
							$i="Issued";
						else
							$i="Available";
						echo "<table border=2 align=center>";
						echo"<tr>";
							echo "<th>ISBN</th>";
							echo "<th>Title</th>";
							echo "<th>Author</th>";
							echo "<th>Edition</th>";
							echo "<th>Publication</th>";
							echo "<th>Issued Status</th>";
							if($i=="Issued")
								echo "<th>Student Id</th>";
						echo"</tr>";
						echo "<tr>";
							echo "<td>".$row['ISBN']."</td>";
							echo "<td>".$row['title']."</td>";
							echo "<td>".$row['author']."</td>";
							echo "<td>".$row['edition']."</td>";
							echo "<td>".$row['publ']."</td>";
							echo "<td>".$i."</td>";
							if($i=="Issued")
								echo "<td>".$row["sid"]."</td>";
						echo"</tr>";
						echo"</table>";
					}
					else
						echo"<script>alert('Wrong ISBN')</script>";
				}
				else if(isset($_POST['sub2'])){
					$con=new mysqli("localhost","root","","library");
					$sql="select * from student where sid='".$_POST['sid']."'";
					$result=$con->query($sql);
					if($result->num_rows>0){
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
						echo"<br><br>";
						
						$sql="select * from student,books where student.sid='".$_POST['sid']."' and student.sid=books.sid";
						$res=$con->query($sql);
					      if($res->num_rows>0){
						echo"<h3 align=center>Books Issued</h3>";
						echo "<table border=2 align=center>";
						echo"<tr>";
							echo "<th>ISBN</th>";
							echo "<th>Title</th>";
							echo "<th>Author</th>";
							echo "<th>Edition</th>";
							echo "<th>Publication</th>";
							
						echo"</tr>";
						while($row=$res->fetch_assoc()){
							
						echo "<tr>";
							echo "<td>".$row['ISBN']."</td>";
							echo "<td>".$row['title']."</td>";
							echo "<td>".$row['author']."</td>";
							echo "<td>".$row['edition']."</td>";
							echo "<td>".$row['publ']."</td>";
							
						echo"</tr>";
						
						}
						echo"</table>";
					      }
					       else
							echo"<h3 align=center>No Books Issued</h3>";
					}
					else
						echo"<script>alert('Wrong ID')</script>";
				}
			?>
			</form>
		</div>
	</body>
</html>
			