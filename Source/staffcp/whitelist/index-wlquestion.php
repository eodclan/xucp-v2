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

site_header("Whitelist Fragen Übersicht");
site_navi_logged();
site_content_logged();

	$resultwlusers = $conn->query("SELECT * FROM xucp_config WHERE id=1");

	if ($resultwlusers->num_rows > 0) {
		// output data of each row
		while($dashboard = $resultwlusers->fetch_assoc()) {

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".WHITELIST_HEADER."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/whitelist/index-wlquestion.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".WHITELIST_HEADER."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <div class='row'>

              <div class='col-lg-12'>
                <div class='card'>
                  <div class='card-body'>				  
				<div class='form-group'>
					<div class='card-title'>".FRAGE1."</div>
					<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage1'], ENT_QUOTES, 'UTF-8')."</label>
				</div>
				<div class='form-group'>
					<div class='card-title'>".FRAGE2."</div>
					<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage2'], ENT_QUOTES, 'UTF-8')."</label>
				</div>
				<div class='form-group'>
					<div class='card-title'>".FRAGE3."</div>
					<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage3'], ENT_QUOTES, 'UTF-8')."</label>
				</div>
				<div class='form-group'>
					<div class='card-title'>".FRAGE4."</div>
					<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage4'], ENT_QUOTES, 'UTF-8')."</label>
				</div>
				<div class='form-group'>
					<div class='card-title'>".FRAGE5."</div>
					<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage5'], ENT_QUOTES, 'UTF-8')."</label>
				</div>
				<div class='form-group'>
					<div class='card-title'>".FRAGE6."</div>
					<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage6'], ENT_QUOTES, 'UTF-8')."</label>
				</div>
				<div class='form-group'>
					<div class='card-title'>".FRAGE7."</div>
					<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage7'], ENT_QUOTES, 'UTF-8')."</label>
				</div>
				<div class='form-group'>
					<div class='card-title'>".FRAGE8."</div>
					<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage8'], ENT_QUOTES, 'UTF-8')."</label>
				</div>
				<div class='form-group'>
					<div class='card-title'>".FRAGE9."</div>
					<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage9'], ENT_QUOTES, 'UTF-8')."</label>
				</div>
				<div class='form-group'>
					<div class='card-title'>".FRAGE10."</div>
					<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage10'], ENT_QUOTES, 'UTF-8')."</label>
				</div>
				<div class='form-group'>
					<div class='card-title'>".FRAGE11."</div>
					<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage11'], ENT_QUOTES, 'UTF-8')."</label>
				</div>
				<div class='form-group'>
					<div class='card-title'>".FRAGE12."</div>
					<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage12'], ENT_QUOTES, 'UTF-8')."</label>
				</div>";
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