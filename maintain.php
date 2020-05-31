<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>PC MAINTAINANCE</h2>

			<?php
				if(isset($_SESSION['u_uid']))
				{
					echo '<marquee>You Are Logged In!!</marquee>
							<br><center>
								<table border="1">
									<th colspan="7"><font color="white">Maintainance Log</font></th>

										<tr>
											<td><b>EC-NUMBER</b></td>
											<td><b>MAC ADDRESS</b></td>
											<td><b>PC MODEL</b></td>
											<td><b>HISTORY</b></td>
											<td><b>REPAIR COSTS</b></td>
											<td><b>REPAIRED BY</b></td>											
										</tr>

										<tr>
											<form action="includes/maintain.inc.php" method="POST" class="signup-form" onsubmit="checkfields()">
												<td><input type="text" name="ecnum" id="ecnum"></td>
												<td><input type="text" name="mac" id="mac"></td>
												<td><input type="text" name="model" id="model"></td>
												<td><input type="text" name="history" id="history"></td>
												<td><input type="text" name="cost" id="cost"></td>
												<td><input type="text" name="repaired" id="repaired"></td>													
										</tr>

										<tr>
											<td><b>DATE FIXED</b></td>
										</tr>

										<tr>
											<td><input type="date" name="fix" id="fix"></td>
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
					if (document.getElementById("ecnum").value == "" || document.getElementById("mac").value == "" || document.getElementById("model").value == "" || document.getElementById("history").value == "" || document.getElementById("cost").value == "" || document.getElementById("repaired").value == "" || document.getElementById("fix").value == "")
					{
						alert("Please fill in all fields");
						return false;
					}
				}
			</script>

		</div>
	</section>

<?php
	include_once 'footer.php';
?>