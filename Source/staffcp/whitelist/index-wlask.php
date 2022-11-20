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
site_secure_staff_check_rank();

site_header(FRAGE_HEADER);
site_navi_logged();
site_content_logged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".FRAGE_HEADER."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/whitelist/index-wlask.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".FRAGE_HEADER."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";

if(isset($_POST['wlask_sup'])){
    if(empty($_POST['frage1']) || empty($_POST['frage2']) || empty($_POST['frage3']) || empty($_POST['frage4']) || empty($_POST['frage5']) || empty($_POST['frage6']) || empty($_POST['frage7']) || empty($_POST['frage8']) || empty($_POST['frage9']) || empty($_POST['frage10']) || empty($_POST['frage11']) || empty($_POST['frage12'])){
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".FRAGE_HEADER."</h4>
									</div>
									<div class='card-body'>
										".MSG_10."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
    }
    else
    {
        $frage1 	= filter_input(INPUT_POST, 'frage1', FILTER_SANITIZE_SPECIAL_CHARS);
        $frage2 	= filter_input(INPUT_POST, 'frage2', FILTER_SANITIZE_SPECIAL_CHARS);
        $frage3 	= filter_input(INPUT_POST, 'frage3', FILTER_SANITIZE_SPECIAL_CHARS);
        $frage4 	= filter_input(INPUT_POST, 'frage4', FILTER_SANITIZE_SPECIAL_CHARS);
        $frage5 	= filter_input(INPUT_POST, 'frage5', FILTER_SANITIZE_SPECIAL_CHARS);
        $frage6 	= filter_input(INPUT_POST, 'frage6', FILTER_SANITIZE_SPECIAL_CHARS);
        $frage7 	= filter_input(INPUT_POST, 'frage7', FILTER_SANITIZE_SPECIAL_CHARS);
        $frage8 	= filter_input(INPUT_POST, 'frage8', FILTER_SANITIZE_SPECIAL_CHARS);
        $frage9 	= filter_input(INPUT_POST, 'frage9', FILTER_SANITIZE_SPECIAL_CHARS);
        $frage10 	= filter_input(INPUT_POST, 'frage10', FILTER_SANITIZE_SPECIAL_CHARS);
        $frage11 	= filter_input(INPUT_POST, 'frage11', FILTER_SANITIZE_SPECIAL_CHARS);
        $frage12 	= filter_input(INPUT_POST, 'frage12', FILTER_SANITIZE_SPECIAL_CHARS);
		
		// The 2nd check to make sure that nothing bad can happen.
        if (preg_match('/[A-Za-z0-9]+/', $_POST['frage1']) == 0) {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".FRAGE_HEADER."</h4>
									</div>
									<div class='card-body'>
										".MSG_19."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
        }
        if (preg_match('/[A-Za-z0-9]+/', $_POST['frage2']) == 0) {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".FRAGE_HEADER."</h4>
									</div>
									<div class='card-body'>
										".MSG_19."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
        }
        if (preg_match('/[A-Za-z0-9]+/', $_POST['frage3']) == 0) {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".FRAGE_HEADER."</h4>
									</div>
									<div class='card-body'>
										".MSG_19."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
        }
        if (preg_match('/[A-Za-z0-9]+/', $_POST['frage4']) == 0) {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".FRAGE_HEADER."</h4>
									</div>
									<div class='card-body'>
										".MSG_19."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
        }
        if (preg_match('/[A-Za-z0-9]+/', $_POST['frage5']) == 0) {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".FRAGE_HEADER."</h4>
									</div>
									<div class='card-body'>
										".MSG_19."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
        }
        if (preg_match('/[A-Za-z0-9]+/', $_POST['frage6']) == 0) {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".FRAGE_HEADER."</h4>
									</div>
									<div class='card-body'>
										".MSG_19."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
        }
        if (preg_match('/[A-Za-z0-9]+/', $_POST['frage7']) == 0) {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".FRAGE_HEADER."</h4>
									</div>
									<div class='card-body'>
										".MSG_19."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
        }
        if (preg_match('/[A-Za-z0-9]+/', $_POST['frage8']) == 0) {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".FRAGE_HEADER."</h4>
									</div>
									<div class='card-body'>
										".MSG_19."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
        }
        if (preg_match('/[A-Za-z0-9]+/', $_POST['frage9']) == 0) {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".FRAGE_HEADER."</h4>
									</div>
									<div class='card-body'>
										".MSG_19."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
        }
        if (preg_match('/[A-Za-z0-9]+/', $_POST['frage10']) == 0) {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".FRAGE_HEADER."</h4>
									</div>
									<div class='card-body'>
										".MSG_19."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
        }
        if (preg_match('/[A-Za-z0-9]+/', $_POST['frage11']) == 0) {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".FRAGE_HEADER."</h4>
									</div>
									<div class='card-body'>
										".MSG_19."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
        }
        if (preg_match('/[A-Za-z0-9]+/', $_POST['frage12']) == 0) {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".FRAGE_HEADER."</h4>
									</div>
									<div class='card-body'>
										".MSG_19."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
        }		
        
        $sql = "UPDATE xucp_config SET frage1='".$frage1."', frage2='".$frage2."', frage3='".$frage3."', frage4='".$frage4."', frage5='".$frage5."', frage6='".$frage6."', frage7='".$frage7."', frage8='".$frage8."', frage9='".$frage9."', frage10='".$frage10."', frage11='".$frage11."', frage12='".$frage12."' WHERE id = '1'";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
					echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".FRAGE_HEADER."</h4>
									</div>
									<div class='card-body'>
										".FRAGEDONE."
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
echo "
                    <div class='row'>
                        <div class='col-xl-12'>
                            <div class='card'>
                                <div class='card-header'>
                                    <h4 class='card-title'>".FRAGE_HEADER."</h4>
                                    <p class='card-title-desc'>".FRAGENOTE."</p>
                                </div>
                                <div class='card-body'>";
				$sql = "SELECT frage1, frage2, frage3, frage4, frage5, frage6, frage7, frage8, frage9, frage10, frage11, frage12 FROM xucp_config WHERE id = 1";
				$resultx = $conn->query($sql);

				if ($resultx->num_rows > 0) {
					// output data of each row
					while($faq = $resultx->fetch_assoc()) {
					echo"
				<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE1."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='frage1' size='50' maxlength='256' class='form-control' value='".$faq["frage1"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE2."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='frage2' size='50' maxlength='256' class='form-control' value='".$faq["frage2"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE3."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='frage3' size='50' maxlength='256' class='form-control' value='".$faq["frage3"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE4."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='frage4' size='50' maxlength='256' class='form-control' value='".$faq["frage4"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE5."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='frage5' size='50' maxlength='256' class='form-control' value='".$faq["frage5"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE6."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='frage6' size='50' maxlength='256' class='form-control' value='".$faq["frage6"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE7."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='frage7' size='50' maxlength='256' class='form-control' value='".$faq["frage7"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE8."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='frage8' size='50' maxlength='256' class='form-control' value='".$faq["frage8"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE9."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='frage9' size='50' maxlength='256' class='form-control' value='".$faq["frage9"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE10."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='frage10' size='50' maxlength='256' class='form-control' value='".$faq["frage10"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE11."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='frage11' size='50' maxlength='256' class='form-control' value='".$faq["frage11"]."' required>
							</div>	
						</div>
					</div>
					<div class='form-group'>
						<label class='col-sm-3 col-form-label'>
							".FRAGE12."
						</label>
						<div class='col-sm-12'>
							<div class='input-group'>
								<input type='text' name='frage12' size='50' maxlength='256' class='form-control' value='".$faq["frage12"]."' required>
							</div>	
						</div>
					</div>					  						
					<button type='submit' name='wlask_sup' class='btn btn-primary btn-round' id='liveToastBtn'>
						".FRAGEDONEBTN."
					</button>
					</submit>						
				</form>";

				}
				mysqli_close($conn);
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