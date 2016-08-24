<?php
/*
 This class is used for SSO.
 Created Date: 02/April/2013
 Created By: SmartdataInc.
*/
include_once('Concierge.php');

class Login extends Concierge{
  
  public function __construct(){
   
   // Create object of the concierge class
    $this->api = new Concierge();
  }
  
  // This function is to create token request
 public function CreateToken($accesskey,$associationid,$secreteaccessid,$portalusername,$signingcertificateId,$digitalsignature){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='CreatePortalSecurityToken',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <CreatePortalSecurityToken xmlns="http://membersuite.com/contracts">
                    <portalUserName>'.$portalusername.'</portalUserName>
                    <signingCertificateId>'.$signingcertificateId.'</signingCertificateId>
                    <signature>'.$digitalsignature.'</signature>
                    </CreatePortalSecurityToken>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='CreatePortalSecurityToken');
    return $this->api->createobject($response,'CreatePortalSecurityToken');
  }
  
   // This function is to create token request
  public function LoginToPortal($accesskey,$associationid,$secreteaccessid,$portalusername,$portalPassword){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='LoginToPortal',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <LoginToPortal xmlns="http://membersuite.com/contracts">
                    <portalUserName>'.$portalusername.'</portalUserName>
                    <portalPassword>'.$portalPassword.'</portalPassword>
                    </LoginToPortal>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='LoginToPortal');
    return $this->api->createobject($response,'LoginToPortal');
  }
  
    // This function is to create token request
   public function WhoAmIRequest($accesskey,$associationid,$secreteaccessid){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='WhoAmI',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     // WhoAmI do not require any body definition
      // Create Response
    
    $response = $this->api->SendSoapRequest($apirequestheaders,$method='WhoAmI');
    return $this->api->createobject($response,'WhoAmI');
  }
  
  public function RetrievePortalInformationByUrlRequest($accesskey,$associationid,$secreteaccessid,$hostName){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='RetrievePortalInformationByUrl',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <RetrievePortalInformationByUrl xmlns="http://membersuite.com/contracts">
                    <hostName>'.$hostName.'</hostName>
                    </RetrievePortalInformationByUrl>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='RetrievePortalInformationByUrl');
    return $this->api->createobject($response,'RetrievePortalInformationByUrl');
  }
  
  public function RetrievePortalInformationByIDRequest($accesskey,$associationid,$secreteaccessid){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='RetrievePortalInformationByID',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     //This Method do not require body tag
    
     // Create Response
    
    $response = $this->api->SendSoapRequest($apirequestheaders,$method='RetrievePortalInformationByID');
    return $this->api->createobject($response,'RetrievePortalInformationByID');
  }
  
  public function GetRecordPermissionRequest($accesskey,$associationid,$secreteaccessid,$recordID){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetRecordPermission',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <GetRecordPermission xmlns="http://membersuite.com/contracts">
                    <recordID>'.$recordID.'</recordID>
                    </GetRecordPermission>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetRecordPermission');
    return $this->api->createobject($response,'GetRecordPermission');
  }
  
  public function LoginRequest($accesskey,$associationid,$secreteaccessid,$userName,$password,$loginDestination){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='Login',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <Login xmlns="http://membersuite.com/contracts">
                    <userName>'.$userName.'</userName>
                    <password>'.$password.'</password>
                    <loginDestination>'.$loginDestination.'</loginDestination>
                    </Login>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='Login');
    return $this->api->createobject($response,'Login');
  }
  
  public function ResetPasswordRequest($accesskey,$associationid,$secreteaccessid,$userID,$newPassword){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ResetPassword',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <ResetPassword xmlns="http://membersuite.com/contracts">
                    <userID>'.$userID.'</userID>
                    <newPassword>'.$newPassword.'</newPassword>
                    </ResetPassword>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ResetPassword');
    return $this->api->createobject($response,'ResetPassword');
  }
  
  public function SendWelcomePortalUserEmailRequest($accesskey,$associationid,$secreteaccessid,$portalUserId,$emailAddress){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='SendWelcomePortalUserEmail',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <SendWelcomePortalUserEmail xmlns="http://membersuite.com/contracts">
                    <portalUserId>'.$portalUserId.'</portalUserId>
                    <emailAddress>'.$emailAddress.'</emailAddress>
                    </SendWelcomePortalUserEmail>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='SendWelcomePortalUserEmail');
    return $this->api->createobject($response,'SendWelcomePortalUserEmail');
  }
  
  public function SendForgottenPortalPasswordEmail($accesskey,$associationid,$secreteaccessid,$portalUserName,$nextUrl){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='SendForgottenPortalPasswordEmail',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <SendForgottenPortalPasswordEmail xmlns="http://membersuite.com/contracts">
                    <portalUserName>'.$portalUserName.'</portalUserName>
                    <nextUrl>'.$nextUrl.'</nextUrl>
                    </SendForgottenPortalPasswordEmail>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='SendForgottenPortalPasswordEmail');
    return $this->api->createobject($response,'SendForgottenPortalPasswordEmail');
  }
  
  public function GetOrCreatePortalUserForEntityRequest($accesskey,$associationid,$secreteaccessid,$entityId){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetOrCreatePortalUserForEntity',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <GetOrCreatePortalUserForEntity xmlns="http://membersuite.com/contracts">
                    <entityId>'.$entityId.'</entityId>
                    </GetOrCreatePortalUserForEntity>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetOrCreatePortalUserForEntity');
    return $this->api->createobject($response,'GetOrCreatePortalUserForEntity');
  }
  
  public function SearchAndGetOrCreatePortalUserRequest($accesskey,$associationid,$secreteaccessid,$loginIDOrEmail){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='SearchAndGetOrCreatePortalUser',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <SearchAndGetOrCreatePortalUser xmlns="http://membersuite.com/contracts">
                    <loginIDOrEmail>'.$loginIDOrEmail.'</loginIDOrEmail>
                    </SearchAndGetOrCreatePortalUser>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='SearchAndGetOrCreatePortalUser');
    return $this->api->createobject($response,'SearchAndGetOrCreatePortalUser');
  }
  
  public function LoginWithHashRequest($accesskey,$associationid,$secreteaccessid,$userName,$hash){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='LoginWithHash',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <LoginWithHash xmlns="http://membersuite.com/contracts">
                    <userName>'.$userName.'</userName>
                    <hash>'.$hash.'</hash>
                    </LoginWithHash>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='LoginWithHash');
    return $this->api->createobject($response,'LoginWithHash');
  }
  
  public function LoginPortalUserWithHashRequest($accesskey,$associationid,$secreteaccessid,$userName,$hash){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='LoginPortalUserWithHash',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <LoginPortalUserWithHash xmlns="http://membersuite.com/contracts">
                    <userName>'.$userName.'</userName>
                    <hash>'.$hash.'</hash>
                    </LoginPortalUserWithHash>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='LoginPortalUserWithHash');
    return $this->api->createobject($response,'LoginPortalUserWithHash');
  }
  
  public function CreateTemporaryAccessKeyRequest($accesskey,$associationid,$secreteaccessid,$userName,$password,$secretAccessKey){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='CreateTemporaryAccessKey',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <CreateTemporaryAccessKey xmlns="http://membersuite.com/contracts">
                    <userName>'.$userName.'</userName>
                    <password>'.$password.'</password>
                    <secretAccessKey>'.$secretAccessKey.'</secretAccessKey>
                    </CreateTemporaryAccessKey>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='CreateTemporaryAccessKey');
    return $this->api->createobject($response,'CreateTemporaryAccessKey');
  }
  
  public function CreateTemporaryAccessKeyWithHashRequest($accesskey,$associationid,$secreteaccessid,$userName,$hash,$secretAccessKey){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='CreateTemporaryAccessKeyWithHash',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <CreateTemporaryAccessKeyWithHash xmlns="http://membersuite.com/contracts">
                    <userName>'.$userName.'</userName>
                    <hash>'.$hash.'</hash>
                    <secretAccessKey>'.$secretAccessKey.'</secretAccessKey>
                    </CreateTemporaryAccessKeyWithHash>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='CreateTemporaryAccessKeyWithHash');
    return $this->api->createobject($response,'CreateTemporaryAccessKeyWithHash');
  }
  
  public function CreateConsoleSecurityTokenRequest($accesskey,$associationid,$secreteaccessid,$userId,$signingCertificateId,$signature){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='CreateConsoleSecurityToken',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <CreateConsoleSecurityToken xmlns="http://membersuite.com/contracts">
                    <userId>'.$userId.'</userId>
                    <signingCertificateId>'.$signingCertificateId.'</signingCertificateId>
                    <signature>'.$signature.'</signature>
                    </CreateConsoleSecurityToken>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='CreateConsoleSecurityToken');
    return $this->api->createobject($response,'CreateConsoleSecurityToken');
  }
  
  public function LoginWithTokenRequest($accesskey,$associationid,$secreteaccessid,$securityToken,$signingCertificateId,$signature){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='LoginWithToken',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <LoginWithToken xmlns="http://membersuite.com/contracts">
                    <securityToken>'.$securityToken.'</securityToken>
                    <signingCertificateId>'.$signingCertificateId.'</signingCertificateId>
                    <signature>'.$signature.'</signature>
                    </LoginWithToken>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='LoginWithToken');
    return $this->api->createobject($response,'LoginWithToken');
  }
  
  public function ChangePasswordRequest($accesskey,$associationid,$secreteaccessid,$oldPassword,$newPassword){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ChangePassword',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <ChangePassword xmlns="http://membersuite.com/contracts">
                    <oldPassword>'.$oldPassword.'</oldPassword>
                    <newPassword>'.$newPassword.'</newPassword>
                    </ChangePassword>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ChangePassword');
    return $this->api->createobject($response,'ChangePassword');
  }
  
  public function SwitchAssociation($accesskey,$associationid,$secreteaccessid){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='SwitchAssociation',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     //Do not require body tag
    
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequestheaders,$method='SwitchAssociation');
    return $this->api->createobject($response,'SwitchAssociation');
  }
  
  public function LogoutRequest($accesskey,$associationid,$secreteaccessid){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='Logout',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     //Do not require body tag
    
     // Create Response
    
     $response = $this->api->SendSoapRequest($apirequestheaders,$method='Logout');
     return $this->api->createobject($response,'Logout');
  }
  
  public function RecordRecordAccessRequest($accesskey,$associationid,$secreteaccessid,$recordID,$cmd){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='RecordRecordAccess',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <RecordRecordAccess xmlns="http://membersuite.com/contracts">
                    <recordID>'.$recordID.'</recordID>
                    <cmd>'.$cmd.'</cmd>
                    </RecordRecordAccess>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    
     // Create Response
    
     $response = $this->api->SendSoapRequest($apirequest,$method='RecordRecordAccess');
     return $this->api->createobject($response,'RecordRecordAccess');
  }
  
  public function RecordErrorRequest($accesskey,$associationid,$secreteaccessid,$description){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='RecordError',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <RecordError xmlns="http://membersuite.com/contracts">
                    <description>'.$description.'</description>
                    </RecordError>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    
     // Create Response
    
     $response = $this->api->SendSoapRequest($apirequest,$method='RecordError');
     return $this->api->createobject($response,'RecordError');
  }
  
  public function GetAllUsersThanCanAccessCurrentAssociationRequest($accesskey,$associationid,$secreteaccessid){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetAllUsersThanCanAccessCurrentAssociation',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     //This Method do not require body tag
    
     // Create Response
    
     $response = $this->api->SendSoapRequest($apirequestheaders,$method='GetAllUsersThanCanAccessCurrentAssociation');
     return $this->api->createobject($response,'GetAllUsersThanCanAccessCurrentAssociation');
  }
  
  public function GetAccessibleEntitiesForEntityRequest($accesskey,$associationid,$secreteaccessid,$entityId){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetAccessibleEntitiesForEntity',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <GetAccessibleEntitiesForEntity xmlns="http://membersuite.com/contracts">
                    <entityId>'.$entityId.'</entityId>
                    </GetAccessibleEntitiesForEntity>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    
     // Create Response
    
     $response = $this->api->SendSoapRequest($apirequest,$method='GetAccessibleEntitiesForEntity');
     return $this->api->createobject($response,'GetAccessibleEntitiesForEntity');
  }
  
  
  
}
?>