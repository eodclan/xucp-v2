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
// * Session Site Settings System
// ************************************************************************************//
$xucp_sql = "SELECT id, site_dl_section, site_rage_section, site_altv_section, site_fivem_section, site_redm_section, site_online, site_name, site_themes, site_teamspeak, site_gserverport, site_gserverip, site_gservername, site_upgrade_note from xucp_config WHERE id = 1";
$xucp_result = $conn->query($xucp_sql);

if ($xucp_result->num_rows > 0) {
	// output data of each row
	while($xucp = $xucp_result->fetch_assoc()) {

		$_SESSION['username']['site_settings_site_online'] = $xucp["site_online"];
		$_SESSION['username']['site_settings_site_name'] = $xucp["site_name"];
		$_SESSION['username']['site_settings_themes'] = $xucp["site_themes"];
		$_SESSION['username']['site_settings_dl_section'] = $xucp["site_dl_section"];		  
		$_SESSION['username']['site_settings_dl_section_ragemp'] = $xucp["site_rage_section"];
		$_SESSION['username']['site_settings_dl_section_altv'] = $xucp["site_altv_section"];
		$_SESSION['username']['site_settings_dl_section_fivem'] = $xucp["site_fivem_section"];
		$_SESSION['username']['site_settings_dl_section_redm'] = $xucp["site_redm_section"];
		$_SESSION['username']['site_settings_teamspeak'] = $xucp["site_teamspeak"];
		$_SESSION['username']['site_settings_gserverport'] = $xucp["site_gserverport"];
		$_SESSION['username']['site_settings_gserverip'] = $xucp["site_gserverip"];
		$_SESSION['username']['site_settings_gservername'] = $xucp["site_gservername"];
		$_SESSION['username']['site_settings_upgrade_note'] = $xucp["site_upgrade_note"];

		if(intval($_SESSION['username']['site_settings_site_online']) >= 1) {
			// Site Online Status = 1 | Online
		}else{
		// Site Online Status = 0 | Offline
			site_header_nologged("".SECURE_SYSTEM."");
			site_navi_nologged();
			site_content_nologged();
            	echo"
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".SECURE_SYSTEM."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/index.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
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
                                    <h4 class='card-title'>".SITECONFIG_ONLINENOTE."</h4>
                                    <p class='card-title-desc'>".WELCOMETO." ".SITECONFIG_ONLINENOTE."</p>
                                </div>
                                <div class='card-body'>
									".SITECONFIG_ONLINENOTE."
                                </div>
                            </div>
                        </div>
                    </div>";
			site_footer();
			setCookie("PHPSESSID", "", 0x7fffffff,  "/");
			session_destroy();	
			die();		
		}
	}
}
?>