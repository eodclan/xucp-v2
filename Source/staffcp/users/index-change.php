<?php 
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 2.0
// * 
// * Copyright (c) 2022 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
include(dirname(__FILE__) . "/../../include/features.php");
	
site_secure();
secure_url();
site_secure_staff_check();

if (isset($_GET["ucpchanger"])) $ucpchanger = trim(htmlentities($_GET["ucpchanger"]));
elseif (isset($_POST["ucpchanger"])) $ucpchanger = trim(htmlentities($_POST["ucpchanger"]));
else $ucpchanger = "view";

$limit = 10;  
if (isset($_GET["site"])) {
	$site  = $_GET["site"]; 
}else{ 
	$site=1;
};  
$start_from = ($site-1) * $limit;

site_header("".STAFF_USERCAHNEGED."");
site_navi_logged();
site_content_logged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".STAFF_USERCAHNEGED."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/users/index-change.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".STAFF_USERCAHNEGED."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";

$sql = "SELECT id, username, email, whitelisted from accounts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
	while($userchange = $result->fetch_assoc()) {
		if ($ucpchanger == "" . $userchange["id"]. "") {
			if(isset($_POST['submit'])){
				$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
				$email 	= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
				$whitelisted 	= filter_input(INPUT_POST, 'whitelisted', FILTER_SANITIZE_STRING);

				// The 2nd check to make sure that nothing bad can happen.    
				if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".STAFF_USERCAHNEGED."</h4>
									</div>
									<div class='card-body'>
										".MSG_14."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
				}
				if (preg_match('/[A-Za-z0-9]+/', $_POST['email']) == 0) {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".STAFF_USERCAHNEGED."</h4>
									</div>
									<div class='card-body'>
										".MSG_14."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
				}
				if (preg_match('/[A-Za-z0-9]+/', $_POST['whitelisted']) == 0) {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".STAFF_USERCAHNEGED."</h4>
									</div>
									<div class='card-body'>
										".MSG_14."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
				}
				if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".STAFF_USERCAHNEGED."</h4>
									</div>
									<div class='card-body'>
										".MSG_13."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
				}

				$sql = "UPDATE accounts SET username='".$username."', email='".$email."', whitelisted='".$whitelisted."' WHERE id = ".$userchange['id']."";
   
				if (mysqli_query($conn, $sql)) {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".STAFF_USERCAHNEGED."</h4>
									</div>
									<div class='card-body'>
										".FRAGEDONE."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
				} else {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".STAFF_USERCAHNEGED."</h4>
									</div>
									<div class='card-body'>
										".MSG_7."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
				}
			}            		
		}	  
    }
}
echo "
            <div class='row'>
              <div class='col-lg-12'>
                <div class='card'>
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
								<th>
									".STAFF_USERCONTROLOPTION."
								</th>					  
							</thead>
							<tbody>";

					$sql = "SELECT id, username, email, whitelisted from accounts ORDER BY id ASC LIMIT ".$start_from.", ".$limit."";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						// output data of each row
						while($userchange = $result->fetch_assoc()) {
						echo "
							<form method='post' action='".$_SERVER['PHP_SELF']."?ucpchanger=".$userchange['id']."' enctype='multipart/form-data'>
								<tr>
									<td>
										<p class='btn btn-*'>" . $userchange["id"]. "</p>
									</td>
									<td>			
										<input type='text' name='username' size='50' maxlength='60' class='form-control' value='" . $userchange["username"]. "' required>
									</td>						
									<td>						
										<input type='text' name='email' size='50' maxlength='60' class='form-control' value='" . $userchange["email"]. "' required>
									</td>
									<td>
										<select name='whitelisted' class='form-control show-tick' required>
												<option value=''>-- ".STAFF_USERCONTROL_WL_STATUS." --</option>
												<option value='1'>".SITECONFIG_CLIENT_YES."</option>
												<option value='0'>".SITECONFIG_CLIENT_NO."</option>											
										</select>
									</td>
									<td>
										<button type='submit' class='btn btn-dark' name='submit' data-target='successLiveToast'>".STAFF_USERCONTROLSAVE."</button></submit>&nbsp;
									</td>													
								</tr>						
							</form>";
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