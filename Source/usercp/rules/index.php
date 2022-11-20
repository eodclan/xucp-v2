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

site_header(RULES);
site_navi_logged();
site_content_logged();
	
	echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".RULES."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/usercp/rules/index.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".RULES."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";
				$query = "select * from xucp_rules";
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
		$shortcontent = substr($content, 0, 100000)."";					
		echo "
					<div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".RULES."</h4>
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