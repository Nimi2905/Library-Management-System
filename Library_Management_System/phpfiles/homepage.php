<html>
	<head>
		<style>
			*{
				font-family:"Franklin Gothic Book";
			}
			.d1{
				background-image:linear-gradient(tomato,brown);
				color:white;
				height:50px;
				text-align:center;
				padding:20px;
				font-size:20px;
			
			}
			.d2{
				width:200px;
				height:467px;
				background-image:linear-gradient(tomato,brown);
				
				position:fixed;
			}
				
			.d2 ul{
				list-style-type:none;
				list-style-position:inside;	
			}
			ul a{
				text-decoration:none;
			}
			ul li{
				margin-top:20px;
				margin-right:10px;
				margin-left:-15px;
				padding:10px;
				border:1px inset red;
				color:black;
				background-color:rgba(245,150,150,0.4);
			}
			ul li:hover{
				background-color:lightgray;
				border:outset;
				cursor:pointer;
			}
			
			
			.d3{
				margin-left:200px;
			}
			iframe{
				height:29em;
				width:66.2em;
			}
			.active{
				background-color:lightgray;
				text-decoration:underline;
			}
			h1{
				margin-top:-15px;
				font-weigth:bold;
				text-shadow:3px 3px 3px black;
			}
			.d1 input{
				float:right;
				margin-top:-30px;
				padding:8px;
				font-weight:bold;
				cursor:pointer;
			}
		</style>
	</head>
	<body>
		<?php
			session_start();
		?>
		<div class=d1>
			<h1>Library Management System</h1>
			<form>
			<input type=submit name=lg value="LogOut">
			</form>
		</div>
		<div class=d2>
			<ul>
				<a href="aboutus.php" target="f1"><li id=1 onclick=activate("1") class="active">About Us</li></a>
				<a href="stinfo.php" target="f1"><li id=2 class="" onclick=activate("2")>Add Student</li></a>
				<a href="stup.php" target="f1"><li id=3 class="" onclick=activate("3")>Modify Student Info</li></a>
				<a href="badd.php" target="f1"><li id=4 class="" onclick=activate("4")>Add Book</li></a>
				<a href="bsear.php" target="f1"><li id=5 class="" onclick=activate("5")>Search Book/Student</li></a>
				<a href="bissue.php" target="f1"><li id=6 class="" onclick=activate("6")>Book Issue</li></a>
				<a href="bret.php" target="f1"><li id=7 class="" onclick=activate("7")>Book Return</li></a>
			</ul>
		</div>
		<div class=d3>
			<iframe name=f1 src="aboutus.php">Not available</iframe>
		</div>
		<?php
			if(isset($_GET["lg"])){
				session_destroy();
				unset($_SESSION["lid"]);
				header("location:login.php");
			}
		?>
		<script>
			function activate(x){
				var c=document.getElementsByClassName("active");
				c[0].className="";
				document.getElementById(x).className="active";
			}
		</script>		
				
	</body>
</html>
				
			
		