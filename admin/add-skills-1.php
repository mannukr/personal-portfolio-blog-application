<?php

session_start();
if($_SESSION['sid']=="")
{	
	header("location:index.php");
}


?>

<?php include 'header.php';?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
    <?php include 'slider-bar.php';?>
        <!-- top navigation -->
       <?php include 'nav_bar.php';?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
		 
		 <?php 
		 //session_start();
/*if($_SESSION['sid']=="")
{	
	header("location:index.php");
}*/
	include 'config.php';
	####Add Top Banner Image Insert Query###
	extract($_POST);
	if(isset($_POST['add_team']))
	{
		 $query="INSERT INTO `skill_intro` (`id`,`introduction`) VALUES ('','".$introduction."')";
         mysqli_query($dbcon,$query) or die(mysqli_error($dbcon));
        
      if(mysqli_affected_rows($dbcon)>0)
    {
      $empty="Data Uploaded Successfully";
    }
    
	else
	{	
		$empty="Please Select Valid File";
	
	}
	}
  if(isset($_POST['add_personal_info_2']))
  {
    

        $query="INSERT INTO `tech_skills` (`id`,`name`,`max_rating`,`min_rating`) VALUES ('','".$name."','".$max_rating."','".$min_rating."')";
         mysqli_query($dbcon,$query) or die(mysqli_error($dbcon));
        $empty="File Uploaded Successfully";
    if(mysqli_affected_rows($dbcon)>0)
    {
      $empty="Data Uploaded Successfully";
    }
 
  }
if(isset($_POST['about_skills']))
  {
    

        $query="INSERT INTO `about_skills` (`id`,`heading`,`sub_heading`,`description`) VALUES ('','".$heading."','".$sub_heading."','".$description."')";
         mysqli_query($dbcon,$query) or die(mysqli_error($dbcon));
        $empty="File Uploaded Successfully";
    if(mysqli_affected_rows($dbcon)>0)
    {
      $empty="Data Uploaded Successfully";
    }
 
  }
##########Add banner bottom-section Image Insert Query end################
##########Delete Query################
	@$action=$_GET['action'];
	@$page=$_GET['page'];
	if($action=='delete')
	{
		$did=$_GET['did'];
		$query="DELETE FROM `$page` WHERE `id`='".$did."'";
		mysqli_query($dbcon,$query);
		//header("location:add-banner.php");
	}
##########Delete Query################
?>
<style>
.file{
	    border: 2px solid #999;
    border-radius: 6px;
    width: 175px;
    box-shadow: 1px 3px 2px 2px #999
}
#about_1
{
  display: none;

}
#about_2
{
  display:none;
  
}
#about_3
{
  display:none;
  
}
</style>
<script >
  function fun_about()
  {
    
    var e=document.getElementById("s1");
    var eno=e.options[e.selectedIndex].value;
    if(eno=="null")
    {
      alert("please Select a Valid option");
       document.getElementById("about_1").style.display="none";
        document.getElementById("about_2").style.display="none";
        document.getElementById("about_3").style.display="none";
        document.getElementById("title").innerHTML="Select Options to manage the Skills Section";
        
     
    }
    if(eno=="p1")
    {
      document.getElementById("about_1").style.display="block";
        document.getElementById("about_2").style.display="none";
       document.getElementById("about_3").style.display="none";
       document.getElementById("title").innerHTML="Add Introduction text about the Skills";
    }
    else if(eno=="p2")
    {
      document.getElementById("about_2").style.display="block";
      document.getElementById("about_1").style.display="none";
      document.getElementById("about_3").style.display="none";
       document.getElementById("title").innerHTML="Add Technical Skills with rating";
    }
    else if(eno=="p3")
    {
      document.getElementById("about_3").style.display="block";
      document.getElementById("about_1").style.display="none";
      document.getElementById("about_2").style.display="none";
       document.getElementById("title").innerHTML="Add Content about the Skills";
    }
  }
 
</script>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
   
        <!-- /top navigation -->

        <!-- page content -->
        <div  role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
     
              </div>
            </div>
            <div class="clearfix"></div>
			<!--------------------menu--------------->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" >
                  <div class="x_title">
                    <h3 ><b id="title">Manage Sills Section</b></h3>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content" id="">
                    <br />
                    <form id="demo-form2" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                     

    <div class="form-group">
     <label for="exampleInputEmail1">Select Option</label> 
     <select class="form-control" id="s1" onchange="return fun_about()">
       <option  value="null">
         -Select- 
       </option>
       <option value="p1">
         Add Skills Breif Introduction 
       </option>
       <option value="p2">
         Add Technical Skills with Rating
       </option>
       <option value="p3">
         Add Content About Skills
       </option>
     </select>
      </div>

      
      
           <div class="ln_solid"></div>
                     
                    </form>
                  </div>
                  <div class="x_content" id="about_1">
                    <br />
                    <form id="demo-form2" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                     

    <div class="form-group">
     <label for="exampleInputEmail1">Enter Introductry Description about the Skills </label> 
     <textarea class="form-control" name="introduction" rows="12"></textarea>
      </div>

      
      
					 <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name="add_team">Add</button>
						  <button class="btn btn-primary" type="button">Cancel</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="x_content" id="about_2">
                    <br />
                    <form id="demo-form2" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                      

    <div class="form-group">
     <label for="exampleInputEmail1">Add technical Skill</label> 
     <input type="text"  name="name" id="exampleInputEmail1" class="form-control">
      </div>

      <div class="form-group">
     <label for="exampleInputEmail1">Enter Maximum Rating</label> 
     <input type="number" class="form-control" id="exampleInputEmail1" name="max_rating">
      </div>
      <div class="form-group">
     <label for="exampleInputEmail1">Enter Minimum Rating</label> 
     <input type="number" class="form-control" id="exampleInputEmail1" name="min_rating">
      </div>

      
      
      
           <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name="add_personal_info_2">Add</button>
              <button class="btn btn-primary" type="button">Cancel</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="x_content" id="about_3">
                    <br />
                    <form id="demo-form2" class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                      

    <div class="form-group">
     <label for="exampleInputEmail1">Enter Heading</label> 
     <input type="text"  name="heading" id="exampleInputEmail1" class="form-control">
      </div>

      <div class="form-group">
     <label for="exampleInputEmail1">Enter Sub Heading</label> 
     <input type="text" class="form-control" id="exampleInputEmail1" name="sub_heading">
      </div>
      <div class="form-group">
     <label for="exampleInputEmail1">Enter Description</label> 
     <textarea name="description" class="form-control" rows="15"></textarea>
      </div>

      
      
      
           <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name="about_skills">Add</button>
              <button class="btn btn-primary" type="button">Cancel</button>
                        </div>
                      </div>
                    </form>
                  </div>
                
                </div>
              </div>
            </div>
             <div class="col-md-12 col-sm-12 col-xs-12">
                <!-- Space for Deleted Content Saved on deleted-content-manage-per-info.php -->
              </div>
			</div>
			
			
          </div>
        </div>
        <!-- /page content -->

	   </div>
        <!-- /page content -->

        <!-- footer content -->
       <?php include'footer.php';?>
        <!-- /footer content -->
      <!--</div>
    </div>-->

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="vendors/Flot/jquery.flot.js"></script>
    <script src="vendors/Flot/jquery.flot.pie.js"></script>
    <script src="vendors/Flot/jquery.flot.time.js"></script>
    <script src="vendors/Flot/jquery.flot.stack.js"></script>
    <script src="vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
	
  </body>
</html>
