<?php 
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 2.1
// * 
// * Copyright (c) 2022 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
include(dirname(__FILE__) . "/../../include/features.php");
site_secure();
secure_url();
site_secure_staff_check();

$limit = 10;  
if (isset($_GET["site"])) {
	$site  = $_GET["site"]; 
}else{ 
	$site=1;
};  
$start_from = ($site-1) * $limit;

site_header("".FRAGE_HEADER_2."");
site_navi_logged();
site_content_logged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".FRAGE_HEADER_2."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/whitelist/index-wllist.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".FRAGE_HEADER_2."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <div class='row'>

              <div class='col-lg-12'>
                <div class='card'>
                  <div class='card-body'>
					<table class='table'>
						<thead>
							<tr>
								<th>ID</th>
								<th>Username</th>
								<th>Character Name</th>
								<th>Option</th>
							</tr>
						</thead>
						<tbody>";
					$sqlposted = "SELECT * FROM xucp_whitelist";
					$resultposted = $conn->query($sqlposted);

					if ($resultposted->num_rows > 0) {
						// output data of each row
						while($whitelist = $resultposted->fetch_assoc()) {			
						echo"		
							<tr>
								<td>".$whitelist['id']."</td>
								<td>".$whitelist['ucpname']."</td>
								<td>".$whitelist['charname']."</td>
								<td>
									<a href='index-wllist-view.php?id=".$whitelist['id']."' class='has-arrow'>
										<i class='dripicons-checkmark'></i>&nbsp;".FRAGE_VIEW."
									</a>
								</td>
							</tr>";	
						}
					}
					echo "
						</tbody>
					</table>";
				$result_db = mysqli_query($conn,"SELECT COUNT(id) FROM xucp_whitelist"); 
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
                    <!-- end row -->";
site_footer();
?>