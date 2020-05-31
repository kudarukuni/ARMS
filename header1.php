<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>www.arms.com</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>

<header>
	<nav>

		<div class="main-wrapper">
			<ul>
				<li><a href="index3.php"><b><font size = "">HOME</font></b></a></li>
				<li>

					<?php
						if (isset($_SESSION['u_id'])) 
						{
							echo'<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="register1.php">REGISTRATION</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="maintain1.php">MAINTANANCE</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="report1.php">QUERY</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="analysis1.php">ANALYSIS</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="confisticated1.php">INVENTORY</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="library1.php">LIBRARY</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="printform1.php">PRINT FORM</a></b>';
						}
					?>

				</li>
			</ul>

			<div class="nav-login">
				
				<?php
					if (isset($_SESSION['u_id'])) 
					{
						echo '	<form action="includes/logout.inc.php" method="POST">
									<button type="submit" name="submit" style="cursor:pointer; display: block; margin: 0 auto; width: 97%;	height: 25px;	border: none; background-color: #222; font-family: arial; font-size: 16px; color: #fff;">LOGOUT</button>
								</form>';
					}
					else
					{
						echo '	<form action="includes/login.inc.php" method="POST" onsubmit="checkfields()">
									<input type="text" id="uid" name="uid" placeholder="Username / E-mail">
									<input type="password" id="pwd" name="pwd" placeholder="Password">
									
									<button type="submit" name="submit" style="cursor:pointer; display: block; margin: 0 auto; width: 17%;	height: 30px;	border: none; background-color: #222; font-family: arial; font-size: 16px; color: #fff;">LOGIN</button>
								</form>

								<script>
									function checkfields()
									{
										if (document.getElementById("uid").value == "" || document.getElementById("pwd").value == "")
										{
											alert("Please fill in all fields");											
											return false;
										}
									}
								</script>';
								
								//<a href="sigup.php">SIGN UP</a>';
					}
				?>				
				
			</div>

		</div>
	</nav>
</header>

<?php
	include_once 'footer.php';
?>
