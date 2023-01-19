<?php 
// print_r($_POST);
$data = json_decode(file_get_contents("php://input"), true);

$firstname   = $data['name'];
$email       = $data['email'];
$contact_num = $data['phone'];
   
// if($data['message']!=''){
	$message     = $data['message'];

		$subject = "Enquiry From Finmore Investor Services Pvt. Ltd.";  
		$myhtml = "<div align='center' style='margin:10px 0px 20px 0;width:100%;margin:0 auto; padding:0px; background:#EDECED;border: solid 2px #231F20;'>
			<div align='center' style='margin:10px 0px 20px 0;width:50%;margin:0 auto; padding:0px; background:#fff;'>
				<div align='center' style='margin: 0; background: #ffffff; padding: 10px; border: 1px solid #104974;'><img height=50 src='https://finmore.in/assets/images/Asset3.png'/></div>
				<div style='background: #e2e2e2; padding: 20px; border: 1px solid #104974;'>
					<div style='width:85%;margin:0px auto;'>
						<div style='width:50%;position:relative;float:left;margin:8px 0;color:#2c2c2c;' align='left'><font face=verdana size=2><strong>Name :</strong></div>
						<div style='width:50%;position:relative;float:left;color:#525252;text-align:left;margin:8px 0;'><font face=verdana size=2></font>&nbsp;".$firstname."</div>
						<div style='clear:both;'></div>
						<div style='width:50%;position:relative;float:left;margin:8px 0;color:#2c2c2c;' align='left'><font face=verdana size=2><strong>Email :</strong></div>
						<div style='width:50%;position:relative;float:left;color:#525252;text-align:left;margin:8px 0;'><font face=verdana size=2></font>&nbsp;".$email."</div>
						<div style='clear:both;'></div>
						<div style='width:50%;position:relative;float:left;margin:8px 0;color:#2c2c2c;' align='left'><font face=verdana size=2><strong>Contact Number :</strong></div>
						<div style='width:50%;position:relative;float:left;color:#525252;text-align:left;margin:8px 0;'><font face=verdana size=2></font>&nbsp;".$contact_num."</div>
						<div style='clear:both;'></div>
						<div style='width:50%;position:relative;float:left;margin:8px 0;color:#2c2c2c;' align='left'><font face=verdana size=2><strong>Message :</strong></div>
						<div style='width:50%;position:relative;float:left;color:#525252;text-align:left;margin:8px 0;'><font face=verdana size=2></font>&nbsp;".$message."</div>
						<div style='clear:both;'></div>
						<br/>
					</div>
				</div>
			</div>
		</div>";

		$toadmin = 'pavanrvish143@gmail.com'; 
		//$toadmin = 'kamalshrm97@gmail.com'; 
			/* Always set content-type when sending HTML email */


		/* user mail copy start */

		$myhtml2 = "<div align='center' style='margin:10px 0px 20px 0;width:100%;margin:0 auto; padding:0px; background:#EDECED;border: solid 2px #231F20;'>
			<div align='center' style='margin:10px 0px 20px 0;width:50%;margin:0 auto; padding:0px; background:#fff;'>
				<div align='center' style='margin: 0; background: #ffffff; padding: 10px; border: 1px solid #104974;'><img height=50 src='https://finmore.in/assets/images/Asset3.png'/></div>
				<div style='background: #e2e2e2; padding: 20px; border: 1px solid #104974;'>
					<div style='width:85%;position:relative;margin:20px auto;color:#2c2c2c;' align='left'><font face=verdana size=2>Dear <strong>".$firstname.",</strong></font></div>
					<div style='width:85%;position:relative;margin:20px auto;color:#2c2c2c;' align='left'><font face=verdana size=2>Thank You for sending your valuable message to us, We will revert you shortly.<br><br> </font></div>
				</div>
			</div>
			<div style='clear:both;'></div>
		</div>";

	// Always set content-type when sending HTML email
// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	// More headers
	$headers .= 'From: <noreply@finmore.in>' .'Finmore Investor Services Pvt. Ltd.';
	if(mail($toadmin,$subject,$myhtml,$headers) && mail($email,$subject,$myhtml2,$headers)){

		echo json_encode(array('message' => 'Thank you for your message. It has been sent.', 'status' => true));
	}
	else{

		echo json_encode(array('message' => 'One or more fields have an error. Please check and try again.', 'status' => false));;
	} 
/* user mail copy end */
// }
?>