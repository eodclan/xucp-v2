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
secure_url();

site_header_nologged(LOGIN);
site_navi_nologged();
site_content_nologged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".LOGIN."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/usercp/login/index.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".LOGIN."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";

if('POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['login'])){
	if(empty($_POST['username']) || empty($_POST['password'])){
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".LOGIN."</h4>
									</div>
									<div class='card-body'>
										".MSG_10."
									</div>
								</div>
							</div>
						</div>";
	}
	else
	{	
		session_regenerate_id();
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
		$password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);

		// The 2nd check to make sure that nothing bad can happen.
		if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".LOGIN."</h4>
									</div>
									<div class='card-body'>
										".MSG_14."
									</div>
								</div>
							</div>
						</div>";		
		}
		if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".LOGIN."</h4>
									</div>
									<div class='card-body'>
										".MSG_15."
									</div>
								</div>
							</div>
						</div>";			
		}
		// CSRF Token Validation
		if(isset($_POST['csrf_token'])){
			if($_POST['csrf_token'] === $_SESSION['xucp_secure']['csrf_token']){
			}else{
				echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".LOGIN."</h4>
									</div>
									<div class='card-body'>
										Problem with CSRF Token Validation
									</div>
								</div>
							</div>
						</div>";												
				unset($_SESSION['secure_granted']['granted']);					
				unset($_SESSION['xucp_secure']['csrf_token']);
				unset($_SESSION['xucp_secure']['csrf_token_time']);					
			}
		}
		// CSRF Token Time Validation
		$max_time = 60*60*32; // in seconds
		if(isset($_SESSION['xucp_secure']['csrf_token_time'])){
			$token_time = $_SESSION['xucp_secure']['csrf_token_time'];
			if(($token_time + $max_time) >= time() ){
			}else{
				echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".LOGIN."</h4>
									</div>
									<div class='card-body'>
										CSRF Token Expired
									</div>
								</div>
							</div>
						</div>";				
				unset($_SESSION['secure_granted']['granted']);					
				unset($_SESSION['xucp_secure']['csrf_token']);
				unset($_SESSION['xucp_secure']['csrf_token_time']);
			}
		}
		$sql = "select * from accounts where username = '".$username."' LIMIT 1";
		$rs = mysqli_query($conn,$sql);
		$numRows = mysqli_num_rows($rs);
	
		if($numRows  == 1){
			$account = mysqli_fetch_assoc($rs);
			if(password_verify($password,$account['password'])){
				$sqlsession = "SELECT id, site_dl_section, site_rage_section, site_altv_section, site_fivem_section, site_online, site_name, site_themes from xucp_config WHERE id = 1";
				$resultsession = $conn->query($sqlsession);

				if ($resultsession->num_rows > 0) {
					// output data of each row
					while($session = $resultsession->fetch_assoc()) {
						if ($session["site_online"] == "1") {
							$_SESSION['username'] = [
								'site_settings_site_online' => $session["site_online"],
								'site_settings_site_name' => $session["site_name"],
								'site_settings_dl_section' => $session["site_dl_section"],
								'site_settings_dl_section_ragemp' => $session["site_rage_section"],
								'site_settings_dl_section_altv' => $session["site_altv_section"],
								'site_settings_dl_section_fivem' => $session["site_fivem_section"],
								'site_settings_dl_section_redm' => $session["site_redm_section"],
								'site_settings_themes' => $session["site_themes"]
							];
						}
					}
				}
				$sqlfaction = "SELECT * FROM server_faction_members WHERE charId='".$account["id"]."'";
				$resultfaction = $conn->query($sqlfaction);

				if ($resultfaction->num_rows > 0) {
					// output data of each row
					while($faction = $resultfaction->fetch_assoc()) {
						$_SESSION['xucp_gserver'] = [
							'faction_number' => $faction["factionId"]
						];
					}
				}
				$_SESSION['username'] = [
					'secure_first' => $account["id"],
					'secure_granted' => "granted",
					'secure_staff' => $account["adminlevel"],
					'secure_lang' => $account["language"],
					'secure_key' => sitehash($username)
				];
				header("Location:/usercp/dashboard/index.php");
			}else{
				echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".LOGIN."</h4>
									</div>
									<div class='card-body'>
										".MSG_11."
									</div>
								</div>
							</div>
						</div>";				
			}
		}else{
				echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".LOGIN."</h4>
									</div>
									<div class='card-body'>
										".MSG_12."
									</div>
								</div>
							</div>
						</div>";			
		}
		$conn->close();
	}	
}



// 1. Create CSRF token
$token = md5(uniqid(rand(), TRUE));
$_SESSION['xucp_secure']['csrf_token'] = $token;
$_SESSION['xucp_secure']['csrf_token_time'] = time();
echo "
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".LOGIN."</h4>
                                    <p class='card-title-desc'>".NOTE."</p>
                                </div>
                                <div class='card-body'>
									<form class='mt-4 pt-2' action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data' autocomplete='off'>
										<div class='mb-3'>
											<label class='form-label'>".USERNAME." *</label>
											<input type='text' name='username' class='form-control' id='username' placeholder='".INFO1."'>
										</div>
										<div class='mb-3'>
											<div class='d-flex align-items-start'>
												<div class='flex-grow-1'>
													<label class='form-label'>".PASSWORD." *</label>
												</div>
											</div>
											<div class='input-group auth-pass-inputgroup'>
												<input type='password' name='password' class='form-control' placeholder='".INFO2."' aria-label='".PASSWORD."' aria-describedby='password-addon'>
											</div>
										</div>
										<div class='mb-3'>
											<button class='btn btn-primary w-100 waves-effect waves-light' type='submit' name='login' id='liveToastBtn'>".LOGIN."</button>
										</div>
									</form>
									<div class='mt-5 text-center'>
										<p class='text-muted mb-0'>".NOTE3." <a href='/usercp/register/index.php?myregister=register' class='text-primary fw-semibold'> ".REGISTER." </a> </p>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>";
site_footer();	  
?>