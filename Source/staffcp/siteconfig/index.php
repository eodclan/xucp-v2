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

site_secure_staff_check_rank();

if (isset($_GET["siteconfig"])) $siteconfig = trim(htmlentities($_GET["siteconfig"]));
elseif (isset($_POST["siteconfig"])) $siteconfig = trim(htmlentities($_POST["siteconfig"]));
else $siteconfig = "view";

$limit = 10;  
if (isset($_GET["site"])) {
	$site  = $_GET["site"]; 
}else{ 
	$site=1;
};  
$start_from = ($site-1) * $limit;

site_header("".SITECONFIG_HEADER."");
site_navi_logged();
site_content_logged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".SITECONFIG_HEADER."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/siteconfig/index.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".SITECONFIG_HEADER."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";

$sql = "SELECT id, site_dl_section, site_rage_section, site_altv_section, site_fivem_section, site_redm_section, site_online, site_name, site_teamspeak, site_gservername, site_gserverip, site_gserverport, site_themes, site_upgrade_note from xucp_config";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($siteconfigchange = $result->fetch_assoc()) {
    if ($siteconfig == "" . $siteconfigchange["id"]. "") {
      if(isset($_POST['submit'])){
		  $site_online 			= filter_input(INPUT_POST, 'site_online', FILTER_SANITIZE_STRING);
		  $site_name 			= filter_input(INPUT_POST, 'site_name', FILTER_SANITIZE_STRING);
          $site_dl_section 		= filter_input(INPUT_POST, 'site_dl_section', FILTER_SANITIZE_STRING);
          $site_rage_section 	= filter_input(INPUT_POST, 'site_rage_section', FILTER_SANITIZE_STRING);
          $site_altv_section 	= filter_input(INPUT_POST, 'site_altv_section', FILTER_SANITIZE_STRING);
          $site_fivem_section 	= filter_input(INPUT_POST, 'site_fivem_section', FILTER_SANITIZE_STRING);
          $site_redm_section 	= filter_input(INPUT_POST, 'site_redm_section', FILTER_SANITIZE_STRING);		  
		  $site_teamspeak 		= filter_input(INPUT_POST, 'site_teamspeak', FILTER_SANITIZE_STRING);
		  $site_gservername 	= filter_input(INPUT_POST, 'site_gservername', FILTER_SANITIZE_STRING);
		  $site_gserverip 		= filter_input(INPUT_POST, 'site_gserverip', FILTER_SANITIZE_STRING);
		  $site_gserverport 	= filter_input(INPUT_POST, 'site_gserverport', FILTER_SANITIZE_STRING);		  
		  $site_themes 			= filter_input(INPUT_POST, 'site_themes', FILTER_SANITIZE_STRING);	
		  $site_upgrade_note 	= filter_input(INPUT_POST, 'site_upgrade_note', FILTER_SANITIZE_STRING);
		  
		  $sql = "UPDATE xucp_config SET site_dl_section='".$site_dl_section."', site_rage_section='".$site_rage_section."', site_altv_section='".$site_altv_section."', site_fivem_section='".$site_fivem_section."', site_redm_section='".$site_redm_section."', site_online='".$site_online."', site_name='".$site_name."', site_teamspeak='".$site_teamspeak."', site_gservername='".$site_gservername."', site_gserverip='".$site_gserverip."', site_gserverport='".$site_gserverport."', site_themes='".$site_themes."', site_upgrade_note='".$site_upgrade_note."' WHERE id = ".$siteconfigchange['id']."";
		  $_SESSION['username']['site_settings_site_online'] = $site_online;
		  $_SESSION['username']['site_settings_site_name'] = $site_name;
		  $_SESSION['username']['site_settings_dl_section'] = $site_dl_section;		  
		  $_SESSION['username']['site_settings_dl_section_ragemp'] = $site_rage_section;
		  $_SESSION['username']['site_settings_dl_section_altv'] = $site_altv_section;
		  $_SESSION['username']['site_settings_dl_section_fivem'] = $site_fivem_section;
		  $_SESSION['username']['site_settings_dl_section_redm'] = $site_redm_section;		  
		  $_SESSION['username']['site_settings_teamspeak'] = $site_teamspeak;
		  $_SESSION['username']['site_settings_gservername'] = $site_gservername;
		  $_SESSION['username']['site_settings_gserverip'] = $site_gserverip;
		  $_SESSION['username']['site_settings_gserverport'] = $site_gserverport;
		  $_SESSION['username']['site_settings_themes'] = $site_themes;
		  $_SESSION['username']['site_settings_upgrade_note'] = $site_upgrade_note;
		  
          if (mysqli_query($conn, $sql)) {
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".SITECONFIG_HEADER."</h4>
									</div>
									<div class='card-body'>
										".SITECONFIG_DONE."
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
										<h4 class='card-title'>".SITECONFIG_HEADER."</h4>
									</div>
									<div class='card-body'>
										".SITECONFIG_ERROR."
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
								<div class='card-body'>";

				$sql = "SELECT id, site_dl_section, site_rage_section, site_altv_section, site_fivem_section, site_redm_section, site_online, site_name, site_teamspeak, site_gservername, site_gserverip, site_gserverport, site_upgrade_note from xucp_config ORDER by id DESC LIMIT 1";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($siteconfigchange = $result->fetch_assoc()) {
					echo "
						<form class='form-horizontal' method='post' action='".$_SERVER['PHP_SELF']."?siteconfig=".$siteconfigchange['id']."' enctype='multipart/form-data'>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='email_address_2'>".SITECONFIG_ONLINE."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<select name='site_online' class='form-control show-tick' required>
												<option value=''>-- ".SITECONFIG_ONLINE_INFO." --</option>
												<option value='1'>".SITECONFIG_ONLINE_ONLINE."</option>
												<option value='0'>".SITECONFIG_ONLINE_OFFLINE."</option>											
											</select>
										</div>									
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='email_address_2'>".SITECONFIG_THEMES."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<select name='site_themes' class='form-control show-tick' required>
												<option value=''>-- ".SITECONFIG_THEMES_INFO." --</option>
												<option value='dark'>".SITECONFIG_THEMES_BLACK."</option>
												<option value='light'>".SITECONFIG_THEMES_BLUE."</option>											
											</select>
										</div>
									</div>
								</div>
							</div>							
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_NAME."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='site_name' size='12' maxlength='12' class='form-control' placeholder='".SITECONFIG_NAME."' value='" . $siteconfigchange["site_name"]. "' required>
										</div>
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_TEAMSPEAK."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='site_teamspeak' size='12' maxlength='64' class='form-control' placeholder='".SITECONFIG_TEAMSPEAK."' value='" . $siteconfigchange["site_teamspeak"]. "' required>
										</div>
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_DOWNLOAD_SECTION."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='site_dl_section' size='12' maxlength='12' class='form-control' placeholder='".SITECONFIG_DOWNLOAD_SECTION."' value='" . $siteconfigchange["site_dl_section"]. "' required>
										</div>
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_GSERVERNAME."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='site_gservername' size='12' maxlength='64' class='form-control' placeholder='".SITECONFIG_GSERVERNAME."' value='" . $siteconfigchange["site_gservername"]. "' required>
										</div>
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_GSERVERIP."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='site_gserverip' size='12' maxlength='64' class='form-control' placeholder='".SITECONFIG_GSERVERIP."' value='" . $siteconfigchange["site_gserverip"]. "' required>
										</div>
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_GSERVERPORT."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<input type='text' name='site_gserverport' size='12' maxlength='64' class='form-control' placeholder='".SITECONFIG_GSERVERPORT."' value='" . $siteconfigchange["site_gserverport"]. "' required>
										</div>
									</div>
								</div>
							</div>								
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_RAGEMP."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<select name='site_rage_section' class='form-control show-tick' required>
												<option value=''>-- ".SITECONFIG_CLIENT_INFO." --</option>
												<option value='1'>".SITECONFIG_CLIENT_YES."</option>
												<option value='0'>".SITECONFIG_CLIENT_NO."</option>											
											</select>
										</div>									
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_ALTV."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<select name='site_altv_section' class='form-control show-tick' required>
												<option value=''>-- ".SITECONFIG_CLIENT_INFO." --</option>
												<option value='1'>".SITECONFIG_CLIENT_YES."</option>
												<option value='0'>".SITECONFIG_CLIENT_NO."</option>											
											</select>
										</div>									
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_FIVEM."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<select name='site_fivem_section' class='form-control show-tick' required>
												<option value=''>-- ".SITECONFIG_CLIENT_INFO." --</option>
												<option value='1'>".SITECONFIG_CLIENT_YES."</option>
												<option value='0'>".SITECONFIG_CLIENT_NO."</option>											
											</select>
										</div>									
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='password_2'>".SITECONFIG_REDM."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<select name='site_redm_section' class='form-control show-tick' required>
												<option value=''>-- ".SITECONFIG_CLIENT_INFO." --</option>
												<option value='1'>".SITECONFIG_CLIENT_YES."</option>
												<option value='0'>".SITECONFIG_CLIENT_NO."</option>											
											</select>
										</div>									
									</div>
								</div>
							</div>
							<div class='row clearfix'>
								<div class='col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label'>
									<label for='email_address_2'>".SITECONFIG_UPGRADE_NOTE."</label>
								</div>
								<div class='col-lg-10 col-md-10 col-sm-8 col-xs-7'>
									<div class='form-group'>
										<div class='form-line'>
											<select name='site_upgrade_note' class='form-control show-tick' required>
												<option value=''>-- ".SITECONFIG_UPGRADE_NOTE_INFO." --</option>
												<option value='1'>".SITECONFIG_CLIENT_YES."</option>
												<option value='0'>".SITECONFIG_CLIENT_NO."</option>												
											</select>
										</div>
									</div>
								</div>
							</div>							
							<div class='row clearfix'>
								<div class='col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5'>
									<button type='submit' class='btn btn-primary m-t-15 waves-effect' name='submit' id='liveToastBtn'>".STAFF_USERCONTROLSAVE."</button>
								</div>
							</div>
						</form>";
					}
				}					

		echo "		  			
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