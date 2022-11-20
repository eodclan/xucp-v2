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

if (isset($_GET["myregister"])) $myregister = trim(htmlentities($_GET["myregister"]));
elseif (isset($_POST["myregister"])) $myregister = trim(htmlentities($_POST["myregister"]));
else $myregister = "view";

site_header_nologged(REGISTER);
site_navi_nologged();
site_content_nologged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".REGISTER."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/usercp/register/index.php?myregister=register'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".REGISTER."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";

if ($myregister == "register") {
	if(isset($_POST['now_register'])){
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
		$email 	= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		$password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
		$hashPassword = password_hash($password,PASSWORD_BCRYPT);
		$socialid = (int)0;

		// The 2nd check to make sure that nothing bad can happen.
		if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".REGISTER."</h4>
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
										<h4 class='card-title'>".REGISTER."</h4>
									</div>
									<div class='card-body'>
										".MSG_15."
									</div>
								</div>
							</div>
						</div>";
		}
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".REGISTER."</h4>
									</div>
									<div class='card-body'>
										".MSG_13."
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
										<h4 class='card-title'>".REGISTER."</h4>
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
										<h4 class='card-title'>".REGISTER."</h4>
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

		// CHECK IF USER IS ALREADY REGISTERED
		$check_user = mysqli_query($conn, "SELECT `username` FROM `accounts` WHERE username = '$username' LIMIT 1");

		if(mysqli_num_rows($check_user) > 0){
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".REGISTER."</h4>
									</div>
									<div class='card-body'>
										".MSG_16."
									</div>
								</div>
							</div>
						</div>";						
		}else{
			$sql = "INSERT INTO accounts (username, email, password, socialid) VALUES ('$username', '$email', '$hashPassword', '$socialid')";
   
			if ($conn->query($sql) === TRUE) {
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".REGISTER."</h4>
									</div>
									<div class='card-body'>
										".MSG_9."
									</div>
								</div>
							</div>
						</div>";				
			} else {
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".REGISTER."</h4>
									</div>
									<div class='card-body'>
										".MSG_7."
									</div>
								</div>
							</div>
						</div>";					
			}
		}	
	}

	$conn->close();   	
}
if ($myregister == "register") {
// Create CSRF token
$token = md5(uniqid(rand(), TRUE));
$_SESSION['xucp_secure']['csrf_token'] = $token;
$_SESSION['xucp_secure']['csrf_token_time'] = time();	
echo "
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".REGISTER."</h4>
                                    <p class='card-title-desc'>".NOTE."</p>
                                </div>
                                <div class='card-body'>
                                        <form class='needs-validation mt-4 pt-2' novalidate action='".$_SERVER['PHP_SELF']."?myregister=register' method='post' enctype='multipart/form-data' autocomplete='off'>
                                            <div class='mb-3'>
                                                <label for='useremail' class='form-label'>".EMAIL." *</label>
                                                <input type='email' name='email' class='form-control' id='useremail' placeholder='Enter email' required>  
                                                <div class='invalid-feedback'>
                                                    Please Enter Email
                                                </div>      
                                            </div>
                    
                                            <div class='mb-3'>
                                                <label for='username' class='form-label'>".USERNAME." *</label>
                                                <input  type='text' name='username' class='form-control' id='username' placeholder='".INFO1."' required>
                                                <div class='invalid-feedback'>
                                                    ".INFO1."
                                                </div>  
                                            </div>
                    
                                            <div class='mb-3'>
                                                <label for='userpassword' class='form-label'>Password</label>
                                                <input type='password' name='password' class='form-control' id='userpassword' placeholder='".INFO2."' required>
                                                <div class='invalid-feedback'>
                                                    ".INFO2."
                                                </div>       
                                            </div>
                                            <div class='mb-3'>
                                                <button class='btn btn-primary w-100 waves-effect waves-light' type='submit' name='now_register' id='liveToastBtn'>".REGISTER."</button>
                                            </div>
                                        </form>
									<div class='mt-5 text-center'>
										<p class='text-muted mb-0'>".NOTE4." <a href='/usercp/login/index.php' class='text-primary fw-semibold'> ".LOGIN." </a> </p>
									</div>					
                                </div>
                            </div>
                        </div>
                    </div>";
}		
site_footer();	 	
?>