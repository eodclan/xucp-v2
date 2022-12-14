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

site_secure_staff_check_rank();

$limit = 10;  
if (isset($_GET["site"])) {
	$site  = $_GET["site"]; 
}else{ 
	$site=1;
};  
$start_from = ($site-1) * $limit;

if (isset($_GET["support"])) $support = trim(htmlentities($_GET["support"]));
elseif (isset($_POST["support"])) $support = trim(htmlentities($_POST["support"]));
else $support = "view";

site_header(SUPPORT_HEADER_LIST);
site_navi_logged();
site_content_logged();



echo"
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".SUPPORT_HEADER_LIST."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/support/index.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".SUPPORT_HEADER_LIST."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";

if ($support == "remoticket") {
	if(isset($_POST['sup_rem'])){
		$sql3 = "DELETE FROM xucp_support";
		$result3 = mysqli_query($conn, $sql3);
		if($result3)
		{
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERSUPPORT."</h4>
									</div>
									<div class='card-body'>
										".SUPPORTDELETEINFO."
									</div>
								</div>
							</div>
						</div>";
		} 
	}		           		
}						
echo"						
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".SUPPORT_HEADER_LIST."</h4>
										<p class='card-title-desc'>
											<form method='post' action='".$_SERVER['PHP_SELF']."?support=remoticket' enctype='multipart/form-data'>
												<div class='d-flex flex-wrap gap-3 align-items-center'>
													<button type='submit' name='sup_rem' class='btn btn-secondary btn-sm waves-effect waves-light'>".SUPPORTDELETE2."</submit>
												</div>
											</form>
										</p>
									</div>
									<div class='card-body'>
										<div class='table-responsive'>
											<table class='table'>
												<thead class='text-primary'>
													<th>
														".SUPPORTUSERID."
													</th>
													<th>
														".SUPPORTUSERNAME."
													</th>					  
													<th>
														".SUPPORTSUBJECT."
													</th>
													<th>
														".SUPPORTMSG."
													</th>				  
													<th>
														".SUPPORTDATE."
													</th>				  
												</thead>
												<tbody>";
					
											$sql = "SELECT id, username, msg, bug, posted FROM xucp_support ORDER BY id ASC LIMIT ".$start_from.", ".$limit."";
											$result = $conn->query($sql);

											if ($result->num_rows > 0) {
											// output data of each row
												while($support = $result->fetch_assoc()) {
													echo"					
													<tr>
														<td>
															".htmlentities($support['id'], ENT_QUOTES, 'UTF-8')."
														</td>
														<td>
															".htmlentities($support['username'], ENT_QUOTES, 'UTF-8')."
														</td>						
														<td>
															".htmlentities($support['bug'], ENT_QUOTES, 'UTF-8')."
														</td>
														<td>
															".format_comment($support['msg'])."
														</td>
														<td>
															".htmlentities($support['posted'], ENT_QUOTES, 'UTF-8')."
														</td>					
													</tr>";	  
												}
											}
										echo"									  
												</tbody>
											</table>";
										$result_db = mysqli_query($conn,"SELECT COUNT(id) FROM xucp_support"); 
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