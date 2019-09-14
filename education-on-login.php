
<?php

session_start();
if($_SESSION['userid']=="")
{   
    header("location:login.php");
}

include 'config.php';
include 'header2.php';
?>


<!-- Education -->
<div class="education" id="education">
	<div class="container">
			<h3 class="heading">Education</h3>
			           <?php 
                       include 'config.php';
                       $query1="SELECT * FROM `education`";
                       $d2=mysqli_query($dbcon,$query1);
                       while( $res=mysqli_fetch_array($d2))
                       {
					   ?>
		<div class="col-md-12">
			<div class="grid1">
				<center><h3><?php echo $res['category'];  ?></h3></center>
				<h3><?php echo $res['title'];  ?></h3>
				<h3><?php echo $res['title2'];  ?></h3>
				<h4><b>Year</b> : <?php echo $res['year'];  ?>
				<h4><b>Aggregate (%)</b> : <?php echo $res['grade'];  ?></h4>
				<br>
				<h3><?php echo $res['college'];  ?></h3>
				<h3><?php echo $res['university'];  ?></h3>
				<p><?php echo $res['description'];  ?></p>
				
			</div>
		</div>
		<div class='clearfix'></div>
		<br>
		<br>
		<?php 

	}
	?>
		
		
		
	</div>
</div>
<!-- //Education -->


<!-- Technical Stats -->
<div class="count-agileits" id="stats">
	<div class="container">
		<h3 class="heading">Technical Statistics</h3>
					<div class="count-grids">
					<div class="count-bgcolor-w3ls">
						 <?php 
                       include 'config.php';
                       $query1="SELECT * FROM `statistics`";
                       $d2=mysqli_query($dbcon,$query1);
                       while( $res3=mysqli_fetch_array($d2))
                       {
					   ?>
						<div class="col-md-3 count-grid">
							<div class="count hvr-bounce-to-bottom">
								<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='<?php echo $res3['number'];?>' data-delay='1' data-increment="1"><?php echo $res3['number'];?></div>
									<span></span>
									<h5><?php echo $res3['name'];?></h5>
							</div>
						</div>
						<?php 
					}
					?>

						<div class="clearfix"></div>
						</div>
					</div>
	</div>
</div>

<!-- Technical stats -->

<?php 
include 'footer.php';

?>