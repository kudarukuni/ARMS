<?php
	include_once 'header1.php';
?>

	<section class="main-container">
		<div class="main-wrapper">
			<h2>VEHICLE QUERY</h2>

			<?php
				if(isset($_SESSION['u_uid']))
				{
					echo "<marquee>You Are Logged In!!</marquee>";
				}
			?>

			<form action="showboat10.php" method="POST" class="signup-form" onsubmit="checkfields()">
				<input type="text" id="search" name="search" placeholder="SEARCH BY REGISTRATION NUMBER">
			
				<br>
				<br>
			
				<button type="submit" name="submit">SEARCH</button>
			</form>

			<script>
				function checkfields()
				{
					if (document.getElementById('search').value == "")
					{
						alert("Please fill in all fields");
						return false;
					}
				}
			</script>

			<p>
				<a href="fogot1.php"> Fogot Your Registration Number ?? Click Here !! </a>
			</p>
			
		</div>
	</section>

<?php
	include_once 'footer.php';
?>
