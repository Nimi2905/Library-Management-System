<html>
	<head>
		<style>
			body{
				background-image:url("../image/lib.jfif");
				background-repeat:no-repeat;
				background-size:150%;
				background-position:bottom right;
			}
			.d{
		
				text-align:center;
				word-spacing:10px;
				line-height:40px;
				width:500px;
				height:300px;
				margin:100px 0px 200px 350px;
				
				box-shadow:2px 2px 2px gray;
				background-color:white;
			}
		</style>
	</head
	<body>
		<?php
			if(isset($_POST["lname"])){
				$lname=$_POST["lname"];
				$cname=$_POST["cname"];
				$lemail=$_POST["lemail"];
				$lpwd=$_POST["lpwd"];
				$lid=0;
				$con=new mysqli("localhost","root","","library");
				$sql="select lemail from user";
				
				$result=$con->query($sql);
				$f=0;
				if($result->num_rows>0)
					while($row=$result->fetch_assoc()){
						if($lemail==$row["lemail"]){
							echo "<script>alert('$lemail Email Is Already Taken , Insert Correct One')</script>";
							echo"<script>window.open('signup.php','_self');</script>";
							exit;
						}
					}
				$sql="select * from user";
				$result=$con->query($sql);
				if($result->num_rows>0)
					while($row=$result->fetch_assoc()){
						$lid=$row['lid'];
					}
				else
					$lid=100;
				$lid++;
				$sql="insert into user(lid,lname,cname,lemail,lpwd) values($lid,'$lname','$cname','$lemail','$lpwd')";
				$con->query($sql);
			}
		?>
			<div class=d name=d id=d>
				<h2> Details Are </h2>
				Library  ID( <span style="color:red;">Rememeber This</span>) : <?php echo $lid ?><br>
				Library Name : <?php echo $lname ?><br>
				College Name : <?php echo $cname ?><br>
				Email Id : <?php echo $lemail ?><br>
				Password :<?php echo $lpwd ?><br>
				<input type=button value=OK onclick=window.open("signup.php","_self")>
			</div>
		</body>
	</html>