<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php'
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>ASSET LIBRARY</h2>

			<?php
				if(isset($_SESSION['u_uid']))
				{
					echo '<marquee>You Are Logged In!!</marquee>
							<br><br><br><center>
								<table border="1">
									<th colspan="7"><font color="white">Asset Library Log</font></th>

										<tr>
											<td><b>EC-NUMBER</b></td>
											<td><b>NAME</b></td>
											<td><b>ID NUMBER</b></td>
											<td><b>ASSET BORROWED</b></td>
											<td><b>SERIAL NUMBER</b></td>											
											<td><b>LIBRARIAN</b></td>											
										</tr>

										<tr>
											<form action="includes/library.inc.php" method="POST" class="signup-form" onsubmit="checkfields()">
												<td><input type="text" name="ecnum" id="ecnum"></td>
												<td><input type="text" name="names" id="names"></td>
												<td><input type="text" name="natId" id="natId"></td>
												<td><input type="text" name="borrowed" id="borrowed"></td>
												<td><input type="text" name="seria" id="seria"></td>
												<td><input type="text" name="librarian" id="librarian"></td>													
										</tr>

										<tr>
											<td><b>DATE BORROWED</b></td>
											<td><b>DUE DATE</b></td>
											<td><b>CONTACT DETAILS</b></td>
										</tr>

										<tr>
											<td><input type="date" name="dateborrowed" id="dateborrowed"></td>
											<td><input type="date" name="duedate" id="duedate"></td>
											<td><input type="text" name="fon" id="fon"></td>
										</tr>

								</table>
							<br><button type="submit" name="submit" style="cursor:pointer; display: block; margin: 0 auto; width: 10%;	height: 40px;	border: none; background-color: #222; font-family: arial; font-size: 16px; color: #fff;">UPDATE</button>
						</form></center>';

					echo 				'		';
				}
			?>

			<script>
				function checkfields()
				{
					if (document.getElementById("ecnum").value == "" || document.getElementById("names").value == "" || document.getElementById("natid").value == "" || document.getElementById("borrowed").value == "" || document.getElementById("seria").value == "" || document.getElementById("librarian").value == "" || document.getElementById("dateborrowed").value == "" || document.getElementById("duedate").value == "" || document.getElementById("fon").value == "")
					{
						alert("Please fill in all fields");
						return false;
					}
				}
			</script>

			<?php

				$sql9 = "SELECT * FROM library";
				$result9 = mysqli_query($conn, $sql9);
				$row9 = mysqli_fetch_assoc($result9);

				$exp_date = $row9['duedate'];
				$today_date = date('Y/m/d');

				$sql7 = "SELECT * FROM library WHERE duedate < '$today_date'";
				$result7 = mysqli_query($conn, $sql7);
				$resultCheck7 = mysqli_num_rows($result7);

				$sql19 = "SELECT COUNT(duedate) as 'expiredassets' FROM library WHERE duedate < '$today_date'";
				$result19 = mysqli_query($conn, $sql19);
				$resultCheck19 = mysqli_num_rows($result19);
				$row19 = mysqli_fetch_assoc($result19);			
							
				if ($resultCheck7 > 0 || $resultCheck19 > 0)
				{
					echo "<br><br><b><font size='9' color='red'>Assets Overdue: " . $row19['expiredassets'] . "</font></b><br><br><br>";

					echo '<table border="2" align="center">
								<th colspan="6"><font color="white">Assets Overdue</font></th>
									<tr>
										<td><b>EC NUMBER</b></td>
										<td><b>NAME</b></td>
										<td><b>CONTACT DETAILS</b></td>
										<td><b>ASSET BORROWED</b></td>
										<td><b>SERIAL NUMBER</b></td>
										<td><b>LIBRARIAN</b></td>
									</tr>';		
					while($row7 = mysqli_fetch_assoc($result7)) 
					{
						echo 		'<tr>
										<td>' . $row7["ecnum"] . '</td>
										<td>' . $row7["names"] . '</td>
										<td>' . $row7["fon"] . '</td>
										<td>' . $row7["borrowed"] . '</td>
										<td>' . $row7["seria"] . '</td>
										<td>' . $row7["librarian"] . '</td>
									</tr>';
					}
					echo "<br></table><br>";
				}

			?>

			<p>

				<a href="assetregister.php"><b><font size='3'>REGISTER AN ASSET NOW!!!</font></b></a>

				<form action="includes/library.inc2.php" method="POST" class="signup-form" onsubmit="checkfields2()">
					<br>
					<input type="text" id="search" name="search" placeholder="ENTER SERIAL NUMBER">
					<button type="submit" name="submit2">RETURN</button>
				</form>

			</p>

			<script>
				function checkfields2()
				{
					if (document.getElementById('search').value == "")
					{
						alert("Please fill in all fields");
						return false;
					}
				}
			</script>

			<br><br><br><br>

			<?php
				$sql47 = "SELECT * FROM assetregister";
				$result47 = mysqli_query($conn, $sql47);
				$resultCheck47 = mysqli_num_rows($result47);

				if ($resultCheck47 > 0) 
				{
					echo '<br><br><br><br><a name="birds"><table border="2" align="center">
					<th colspan="7"><font color="white">Registered Assets</font></th>
						<tr>
							<td><b>ASSET ID</b></td>
							<td><b>SERIAL NUMBER</b></td>
							<td><b>PC MODEL</b></td>					
							<td><b>DATE BOUGHT</b></td>
							<td><b>STOCK PRICE</b></td>
						</tr>';
					while ($row47 = mysqli_fetch_assoc($result47)) 
					{
						echo '	<tr>
									<td><center>' . $row47['assid'] . '</center></td>
									<td>' . $row47['seria'] . '</td>
									<td>' . $row47['model'] . '</td>
									<td>' . $row47['dob'] . '</td>
									<td>' . $row47['sp'] . '</td>
								</tr>';
					}
					echo "</table><br><br>";
				}
			?>

		</div>
	</section>

<?php
	include_once 'footer.php';
?>