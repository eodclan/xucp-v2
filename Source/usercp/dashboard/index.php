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

site_header("".DASHBOARD."");
site_navi_logged();
site_content_logged();

$stmt = $conn->prepare("SELECT * from accounts WHERE id=".$_SESSION['username']['secure_first']."");
$stmt->execute();
$result2 =$stmt->get_result();
while ($row2 = $result2->fetch_assoc()) {
	$id = htmlentities($row2['username'], ENT_QUOTES, 'UTF-8');
}

$sqlwl = "SELECT * from accounts WHERE id ='".$_SESSION['username']['secure_first']."'";
$result = mysqli_query($conn, $sqlwl);
$rowwl = mysqli_fetch_assoc($result);
if (htmlentities($rowwl['whitelisted'], ENT_QUOTES, 'UTF-8') == 1) {			
echo "	
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".MYWHITELIST_STATUS."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/usercp/dashboard/index.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".DASHBOARD."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";
} else {
echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".MYWHITELIST_STATUS_2."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/usercp/dashboard/index.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".DASHBOARD."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";					
}					

if(intval($_SESSION['username']['secure_staff']) >= 5) {
echo "
                        <div class='row'>";

		$sqlsupport = "SELECT id FROM xucp_support ORDER by id DESC LIMIT 1";
		$resultsupport = $conn->query($sqlsupport);

		if ($resultsupport->num_rows > 0) {
			// output data of each row
			while($dashboard = $resultsupport->fetch_assoc()) {
			echo "
                            <div class='col-xl-6 col-md-12'>
                                <div class='card card-h-100'>
                                    <div class='card-body'>
                                        <div class='row align-items-center'>
                                            <div class='col-6'>
                                                <span class='text-muted mb-3 lh-1 d-block text-truncate'>".DASHBOARDSUPPORT."</span>
                                                <h4 class='mb-3'>
                                                    <span class='counter-value' data-target='".htmlentities($dashboard['id'], ENT_QUOTES, 'UTF-8')."'>".htmlentities($dashboard['id'], ENT_QUOTES, 'UTF-8')."</span> ".DASHBOARDSUPPORT."
                                                </h4>
                                            </div>
                                        </div>
										<div class='progress' style='height: 3px'>
											<div class='progress-bar bg-dash-color-1' role='progressbar' style='width: ".htmlentities($dashboard['id'], ENT_QUOTES, 'UTF-8')."%' aria-valuenow='".htmlentities($dashboard['id'], ENT_QUOTES, 'UTF-8')."' aria-valuemin='0' aria-valuemax='1000'></div>
										</div>										
                                    </div>
                                </div>
                            </div>";
			}
		}					
		$sqlusers = "SELECT id FROM accounts ORDER by id DESC LIMIT 1";
		$resultusers = $conn->query($sqlusers);

		if ($resultusers->num_rows > 0) {
			// output data of each row
			while($dashboard = $resultusers->fetch_assoc()) {
			echo "
                            <div class='col-xl-6 col-md-12'>
                                <div class='card card-h-100'>
                                    <div class='card-body'>
                                        <div class='row align-items-center'>
                                            <div class='col-6'>
                                                <span class='text-muted mb-3 lh-1 d-block text-truncate'>".DASHBOARDUSERS."</span>
                                                <h4 class='mb-3'>
                                                    <span class='counter-value' data-target='".htmlentities($dashboard['id'], ENT_QUOTES, 'UTF-8')."'>".htmlentities($dashboard['id'], ENT_QUOTES, 'UTF-8')."</span> ".DASHBOARDUSERS."
                                                </h4>
                                            </div>
                                        </div>
										<div class='progress' style='height: 3px'>
											<div class='progress-bar bg-dash-color-1' role='progressbar' style='width: ".htmlentities($dashboard['id'], ENT_QUOTES, 'UTF-8')."%' aria-valuenow='".htmlentities($dashboard['id'], ENT_QUOTES, 'UTF-8')."' aria-valuemin='0' aria-valuemax='10000'></div>
										</div>
                                    </div>
                                </div>
                            </div>";
			}
		}					
echo "							
                        </div>";

}

	$query = "select * from xucp_news";
	$result = mysqli_query($conn,$query);

	while($dashboard = mysqli_fetch_array($result)){
		$title_field = "title";
		$content_field = "content";
		if(isset($_SESSION['username']['secure_lang']) && $_SESSION['username']['secure_lang'] == 'de'){
			$title_field = "title_de";
			$content_field = "content_de";
		}
		$id = $dashboard['id'];
		$title = $dashboard[$title_field];
		$content = $dashboard[$content_field];
		$shortcontent = substr($content, 0, 600)."";					
		echo "
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".NEWS."</h4>
                                    <p class='card-title-desc'>".$title."</p>
                                </div>
                                <div class='card-body'>
									".format_comment($shortcontent)."
                                </div>
                            </div>
                        </div>
                    </div>";
	}
site_footer();	
?>