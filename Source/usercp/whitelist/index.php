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

// error_reporting(E_ALL);
if (isset($_GET["mywhitelist"])) $mywhitelist = trim(htmlentities($_GET["mywhitelist"]));
elseif (isset($_POST["mywhitelist"])) $mywhitelist = trim(htmlentities($_POST["mywhitelist"]));
else $mywhitelist = "view";

if ($mywhitelist == "addwl") {
	if(isset($_POST['myaddwl'])){
		$ucpname    = filter_input(INPUT_POST, 'ucpname', FILTER_SANITIZE_STRING);
		$charname     = filter_input(INPUT_POST, 'charname', FILTER_SANITIZE_STRING);
		$charstory     = filter_input(INPUT_POST, 'charstory', FILTER_SANITIZE_STRING);
		$frage1     = filter_input(INPUT_POST, 'frage1', FILTER_SANITIZE_STRING);
		$frage2     = filter_input(INPUT_POST, 'frage2', FILTER_SANITIZE_STRING);
		$frage3     = filter_input(INPUT_POST, 'frage3', FILTER_SANITIZE_STRING);
		$frage4     = filter_input(INPUT_POST, 'frage4', FILTER_SANITIZE_STRING);
		$frage5     = filter_input(INPUT_POST, 'frage5', FILTER_SANITIZE_STRING);
		$frage6     = filter_input(INPUT_POST, 'frage6', FILTER_SANITIZE_STRING);
		$frage7     = filter_input(INPUT_POST, 'frage7', FILTER_SANITIZE_STRING);
		$frage8     = filter_input(INPUT_POST, 'frage8', FILTER_SANITIZE_STRING);
		$frage9     = filter_input(INPUT_POST, 'frage9', FILTER_SANITIZE_STRING);
		$frage10    = filter_input(INPUT_POST, 'frage10', FILTER_SANITIZE_STRING);
		$frage11    = filter_input(INPUT_POST, 'frage11', FILTER_SANITIZE_STRING);
		$frage12    = filter_input(INPUT_POST, 'frage12', FILTER_SANITIZE_STRING);

		$sql = "INSERT INTO xucp_whitelist SET ucpname='".$ucpname."', charname='".$charname."', charstory='".$charstory."', frage1='".$frage1."', frage2='".$frage2."', frage3='".$frage3."', frage4='".$frage4."', frage5='".$frage5."', frage6='".$frage6."', frage7='".$frage7."', frage8='".$frage8."', frage9='".$frage9."', frage10='".$frage10."', frage11='".$frage11."', frage12='".$frage12."'";
   
		if (mysqli_query($conn, $sql)) {
			header('location: index-done.php');
		} else {
			header('location: index-error.php');
		}
	}		
}

site_header("".MYWHITELIST_HEADER."");
site_navi_logged();
site_content_logged();

if ($mywhitelist == "addwl") {
	$resultwlusers = $conn->query("SELECT * FROM xucp_config WHERE id=1");

	if ($resultwlusers->num_rows > 0) {
		// output data of each row
		while($dashboard = $resultwlusers->fetch_assoc()) {

echo "
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
									<form class='forms-sample' name='form' method='post' action='".$_SERVER['PHP_SELF']."?mywhitelist=addwl'>
										<input type='hidden' name='new' value='1' />
											<div class='form-group'>
												<label class='col-sm-12 col-form-label'>".MYWHITELIST_USERNAME."</label>
												<div class='col-sm-12'>";
											$sqlx = "SELECT username FROM accounts WHERE id = ".$_SESSION['username']['secure_first']."";
											$resultx = $conn->query($sqlx);
											if ($resultx->num_rows > 0) {
												// output data of each row
												while($dash = $resultx->fetch_assoc()) {
													echo "	
													<input type='text' class='form-control' name='ucpname' value='".htmlentities($dash['username'], ENT_QUOTES, 'UTF-8')."'>";
												}
											}
										echo "
												</div>
										</div>	
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".MYWHITELIST_CHARNAME."</label>
											<div class='col-sm-12'>
												<input type='text' class='form-control' name='charname' required>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".MYWHITELIST_STORY."</label>
											<div class='col-sm-12'>
												<input type='text' class='form-control' name='charstory' required>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage1'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage1' name='frage1' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage2'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage2' name='frage2' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage3'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage3' name='frage3' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage4'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage4' name='frage4' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage5'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage5' name='frage5' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage6'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage6' name='frage6' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage7'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage7' name='frage7' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage8'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage8' name='frage8' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage9'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage9' name='frage9' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage10'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage10' name='frage10' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage11'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage11' name='frage11' class='form-control'rows='3' cols='100' required></textarea>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-12 col-form-label'>".htmlentities($dashboard['frage12'], ENT_QUOTES, 'UTF-8')."</label>
											<div class='col-sm-12'>
												<textarea id='frage12' name='frage12' class='form-control' rows='3' cols='100' required></textarea>
											</div>
										</div>			
										<center>
											<input name='myaddwl' type='submit' value='".FRAGE_SEND."' class='btn btn-dark mr-2' />
										</center>
									</form>";
					}
				}		
				echo "
                                </div>
                            </div>
                        </div>
                    </div>";	  
}	
site_footer();	
?>