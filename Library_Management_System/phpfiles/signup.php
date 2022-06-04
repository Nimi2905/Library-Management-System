<html>
	<head>
		<title>
			Sign Up
		</title>
		<style>
			body{
				background-image:url("../image/lib.jfif");
				background-repeat:no-repeat;
				background-size:150%;
				background-position:bottom right;
			}
			div.d{
				width:380px;
				height:80%;
				margin-left:450px;
				margin-top:50px;
				box-shadow:4px 4px 2px black;
				border:3px outset;
				background-color:rgb(250,250,255);
			}
			input[type=text],input[type=password],input[type=email]
			{
				border:none;
				border-bottom:3px solid black;
				outline:none;
			}
			input[type=text]:focus,input[type=password]:focus{
				background-color:lightblue;
			}
			table{
				padding:12px;
			}
			tr{
				padding:10px;
			}
			td{
				padding:12px;
			}
			.s{
				margin-top:40px;
				margin-left:70px;
				border-radius:10px;
				cursor:pointer;
				width:80px;
				height:30px;
				font-weight:bold;
				background-color:rgba(252,252,252,0.6);
			}
			.s:hover{
				background-color:lightgray;
			}
			.d1{
				background-color:black;
				padding:10px;
				margin-top:-10px;
				
			}
			.d1 a{
				color:white;
				text-decoration:none;
			}
			.d1 a:hover{
				color:red;
			}
		</style>
		<script>
			function checkpwd(){
				var lpwd=document.getElementById("lpwd").value;
				var cp=document.getElementById("cp").value;
				if(lpwd==cp)
					return true;
				else{
					alert("Confirm password Not Correct");
					return false;
				}
			}
		</script>
	</head>
	<body>
		<div class=d1>
			<a href=login.php>BACK</a>
		</div>
		<div class=d>
		<h1 align=center>Sign Up</h1>
		
		<form name=f1 action=signphp.php method=post onsubmit="return checkpwd()">
			<table>
				<tr>
					<td><label>Library Name</label></td>
					<td><input type=text id=lname name=lname required></td>
				</tr>
				<tr>	
					<td><label>College Name</label></td>
					<td><input type=text id=cname name=cname required></td>
				</tr>
				<tr>
					<td><label>Email ID</label></td>
					<td><input type="email" id=lemail name=lemail required></td>
				</tr>
				<tr>
					<td><label>Password</label></td>
					<td><input type=password pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
					title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" 
					name=lpwd id=lpwd required><div id=i></div></td>
				</tr>
				<tr>
					<td><label>Confirm Password</label></td>
					<td><input type=password name=cp id=cp required></td>
				</tr>
			</table>
			<input type=submit value="Submit"  class=s>
			<input type=reset value="Reset" class=s onclick="document.getElementById('i').innerHTML=''" >
		</form>
		
			
		
		</div>
			
	</body>
</html>
	