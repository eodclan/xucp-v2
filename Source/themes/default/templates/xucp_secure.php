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
// * Prevent direct PHP call
// ************************************************************************************//
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {        
	header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
	setCookie("PHPSESSID", "", 0x7fffffff,  "/");
  	session_destroy();
	die( header( 'location: /404.php' ) );
}
function site_secure(): void
{
	if(!isset($_SESSION['username']['secure_first']) || $_SESSION['username']['secure_granted'] !== 'granted' || $_SESSION['username']['site_settings_site_online'] !== '1') {
		site_header_nologged(SECURE_SYSTEM);
		site_navi_nologged();
		site_content_nologged();
	echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".SECURE_SYSTEM."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/usercp/login/index.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".SECURE_SYSTEM."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".HOME_NOLOGGED."</h4>
                                    <p class='card-title-desc'>".WELCOMETO." ".SECURE_SYSTEM."</p>
                                </div>
                                <div class='card-body'>
									".MSG_1."
                                </div>
                            </div>
                        </div>
                    </div>";		
	site_footer();
	die();
	}  
}

function site_secure_staff_check(): void
{
	if(intval($_SESSION['username']['secure_staff']) < UC_CLASS_SUPPORTER) {
		site_header_nologged(SECURE_SYSTEM);
		site_navi_nologged();
		site_content_nologged();
	echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".SECURE_SYSTEM."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/usercp/login/index.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".SECURE_SYSTEM."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".HOME_NOLOGGED."</h4>
                                    <p class='card-title-desc'>".WELCOMETO." ".SECURE_SYSTEM."</p>
                                </div>
                                <div class='card-body'>
									".MSG_2."
                                </div>
                            </div>
                        </div>
                    </div>";
	site_footer();
	die();		
	}
}

function site_secure_staff_check_rank(): void
{
	if(intval($_SESSION['username']['secure_staff']) < UC_CLASS_PROJECT_MANAGEMENT) {
		site_header(SECURE_SYSTEM);
		site_navi_logged();
		site_content_logged();
	echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".SECURE_SYSTEM."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/usercp/login/index.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".SECURE_SYSTEM."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".HOME_NOLOGGED."</h4>
                                    <p class='card-title-desc'>".WELCOMETO." ".SECURE_SYSTEM."</p>
                                </div>
                                <div class='card-body'>
									".MSG_26."
                                </div>
                            </div>
                        </div>
                    </div>";
	site_footer();
	die();		
	}
}
?>