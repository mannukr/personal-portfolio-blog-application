<?php

session_start();
if($_SESSION['sid']=="")
{	
	header("location:index.php");
}
include 'config.php';

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
  document.getElementById("about_3").style.display="none";
        document.getElementById("about_2").style.display="none";
        document.getElementById("title").innerHTML="Select Options to View the Skills Content";
        
     
    }
    if(eno=="p1")
    {
      document.getElementById("about_1").style.display="block";
  document.getElementById("about_3").style.display="none";
        document.getElementById("about_2").style.display="none";
       document.getElementById("title").innerHTML="View Skills Brief intro";
    }
    else if(eno=="p2")
    {
      document.getElementById("about_2").style.display="block";
        document.getElementById("about_3").style.display="none";
      document.getElementById("about_1").style.display="none";
       document.getElementById("title").innerHTML="View Technical Skills with rating";
    }
    else if(eno=="p3")
    {
      document.getElementById("about_3").style.display="block";
      document.getElementById("about_1").style.display="none";
        document.getElementById("about_2").style.display="none";

       document.getElementById("title").innerHTML="View Content about Skills";
    }
  }
 
</script>
<?php 

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
                <div class="x_panel">
                  <div class="x_title">
                    <h2><b id="title">View Skills Section</b></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
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
         View Skills brief Intro
       </option>
       <option value="p2">
         View Technical Skills with Rating 
       </option>
        <option value="p3">
         View Content about Skills 
       </option>
     </select>
      </div>

      
      
           <div class="ln_solid"></div>
                      <!--<div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" onclick="return fun_submit()" >Proceed</button>
              <button class="btn btn-danger" type="button">Cancel</button>
                        </div>
                      </div>-->
                    </form>
                  </div>



                  <div class="x_content" id="about_1">
                   <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">SR. No.</th>
                            <th class="column-title">ID</th>
                          
                            <th class="column-title">Description about the Skills</th>
                            
                                

                            <th class="column-title">Edit</th>
                             <th class="column-title">Delete</th>
                          </th>
                           </tr>
                        </thead>

                        <tbody>
             <?php
                                    $q1="SELECT * FROM `skill_intro` ORDER BY `id` DESC";
                  $d1=mysqli_query($dbcon, $q1);
                  $counter=0;
                                    while ($res3=mysqli_fetch_array($d1)) {
                                        ?>
                            <tr class="even pointer">
                <td><input type="checkbox" id="check-all" class="flat"></td>
                <td class=" "><?php echo ++$counter;?></td>
                <td class=" "><?php echo $res3['id'];?></td>
                <td class=" "><?php echo $res3['introduction'];?></td>                
                               
                
                <td class=" "><a class="btn btn-primary" href="edit-skill_intro.php?did= <?php echo $res3['id'];?>&action=edit&page=skill_intro"><i class="fa fa-edit"></i>Edit</a></td>
                <td class=" "><a onclick="return confirm('Are you sure?')" class="btn btn-round btn-danger" style="color:#fff;" href="?did=<?php echo $res3['id'];?>&action=delete&page=skill_intro">Delete</td>
                </tr>
                     <?php
                  }
                  ?>
                         </tbody>
                      </table>
                    </div>
         </div>


                  <div class="x_content" id="about_2">
                   <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">SR. No.</th>
                            <th class="column-title">ID</th>
                          
                            <th class="column-title">Technical Skills</th>
                            <th class="column-title">Rating</th>
                            <th class="column-title">Maximum Rating</th>
                            <th class="column-title">Edit</th>
                             <th class="column-title">Delete</th>
                          </th>
                           </tr>
                        </thead>

                        <tbody>
                  <?php
                  $q1="SELECT * FROM `tech_skills`";
                  $d1=mysqli_query($dbcon, $q1);
                  $counter=0;
                  while ($res3=mysqli_fetch_array($d1)) {
                  ?>
                <tr class="even pointer">
                <td><input type="checkbox" id="check-all" class="flat"></td>
                <td class=" "><?php echo ++$counter;?></td>
                <td class=" "><?php echo $res3['id'];?></td>
                
              
                <td class=" "><?php echo $res3['name'];?></td>
                <td class=" "><?php echo $res3['min_rating'];?></td>
                <td class=" "><?php echo $res3['max_rating'];?></td>
                
                
                
                <td class=" "><a class="btn btn-primary" href="edit-technical-skills.php?did= <?php echo $res3['id'];?>&action=edit&page=tech_skills"><i class="fa fa-edit"></i>Edit</a></td>
                <td class=" "><a onclick="return confirm('Are you sure?')" class="btn btn-round btn-danger" style="color:#fff;" href="?did=<?php echo $res3['id'];?>&action=delete&page=tech_skills">Delete</td>
                </tr>
                  <?php
                  }
                  ?>
                         </tbody>
                      </table>
                    </div>
         </div>



                  <div class="x_content" id="about_3">
                   <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">SR. No.</th>
                            <th class="column-title">ID</th>
                          
                            <th class="column-title">Heading</th>
                            <th class="column-title">Sub-Heading</th>
                            <th class="column-title">Description</th>
                            <th class="column-title">Edit</th>
                             <th class="column-title">Delete</th>
                          </th>
                           </tr>
                        </thead>

                        <tbody>
                  <?php
                  $q1="SELECT * FROM `about_skills`";
                  $d1=mysqli_query($dbcon, $q1);
                  $counter=0;
                  while ($res3=mysqli_fetch_array($d1)) {
                  ?>
                <tr class="even pointer">
                <td><input type="checkbox" id="check-all" class="flat"></td>
                <td class=" "><?php echo ++$counter;?></td>
                <td class=" "><?php echo $res3['id'];?></td>
                
              
                <td class=" "><?php echo $res3['heading'];?></td>
                <td class=" "><?php echo $res3['sub_heading'];?></td>
                <td class=" "><?php echo $res3['description'];?></td>
                
                
                
                <td class=" "><a class="btn btn-primary" href="edit-about-skills.php?did= <?php echo $res3['id'];?>&action=edit&page=about_skills"><i class="fa fa-edit"></i>Edit</a></td>
                <td class=" "><a onclick="return confirm('Are you sure?')" class="btn btn-round btn-danger" style="color:#fff;" href="?did=<?php echo $res3['id'];?>&action=delete&page=about_skills">Delete</td>
                </tr>
                  <?php
                  }
                  ?>
                         </tbody>
                      </table>
                    </div>
         </div>

         







                </div>
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
      </div>
    </div>

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
