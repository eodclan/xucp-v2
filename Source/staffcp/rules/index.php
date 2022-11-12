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
site_secure_staff_check_rank();

site_header("".STAFF_RULESACP."");
site_navi_logged();
site_content_logged();

echo "
                        <div class='row'>
                            <div class='col-12'>
                                <div class='page-title-box d-sm-flex align-items-center justify-content-between'>
                                    <h4 class='mb-sm-0 font-size-18'>".STAFF_RULESACP."</h4>

                                    <div class='page-title-right'>
                                        <ol class='breadcrumb m-0'>
                                            <li class='breadcrumb-item'><a href='/staffcp/rules/index.php'>".$_SESSION['username']['site_settings_site_name']."</a></li>
                                            <li class='breadcrumb-item active'>".STAFF_RULESACP."</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>";

if(isset($_POST['rules_sup'])){
    if(empty($_POST['title']) || empty($_POST['title_de']) || empty($_POST['content']) || empty($_POST['content_de'])){
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".STAFF_RULESACP."</h4>
									</div>
									<div class='card-body'>
										".MSG_22."
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
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
        $title_de 	= filter_input(INPUT_POST, 'title_de', FILTER_SANITIZE_STRING);
        $content 	= filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
        $content_de 	= filter_input(INPUT_POST, 'content_de', FILTER_SANITIZE_STRING);

		// The 2nd check to make sure that nothing bad can happen.		
        if (preg_match('/[A-Za-z0-9]+/', $_POST['title']) == 0) {
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".STAFF_RULESACP."</h4>
									</div>
									<div class='card-body'>
										".MSG_23."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";			
        }
        if (preg_match('/[A-Za-z0-9]+/', $_POST['title_de']) == 0) {
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".STAFF_RULESACP."</h4>
									</div>
									<div class='card-body'>
										".MSG_23."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
        }
        if (preg_match('/[A-Za-z0-9]+/', $_POST['content']) == 0) {
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".STAFF_RULESACP."</h4>
									</div>
									<div class='card-body'>
										".MSG_23."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";			
        }
        if (preg_match('/[A-Za-z0-9]+/', $_POST['content_de']) == 0) {
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".STAFF_RULESACP."</h4>
									</div>
									<div class='card-body'>
										".MSG_23."
									</div>
									<!-- end card body -->
								</div>
								<!-- end card -->
							</div>
							<!-- end col -->
						</div>
						<!-- end row -->";
        }
        
        $sql = "UPDATE xucp_rules SET title='".$title."', title_de='".$title_de."', content='".$content."', content_de='".$content_de."' WHERE id = '1'";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
			echo"
                        <div class='row'>
							<div class='col-xl-12'>
								<div class='card'>
									<div class='card-header'>
										<h4 class='card-title'>".STAFF_RULESACP."</h4>
									</div>
									<div class='card-body'>
										".MSG_22."
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
              <div class='col-lg-12'>
                <div class='card'>
                 <div class='card-header'>
                    <h4 class='card-title'>".STAFF_RULESACP."</h4>
					<p class='card-title-desc'>".RULES_INFO."</p>
                 </div>				
                  <div class='card-body'>";
				$sql = "SELECT title, title_de, content, content_de FROM xucp_rules WHERE id = 1";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					while($news = $result->fetch_assoc()) {
					echo"
					<form action='".$_SERVER['PHP_SELF']."' method='post' enctype='multipart/form-data'>
                      <tr>				  
                        <td>
							<h6>
								".RULES_TITLE_EN."
								<small class='text-muted'>".RULES_TITLE_EN_TEXT."</small>
							</h6>
							<div class='input-group'>
								<input type='text' name='title' size='50' maxlength='100' class='form-control' value='".$news["title"]."' required>
							</div>	
                        </td>
					  </tr>
                      <tr>				  
                        <td>
							<h6>
								".RULES_TITLE_DE."
								<small class='text-muted'>".RULES_TITLE_DE_TEXT."</small>
							</h6>
							<div class='input-group'>
								<input type='text' name='title_de' size='50' maxlength='100' class='form-control' value='".$news["title_de"]."' required>
							</div>	
                        </td>
					  </tr>
                      <tr>					  
                        <td>
							<h6>
								".RULES_CONTENT_EN."
								<small class='text-muted'>".RULES_CONTENT_EN_TEXT."</small>
							</h6>
							<div class='input-group'>";
								textbbcode('content', htmlspecialchars(stripslashes($news['content'])));
							echo"
							</div>	
                        </td>						
                      </tr>
                      <tr>					  
                        <td>
							<h6>
								".RULES_CONTENT_DE."
								<small class='text-muted'>".RULES_CONTENT_DE_TEXT."</small>
							</h6>
							<div class='input-group'>";
								textbbcode('content_de', htmlspecialchars(stripslashes($news['content_de'])));
							echo"					
							</div>	
                        </td>						
                      </tr>                      					  
                      <tr>					  
						<td>
							<br>
							<button type='submit' name='rules_sup' class='btn btn-primary btn-round' data-target='successLiveToast'>
								".RULES_SAVE."
							</button>
							</submit>
                        </td>							
                      </tr>						
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