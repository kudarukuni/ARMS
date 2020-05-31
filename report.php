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

			<form action="showboat.php" method="POST" class="signup-form" onsubmit="checkfields()">
				<input type="text" id="search" name="search" placeholder="SEARCH BY MAC ADDRESS">
			
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
				<a href="fogot.php"> Fogot Your Mac Address ?? Click Here !! </a>
			</p>
			
		</div>
	</section>

<?php
	include_once 'footer.php';
?>