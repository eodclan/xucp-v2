﻿<?php 
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

site_header(KEY_HEADER_2);
site_navi_logged();
site_content_logged();

	$resultwlusers = $conn->query("SELECT * FROM xucp_keys WHERE id=1");

	if ($resultwlusers->num_rows > 0) {
		// output data of each row
		while($dashboard = $resultwlusers->fetch_assoc()) {

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".KEY_HEADER_2."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/usercp/keyboard/index.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".KEY_HEADER_2."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <div class='row'>
              <div class='col-lg-12'>
                <div class='card'>
                  <div class='card-body'>
					".KEY_HEADER_2."
				  </div>
                  <div class='card-body'>
						<div class='table-responsive'>
							<table class='table'>
								<thead class=' text-primary'>
									<th>
										Beschreibung
									</th>
									<th>
										Hotkey
									</th>					  
								</thead>
								<tbody>
									<tr>
										<td>
											".KEY1."
										</td>
										<td>
											".htmlentities($dashboard['key1'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>
									<tr>
										<td>
											".KEY2."
										</td>
										<td>
											".htmlentities($dashboard['key2'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>

									<tr>
										<td>
											".KEY3."
										</td>
										<td>
											".htmlentities($dashboard['key3'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>
									<tr>
										<td>
											".KEY4."
										</td>
										<td>
											".htmlentities($dashboard['key4'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>
									<tr>
										<td>
											".KEY5."
										</td>
										<td>
											".htmlentities($dashboard['key5'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>
									<tr>
										<td>
											".KEY6."
										</td>
										<td>
											".htmlentities($dashboard['key6'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>
									<tr>
										<td>
											".KEY7."
										</td>
										<td>
											".htmlentities($dashboard['key7'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>
									<tr>
										<td>
											".KEY8."
										</td>
										<td>
											".htmlentities($dashboard['key8'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>
									<tr>
										<td>
											".KEY9."
										</td>
										<td>
											".htmlentities($dashboard['key9'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>
									<tr>
										<td>
											".KEY10."
										</td>
										<td>
											".htmlentities($dashboard['key10'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>
									<tr>
										<td>
											".KEY11."
										</td>
										<td>
											".htmlentities($dashboard['key11'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>
									<tr>
										<td>
											".KEY12."
										</td>
										<td>
											".htmlentities($dashboard['key12'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>
									<tr>
										<td>
											".KEY13."
										</td>
										<td>
											".htmlentities($dashboard['key13'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>
									<tr>
										<td>
											".KEY14."
										</td>
										<td>
											".htmlentities($dashboard['key14'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>
									<tr>
										<td>
											".KEY15."
										</td>
										<td>
											".htmlentities($dashboard['key15'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>
									<tr>
										<td>
											".KEY16."
										</td>
										<td>
											".htmlentities($dashboard['key16'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>
									<tr>
										<td>
											".KEY17."
										</td>
										<td>
											".htmlentities($dashboard['key17'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>
									<tr>
										<td>
											".KEY18."
										</td>
										<td>
											".htmlentities($dashboard['key18'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>
									<tr>
										<td>
											".KEY19."
										</td>
										<td>
											".htmlentities($dashboard['key19'], ENT_QUOTES, 'UTF-8')."
										</td>						
									</tr>									
								</tbody>
							</table>
						</div>";
		}
	}		
echo "
			</div>
		  </div>
		</section>";	  	
site_footer();	
?>