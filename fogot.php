<?php
	include_once 'header.php';
?>

	<section class="main-container">
		<div class="main-wrapper">
			<h2>PC QUERY</h2>

			<?php
				if(isset($_SESSION['u_uid']))
				{
					echo "<marquee>You Are Logged In!!</marquee>";
				}
			?>

			<form action="showboat2.php" method="POST" class="signup-form" onsubmit="checkfields()">
				<input type="text" id="search" name="search" placeholder="SEARCH BY EC NUMBER">
			
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
				<a href="report.php"> Fogot Your EC Number ?? Click Here !!</a>
			</p>
			
		</div>
	</section>

<?php
	include_once 'footer.php';
?>
