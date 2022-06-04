<html>
	<head>
		<link type=text/css rel="stylesheet" href=../cssfile/bcss.css>
		<style>
			.d1{
				width:500px;
			}
			td{
				padding:20px;	
			}
				
		</style>
	</head>
	<body>
		<div class=d1>
		<h2>Insert Book Details</h2>
		
		<form method=post>
			<table>
				<tr>
					<td><label>ISBN</label></td>
					<td><input type=text name="isbn" id="isbn" required></td>
				</tr>
				<tr>
					<td><label>Title</label></td>
					<td><input type=text name="title" id="title" required></td>
				</tr>
				<tr>
					<td><label>Author</label></td>
					<td><input type=text name="author" id="author" required></td>
				</tr>
				<tr>
					<td><label>Edition</label></td>
					<td><input type=number name="edition" id="edition" required></td>
				</tr>
				<tr>
					<td><label>Publication</label></td>
					<td><input type=text name="publication" id="publication" required></td>
				</tr>
			</table>
			<input type=submit value=Submit class=s>
			<input type=reset value=Reset class=s>
		</form>
		</div>
		<?php
			if(isset($_POST["isbn"])){
				$isbn=$_POST["isbn"];
				$title=$_POST["title"];
				$author=$_POST["author"];
				$edition=$_POST["edition"];
				$publ=$_POST["publication"];
				$con=new mysqli("localhost","root","","library");
				$sql="insert into books(isbn,title,author,edition,publ) value('$isbn','$title','$author','$edition','$publ')";
				if($con->query($sql))
				echo "<script>alert('Details inserted successfully');</script>";
			}
		?>
				
	</body>
</html>

			