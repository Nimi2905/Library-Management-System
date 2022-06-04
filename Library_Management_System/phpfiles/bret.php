<html>
	<head>
		<link type=text/css rel="stylesheet" href=../cssfile/bcss.css>
	</head>
	<body>
	    <div class=d1>
		<?php
			$isbn="";
			if(isset($_POST["isbn"])){
				$isbn=$_POST["isbn"];
				$con=new mysqli("localhost","root","","library");
				$sql="select * from books where isbn='$isbn'";
				$result=$con->query($sql);
			}
		?>
		<h2>Book Return</h2>
		<br><br>
		<form method=post>
		<label style="margin-left:25px;">Enter ISBN Of Book</label>
		<input type=text name=isbn style="margin-left:20px;" value="<?php echo $isbn ?>" >
		<input type=submit value=Submit class=s>
		</form>
		<?php
			if(isset($_POST["isbn"])){
				if($result->num_rows>0){
					$row=$result->fetch_assoc();
					$i="returned";
					
					echo"<table border=2 align=center>";
						echo"<tr>";
							echo "<th>ISBN</th>";
							echo "<th>Title</th>";
							echo "<th>Author</th>";
							echo "<th>Edition</th>";
							echo "<th>Publication</th>";
							echo "<th>Issued Status</th>";
						echo"</tr>";
						echo "<tr>";
							echo "<td>".$row['ISBN']."</td>";
							echo "<td>".$row['title']."</td>";
							echo "<td>".$row['author']."</td>";
							echo "<td>".$row['edition']."</td>";
							echo "<td>".$row['publ']."</td>";
							echo "<td>".$i."</td>";
						echo"</tr>";
						echo"</table>";
					$sql="update books set issued=false,sid=NULL where isbn='$isbn'";
					$con->query($sql);
				}
				else
					echo"<script>alert('Wrong ISBN')</script>";
			}
		?>		
	     </div>
	</body>
</html>