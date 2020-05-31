<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>

	<section class="main-container">
		<div class="main-wrapper">
			<h2>REGISTRATION DETAILS</h2>

			<?php
				if (isset($_SESSION['u_uid']))
				{
					echo '<marquee>You Are Logged In!!</marquee>';
				}
			?>

			<?php

				$search = mysqli_real_escape_string($conn, $_POST['search']);

				$sql = "SELECT dod FROM register WHERE ecnum = '$search'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				$row = mysqli_fetch_assoc($result);
							
				if ($resultCheck > 0)
				{
					$exp_date = $row['dod'];
					$today_date = date('Y/m/d');

					$exp = strtotime($exp_date);
					$td = strtotime($today_date);

					if($td > $exp)
					{
						$diff = $td - $exp;
						$x = abs(floor($diff / (60 * 60 * 24)));
						echo "<b><font size='9' color='red'>Product Expired!!</font></b>";
						echo "<br>Days overdue: <b><font color='purple'>".$x;
						echo "</font></b><br><br><br><br>";
					}
					else
					{
						$diff = $td - $exp;
						$x = abs(floor($diff / (60 * 60 * 24)));
						echo "<b><font size='9' color='red'>Product Not Expired!!</font></b>";
						echo "<br>Days remaining: <b><font color='purple'>".$x;
						echo "</font></b><br><br><br><br>";
					}
				}
			?>
			
			<?php	

				$search = mysqli_real_escape_string($conn, $_POST['search']);

				if (isset($_POST['submit'])) 
				{							
					if (empty($search))
					{
						header("Location: fogot.php?fogot=empty");
						exit();
					}
					else
					{
						$sql = "SELECT * FROM register WHERE ecnum = '$search'";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);

						if ($resultCheck < 1)
						{
							header("Location: fogot.php?fogot=ecnumnotfound");
							exit();
						}
						else 
						{
							$sql = "SELECT * FROM register WHERE ecnum = '$search'";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);

							$sql1 = "SELECT * FROM maintain WHERE ecnum = '$search'";
							$result1 = mysqli_query($conn, $sql1);
							$resultCheck1 = mysqli_num_rows($result1);
									
							if ($resultCheck > 0)
							{
							echo 	'<table border="2" align="center">
										<th colspan="11"><font color="white">Computer Details</font></th>
											<tr>
												<td><b>EC-NUMBER</b></td>
												<td><b>MAC ADDRESS</b></td>
												<td><b>SERIAL NUMBER</b></td>
												<td><b>PC MODEL</b></td>
												<td><b>PROCESSOR</b></td>					
												<td><b>OPERATING SYSTEM</b></td>
												<td><b>SYSTEM TYPE</b></td>
												<td><b>RAM</b></td>
												<td><b>PURCHASE PRICE</b></td>
												<td><b>DATE BOUGHT</b></td>					
												<td><b>EXPIRY DATE</b></td>
											</tr>';

								while ($row = mysqli_fetch_assoc($result)) 
								{
									echo '	<tr>
												<td>' . $row['ecnum'] . '</td>
												<td>' . $row['mac'] . '</td>
												<td>' . $row['seria'] . '</td>
												<td>' . $row['model'] . '</td>
												<td>' . $row['intel'] . '</td>
												<td>' . $row['bos'] . '</td>
												<td>' . $row['bits'] . '</td>
												<td>' . $row['ram'] . '</td>
												<td><b><font color="blue">' . $row['sp'] . '</font></b></td>
												<td>' . $row['dob'] . '</td>
												<td>' . $row['dod'] . '</td>
											</tr>' . '<br></table><br><br><br>';
								}
							}

							$sql = "SELECT * FROM register WHERE ecnum = '$search'";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							$row = mysqli_fetch_assoc($result);

							echo '<a href="#birds">SHOW MORE DETAILS</a>
							<br><br><center><font size="20">Purchase Price: <font color="blue">' . $row['sp'] . '</font></font></center><br><br><br><br><br><br><br><br><br><br><br><br>';

							if($resultCheck1 > 0)
							{
								echo 	'	<a name="birds"><table border="2" align="center">
												<th colspan="7"><font color="white">Maintainance Report</font></th>
													<tr>
														<td><b>EC-NUMBER</b></td>
														<td><b>MAC ADDRESS</b></td>
														<td><b>PC MODEL</b></td>
														<td><b>HISTORY</b></td>
														<td><b>REPAIR COST</b></td>
														<td><b>REPAIRED BY</b></td>					
														<td><b>DATE FIXED</b></td>
													</tr>';

								while ($row1 = mysqli_fetch_assoc($result1)) 
								{
									echo '			<tr>
														<td>' . $row1['ecnum'] . '</td>
														<td>' . $row1['mac'] . '</td>
														<td>' . $row1['model'] . '</td>
														<td>' . $row1['history'] . '</td>
														<td>' . $row1['cost'] . '</td>
														<td>' . $row1['repaired'] . '</td>
														<td>' . $row1['fix'] . '</td>
													</tr>';
								}
								echo "</table><br><br>";																
							}
						}
					}
				}
				else
				{
					header("Location: fogot.php");
					exit();
				}
			?>

			<?php

				$search = mysqli_real_escape_string($conn, $_POST['search']);

				$sql2 = "SELECT SUM(sp) as 'spcost' FROM register WHERE ecnum = '$search'";
				$sql4 = "SELECT dob FROM register WHERE ecnum='$search'";
				$sql5 = "SELECT dod FROM register WHERE ecnum='$search'";

				$result2 = mysqli_query($conn, $sql2);
				$result4 = mysqli_query($conn, $sql4);
				$result5= mysqli_query($conn, $sql5);

				$resultCheck2 = mysqli_num_rows($result2);
				$resultCheck4 = mysqli_num_rows($result4);
				$resultCheck5 = mysqli_num_rows($result5);

				$row2 = mysqli_fetch_array($result2);
				$row4 = mysqli_fetch_assoc($result4);
				$row5 = mysqli_fetch_assoc($result5);

				$a = (1 - 0.25);

				$date1 = new DateTime($row4['dob']);
				$date2 = new DateTime($row5['dod']);
				
				$j = $date1->diff($date2); 
				
				$b = pow($a,$j->y);
				$c = $row2['spcost']*$b;

				if ($resultCheck2 > 0 || $resultCheck3 > 0)
				{
					echo '<br><font size="9" color="brown">Scrap Value: <font size="9" color="green"><b>' . $c . '</b></font>';

					echo '<br><br>Lifespan: ' . $j->y . '<br>';
				}

			?>

			<?php

				$search = mysqli_real_escape_string($conn, $_POST['search']);

				$sql0 = "SELECT SUM(cost) as 'sumcost' FROM maintain WHERE ecnum = '$search'";
				$result0 = mysqli_query($conn, $sql0);
				$resultCheck0 = mysqli_num_rows($result0);
				$row0 = mysqli_fetch_array($result0);
							
				if ($resultCheck0 > 0)
				{
					echo "<p><font size='9' color='brown'>Total Repair Cost: </font><font size='9' color='blue'><b>".$row0['sumcost'].'</b></font>';		
				}
			?>

			<?php

				$search = mysqli_real_escape_string($conn, $_POST['search']);

				$sql0 = "SELECT COUNT(cost) as 'countcost' FROM maintain WHERE ecnum = '$search'";
				$result0 = mysqli_query($conn, $sql0);
				$resultCheck0 = mysqli_num_rows($result0);
				$row0 = mysqli_fetch_array($result0);
							
				if ($resultCheck0 > 0)
				{
					echo "<p><font size='9' color='brown'>Times Repaired: </font><b><font color='black'>" . $row0['countcost'] . '</font></b></p>';		
				}
			?>			

		</div>
	</section>

<?php
	include_once 'footer.php';
?>