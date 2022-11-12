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

site_header("".MYWHITELIST_HEADER."");
site_navi_logged();
site_content_logged();
echo"
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".MYWHITELIST_HEADER."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/usercp/whitelist/index.php?mywhitelist=addwl'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".MYWHITELIST_HEADER."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
					<div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".MYWHITELIST_HEADER."</h4>
                                    <p class='card-title-desc'>".MYWHITELIST_STATUS_5."<br>".MYWHITELIST_STATUS_6."</p>
                                </div>
                                <div class='card-body'>	
									".MYWHITELIST_STATUS_3."
                                </div>
                            </div>
                        </div>
                    </div>";
site_footer();	
?>