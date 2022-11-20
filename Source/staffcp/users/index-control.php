<?php 
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 2.2
// * 
// * Copyright (c) 2022 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
include(dirname(__FILE__) . "/../../include/features.php");

site_secure();
secure_url();
site_secure_staff_check();

site_header(STAFF_USERCONTROL);
site_navi_logged();
site_content_logged();

$limit = 10;  
if (isset($_GET["site"])) {
	$site  = $_GET["site"]; 
}else{ 
	$site=1;
};  
$start_from = ($site-1) * $limit;

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".STAFF_USERCONTROL."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/users/index-control.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".STAFF_USERCONTROL."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERSUPPORT."</h4>
										<p class='card-title-desc'></p>
									</div>
									<div class='card-body'>										
							<div class='table-responsive'>
								<table class='table'>
									<thead class=' text-primary'>
										<th>
											".STAFF_USERCONTROLUSERID."
										</th>
										<th>
											".STAFF_USERCONTROLUSERNAME."
										</th>					  
										<th>
											".STAFF_USERCONTROLEMAIL."
										</th>				  
										<th>
											".STAFF_USERCONTROLACCOUNTWHITELIST."
										</th>
									</thead>
									<tbody>";

								$sql = "SELECT id, username, email, whitelisted FROM accounts ORDER BY id ASC LIMIT ".$start_from.", ".$limit."";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									while($userchange = $result->fetch_assoc()) {
									echo "
										<tr>
											<td>
												" . $userchange["id"]. "
											</td>
											<td>
												" . $userchange["username"]. "
											</td>						
											<td>
												" . $userchange["email"]. "
											</td>
											<td>
												" . $userchange["whitelisted"]. "
											</td>
										</tr>";
									}
								}					
								echo "					  
									</tbody>
								</table>";
						
								$result_db = mysqli_query($conn,"SELECT COUNT(id) FROM accounts"); 
								$userchange_db = mysqli_fetch_row($result_db);  
								$total_records = $userchange_db[0];  
								$total_sites = ceil($total_records / $limit); 
								$siteLink = "
									<div class='btn-toolbar gap-2' role='toolbar' aria-label='Toolbar with button groups'>
										<div class='btn-group' role='group' aria-label='First group'>";  
									for ($i=1; $i<=$total_sites; $i++) {
										$siteLink .= "
											<button type='button' class='btn btn-secondary'>
												<a href='".$_SERVER['PHP_SELF']."?site=".$i."' data-page='".$i."'>".$i."</a>
											</button>";	
									}
									echo $siteLink . "
										</div>
									</div>			  
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
					</div>
						<!-- end row -->";
site_footer();	
?>