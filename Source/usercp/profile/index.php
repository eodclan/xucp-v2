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

site_header("".USERPROFILECHANGE."");
site_navi_logged();
site_content_logged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".USERPROFILECHANGE."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/usercp/profile/index.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".USERPROFILECHANGE."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";

if (isset($_GET["profilechange"])) $profilechange = trim(htmlentities($_GET["profilechange"]));
elseif (isset($_POST["profilechange"])) $profilechange = trim(htmlentities($_POST["profilechange"]));
else $profilechange = "view";

if ($profilechange == "changemydata") {
	if(isset($_POST['submit'])){
		if(empty($_POST['usersig']) && empty($_POST['email']) && empty($_POST['language']) && empty($_POST['password'])){
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERPROFILECHANGE."</h4>
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
			$usersig = filter_input(INPUT_POST, 'usersig', FILTER_SANITIZE_STRING);
			$userava = filter_input(INPUT_POST, 'userava', FILTER_SANITIZE_STRING);
			$userhp = filter_input(INPUT_POST, 'userhp', FILTER_SANITIZE_STRING);
			$email 	= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
			$language 	= filter_input(INPUT_POST, 'language', FILTER_SANITIZE_STRING);			
			$password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
			$hashPassword = password_hash($password,PASSWORD_BCRYPT);			

			if (!is_image($userava))
			{
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERPROFILECHANGE."</h4>
									</div>
									<div class='card-body'>
										".AVATAR_CHECK_BACK."
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
										<h4 class='card-title'>".USERPROFILECHANGE."</h4>
									</div>
									<div class='card-body'>
										".AVATAR_CHECK_OKAY."
									</div>
								</div>
							</div>
						</div>";
			}
			
			// The 2nd check to make sure that nothing bad can happen.
			if (preg_match('/[A-Za-z0-9]+/', $_POST['usersig']) == 0) {
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERPROFILECHANGE."</h4>
									</div>
									<div class='card-body'>
										".MSG_14."
									</div>
								</div>
							</div>
						</div>";				
			}
			// The 2nd check to make sure that nothing bad can happen.
			if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERPROFILECHANGE."</h4>
									</div>
									<div class='card-body'>
										".MSG_15."
									</div>
								</div>
							</div>
						</div>";				
			}
			// The 2nd check to make sure that nothing bad can happen.
			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERPROFILECHANGE."</h4>
									</div>
									<div class='card-body'>
										".MSG_13."
									</div>
								</div>
							</div>
						</div>";				
			}			

			$sql = "UPDATE accounts SET usersig='".$usersig."', email='".$email."', language='".$language."', password='".$hashPassword."', userava='".$userava."', userhp='".$userhp."' WHERE id = '".$_SESSION['username']['secure_first']."'";
   
			if (mysqli_query($conn, $sql)) {
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".USERPROFILECHANGE."</h4>
									</div>
									<div class='card-body'>
										".MSG_8."
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
										<h4 class='card-title'>".USERPROFILECHANGE."</h4>
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
}
echo "
                        <div class='row'>
                            <div class='col-xl-9 col-lg-8'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <div class='row'>
                                            <div class='col-sm order-2 order-sm-1'>
                                                <div class='d-flex align-items-start mt-3 mt-sm-0'>
                                                    <div class='flex-shrink-0'>
                                                        <div class='avatar-xl me-3'>";
													$sql = "SELECT userava FROM accounts WHERE id = ".$_SESSION['username']['secure_first']."";
													$result = $conn->query($sql);

													if ($result->num_rows > 0) {
													// output data of each row
														while($account = $result->fetch_assoc()) {
															echo "
                                                            <img src='".htmlentities($account['userava'], ENT_QUOTES, 'UTF-8')."' alt='' class='img-fluid rounded-circle d-block'>";
														}	
													}		
													echo "
                                                        </div>
                                                    </div>
                                                    <div class='flex-grow-1'>
                                                        <div>";
													$sql = "SELECT username, usersig FROM accounts WHERE id = ".$_SESSION['username']['secure_first']."";
													$result = $conn->query($sql);
													if ($result->num_rows > 0) {
														// output data of each row
														while($account = $result->fetch_assoc()) {
															echo "
                                                            <h5 class='font-size-16 mb-1'>".htmlentities($account['username'], ENT_QUOTES, 'UTF-8')."</h5>
                                                            <p class='text-muted font-size-13'>".format_comment($account['usersig'])."</p>";
														}
													}
													echo "
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class='nav nav-tabs-custom card-header-tabs border-top mt-4' id='pills-tab' role='tablist'>
                                            <li class='nav-item'>
                                                <a class='nav-link px-3 active' data-bs-toggle='tab' href='#overview' role='tab'>".PROFILE_ABOUT."</a>
                                            </li>
                                            <li class='nav-item'>
                                                <a class='nav-link px-3' data-bs-toggle='tab' href='#about' role='tab'>".PROFILE_SETTINGS."</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class='tab-content'>
                                    <div class='tab-pane active' id='overview' role='tabpanel'>
                                        <div class='card'>
                                            <div class='card-header'>
                                                <h5 class='card-title mb-0'>".PROFILE_ABOUT."</h5>
                                            </div>
                                            <div class='card-body'>
                                                <div>
                                                    <div class='pb-3'>
                                                        <div class='row'>
                                                            <div class='col-xl-2'>
                                                                <div>
                                                                    <h5 class='font-size-15'>".SIGNATUR." :</h5>
                                                                </div>
                                                            </div>
                                                            <div class='col-xl'>
                                                                <div class='text-muted'>";
															$sql = "SELECT usersig FROM accounts WHERE id = ".$_SESSION['username']['secure_first']."";
															$result = $conn->query($sql);

															if ($result->num_rows > 0) {
															// output data of each row
																while($accounts = $result->fetch_assoc()) {
																	echo "
																	<p class='mb-2'>".format_comment($accounts['usersig'])."</p>";
																}
															}
															echo "
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='tab-pane' id='about' role='tabpanel'>
                                        <div class='card'>
                                            <div class='card-header'>
                                                <h5 class='card-title mb-0'>".PROFILE_SETTINGS."</h5>
                                            </div>
                                            <div class='card-body'>
                                                <div>
                                                    <div class='pb-3'>
                                                        <div class='text-muted'>";
														$sql = "SELECT email, password, usersig, userhp, language, userava FROM accounts WHERE id = ".$_SESSION['username']['secure_first']."";
														$result = $conn->query($sql);

														if ($result->num_rows > 0) {
														// output data of each row
															while($account = $result->fetch_assoc()) {					
															echo "
															<form class='card' action='".$_SERVER['PHP_SELF']."?profilechange=changemydata' method='post' enctype='multipart/form-data'>
																<div class='card-body'>
																	<div class='row gy-4'>
																		<div class='col-sm-6'>
																			<label class='form-label'>".EMAIL."</label>
																			<input class='form-control' type='text' name='email' placeholder='".EMAIL."' value='".htmlentities($account['email'], ENT_QUOTES, 'UTF-8')."' required>
																		</div>
																		<div class='col-sm-6'>
																			<label class='form-label'>".PASSWORD."</label>
																			<input class='form-control' type='password' name='password' placeholder='".PASSWORD."' required>
																		</div>
																		<div class='col-md-12'>
																			<label class='form-label'>".PROFILE_PORTFOLIO_WEBSITE."</label>
																			<input class='form-control' type='text' name='userhp' placeholder='".PROFILE_PORTFOLIO_WEBSITE."' value='".htmlentities($account['userhp'], ENT_QUOTES, 'UTF-8')."' required>
																		</div>																		
																		<div class='col-md-12'>
																			<label class='form-label'>".LANGUAGE."</label>
																			<div class='bootstrap-select form-control show-tick'>
																				<select name='language' class='form-control show-tick' required>
																					<option value=''>-- ".CHANGE_MYPROFILE_LANGUAGENOTE." --</option>
																					<option value='en'>".CHANGE_MYPROFILE_LANGUAGE_SELECT_EN."</option>
																					<option value='de'>".CHANGE_MYPROFILE_LANGUAGE_SELECT_DE."</option>
																				</select>
																			</div>
																		</div>
																		<div class='col-md-12'>
																			<label class='form-label'>".AVATAR."</label>
																			<input class='form-control' type='text' name='userava' placeholder='".AVATAR."' value='".htmlentities($account['userava'], ENT_QUOTES, 'UTF-8')."'>
																		</div>									
																		<div class='col-md-12'>
																			<label class='form-label'>".SIGNATUR."</label>";
																			textbbcode('usersig', htmlspecialchars(stripslashes($account['usersig'])));
																	echo "
																		</div>
																	</div>
																</div>
																<div class='card-footer text-end'>
																	<button class='btn btn-dark' type='submit' name='submit' id='liveToastBtn'>".MYPROFILESAVE."</button>
																</div>
															</form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
						}
					}
					echo "
                            <div class='col-xl-3 col-lg-4'>
                                <div class='card'>
                                    <div class='card-body'>
                                        <h5 class='card-title mb-3'>".PROFILE_PORTFOLIO."</h5>

                                        <div>
                                            <ul class='list-unstyled mb-0'>
                                                <li>";
											$sql = "SELECT userhp FROM accounts WHERE id = ".$_SESSION['username']['secure_first']."";
											$result = $conn->query($sql);

											if ($result->num_rows > 0) {
											// output data of each row
												while($account = $result->fetch_assoc()) {
													echo "												
                                                    <a href='".htmlentities($account['userhp'], ENT_QUOTES, 'UTF-8')."' class='py-2 d-block text-muted'><i class='mdi mdi-web text-primary me-1'></i> ".PROFILE_PORTFOLIO_WEBSITE."</a>";
												}
												mysqli_close($conn);
											}
											echo "
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>";		

site_footer();	
?>