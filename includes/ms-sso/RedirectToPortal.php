<?php
  session_start();
  ob_start();

  //include_once($_SERVER['DOCUMENT_ROOT'].'/ms_sdk/APISample/phpsdk.phar'); // Use PHAR Archive
  include_once($_SERVER['DOCUMENT_ROOT'].'/ms_sdk/src/MemberSuite.php'); // Use the SRC Directory

include_once('./ConciergeApiHelper.php');

include_once('./config.php');

$api = new MemberSuite();
 $helper = new ConciergeApiHelper();       
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $portalusername = $_POST['portalusername'];
    $portalpassword = $_POST['portalpassword'];
    
    $api->accesskeyId = Userconfig::read('AccessKeyId');
    $api->associationId = Userconfig::read('AssociationId');
    $api->secretaccessId = Userconfig::read('SecretAccessKey');
    $api->portalusername = $portalusername;
    $api->portalPassword = $portalpassword;
    $api->signingcertificateId = Userconfig::read('SigningcertificateId');

    // Get Private XML Content
    $xmlPath = Userconfig::read('SigningcertificatePath');
    if(file_exists($xmlPath))
    {       
       
       $value = file_get_contents($xmlPath);
       $rsaXML = mb_convert_encoding($value , 'UTF-8' , 'UTF-16LE');
            
    }
    else{
        
        $_SESSION['loginerr'] = 'Signing certificate file does not exists.';
        header("location:index.php?error=credentialerror");
        exit(); 
        
    }
    
    if(!isset($_POST['varifycredentials'])){
     
        // Varify username and password
        $response = $api->LoginToPortal($api->portalusername,$api->portalPassword);
	
	if($response->aSuccess == 'false'){
            
            $loginarr = $response->aErrors->bConciergeError->bMessage;
            $_SESSION['loginerr'] = $loginarr;
            header("location:index.php?error=credentialerror");
            exit();            
        }
        
    }
    // Use helper class to generate signature
    //$helper->DigitalSignature($api->portalusername,$rsaXML);
    
    $api->digitalsignature = $helper->DigitalSignature($api->portalusername,$rsaXML);
    
    
    // Create Token for sso
    $response = $api->CreatePortalSecurityToken($api->portalusername,$api->signingcertificateId,$api->digitalsignature);
    
     if($response->aSuccess=='false')
    {
      $_SESSION['loginerr'] = $response->aErrors->bConciergeError->bMessage;
      header("location:index.php?error=credentialerror");
      exit(); 
    }
    
    $securityToken = $response->aResultValue;
    
}

?>

<form name="LoginForm" method="post" id="LoginForm" action="<?php echo Userconfig::read('PortalUrl');?>Login.aspx">
    <input type="hidden" name="Token" id="Token" value="<?php echo $securityToken;?>" />
        
	<!--Once logged into Membersuite, jump to this URL-->
	<input type="hidden" name="NextUrl" id="NextUrl" />

	<!--In the MemberSuite Portal header, provide a return link to a custom URL-->
    <input type="hidden" name="ReturnUrl" id="ReturnUrl" value="default.aspx" />
	<input type="hidden" name="ReturnText" id="ReturnText" />
	
	<!--On logout from the MemberSuite Portal, redirect to this URL rather than the default login page-->
	<input type="hidden" name="LogoutUrl" id="LogoutUrl" />
</form>
<script>
    document.LoginForm.submit();
</script>    
