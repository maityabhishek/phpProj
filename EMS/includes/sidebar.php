
<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
						
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li><a href="home.php"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>
								

							<?php
									
									if($permission_ary[employeelist][view]==1)
									{
										echo '<li id="menu-academico" ><a href="employeelist.php"><i class="fa fa-envelope nav_icon"></i><span>Employee</span><div class="clearfix"></div></a></li>';
									}
									
							
									if($permission_ary[departmentlist][view]==1)
									{
										echo '<li><a href="departmentlist.php"><i class="fa fa-picture-o" aria-hidden="true"></i><span>Department</span><div class="clearfix"></div></a></li>';
									}
									if($permission_ary[designation][view]==1)
									{
										echo '<li><a href="designation.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i><span>Designation</span><div class="clearfix"></div></a></li>';
									}
									if($permission_ary[recuitmentlist][view]==1)
									{
										echo '<li id="menu-academico" ><a href="recuitmentlist.php"><i class="fa fa-bar-chart"></i><span>Prerecruitment</span><div class="clearfix"></div></a></li>';
									}
									
							?>		
									 <li id="menu-academico" ><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Leave </span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										<?php 
										if($permission_ary[leavelist][view]==1)
										{
											echo '<li id="menu-academico-avaliacoes" ><a href="leavelist.php">Leave List</a></li>';
										}
										?>
											<li id="menu-academico-avaliacoes" ><a href="holiday.php">List Of Holidays</a></li>
											<li id="menu-academico-avaliacoes" ><a href="leave.php">Apply for Leave</a></li>
											<!--<li id="menu-academico-avaliacoes" ><a href="faq.html">Faq</a></li>-->
										  </ul>
										</li>
									<!--<li id="menu-academico" ><a href="errorpage.html"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><span>Error Page</span><div class="clearfix"></div></a></li>
									  <li id="menu-academico" ><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i><span> UI Components</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="button.html">Buttons</a></li>
											<li id="menu-academico-avaliacoes" ><a href="grid.html">Grids</a></li>
										  </ul>
										</li>-->
									 <!--<li><a href="tabels.html"><i class="fa fa-table"></i>  <span>Tables</span><div class="clearfix"></div></a></li>
									<li><a href="maps.html"><i class="fa fa-map-marker" aria-hidden="true"></i>  <span>Maps</span><div class="clearfix"></div></a></li>
							        <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i>  <span>Pages</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
										 <ul id="menu-academico-sub" >
											<li id="menu-academico-boletim" ><a href="calendar.html">Calendar</a></li>
											<li id="menu-academico-avaliacoes" ><a href="signin.html">Sign In</a></li>
											<li id="menu-academico-avaliacoes" ><a href="signup.html">Sign Up</a></li>
											

										  </ul>
									 </li>-->
									<!--<li><a href="#"><i class="fa fa-check-square-o nav_icon"></i><span>Forms</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
									  <ul>
										<li><a href="input.html"> Input</a></li>
										<li><a href="validation.html">Validation</a></li>
									</ul>
									</li>-->
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>