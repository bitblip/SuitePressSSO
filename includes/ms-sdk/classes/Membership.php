<?php
/*
 Created Date: 6/May/2013
 Created By: SmartdataInc.
*/
include_once('Concierge.php');

class Membership extends Concierge{
  
  public function __construct(){
   
   // Create object of the concierge class
    $this->api = new Concierge();
  }
 
  public function ProcessRenewalRequest($accesskey,$associationid,$secreteaccessid,$membershipOrganizationID,$batchID,$renewalBatchName,$searchToUse,$sendOutEmails,$jobStatusNotificationEmail){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ProcessRenewals',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <ProcessRenewals xmlns="http://membersuite.com/contracts">
                    <membershipOrganizationID>'.$membershipOrganizationID.'</membershipOrganizationID>
                    <batchID>'.$batchID.'</batchID>
                    <renewalBatchName>'.$renewalBatchName.'</renewalBatchName>
                    <searchToUse>'.$searchToUse.'</searchToUse>
                    <sendOutEmails>'.$sendOutEmails.'</sendOutEmails>
                    <jobStatusNotificationEmail>'.$jobStatusNotificationEmail.'</jobStatusNotificationEmail>
                    </ProcessRenewals>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ProcessRenewals');
    return $this->api->createobject($response,'ProcessRenewals'); 
  }
  
  public function GetPrimaryMembershipRequest($accesskey,$associationid,$secreteaccessid,$membershipOrganizationID,$entityID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetPrimaryMembership',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetPrimaryMembership xmlns="http://membersuite.com/contracts">
                    <membershipOrganizationID>'.$membershipOrganizationID.'</membershipOrganizationID>
                    <entityID>'.$entityID.'</entityID>
                    </GetPrimaryMembership>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetPrimaryMembership');
    return $this->api->createobject($response,'GetPrimaryMembership'); 
  }
  
  public function GetDefaultChapterProductRequest($accesskey,$associationid,$secreteaccessid,$membershipTypeID,$chapterID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetDefaultChapterProduct',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetDefaultChapterProduct xmlns="http://membersuite.com/contracts">
                    <membershipTypeID>'.$membershipTypeID.'</membershipTypeID>
                    <chapterID>'.$chapterID.'</chapterID>
                    </GetDefaultChapterProduct>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetDefaultChapterProduct');
    return $this->api->createobject($response,'GetDefaultChapterProduct'); 
  }
  
  public function GetDefaultSectionProductRequest($accesskey,$associationid,$secreteaccessid,$membershipTypeID,$sectionID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetDefaultSectionProduct',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetDefaultSectionProduct xmlns="http://membersuite.com/contracts">
                    <membershipTypeID>'.$membershipTypeID.'</membershipTypeID>
                    <sectionID>'.$sectionID.'</sectionID>
                    </GetDefaultSectionProduct>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetDefaultSectionProduct');
    return $this->api->createobject($response,'GetDefaultSectionProduct'); 
  }
  
  public function GetApplicableMembershipDuesProductsRequest($accesskey,$associationid,$secreteaccessid,$membershipOrganizationID,$entityID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetDefaultSectionProduct',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetApplicableMembershipDuesProducts xmlns="http://membersuite.com/contracts">
                    <membershipOrganizationID>'.$membershipOrganizationID.'</membershipOrganizationID>
                    <entityID>'.$entityID.'</entityID>
                    </GetApplicableMembershipDuesProducts>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetApplicableMembershipDuesProducts');
    return $this->api->createobject($response,'GetApplicableMembershipDuesProducts'); 
  }
  
  public function GetApplicableChaptersRequest($accesskey,$associationid,$secreteaccessid,$membershipTypeID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetApplicableChaptersForMembershipType',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetApplicableChaptersForMembershipType xmlns="http://membersuite.com/contracts">
                    <membershipTypeID>'.$membershipTypeID.'</membershipTypeID>
                    </GetApplicableChaptersForMembershipType>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetApplicableChaptersForMembershipType');
    return $this->api->createobject($response,'GetApplicableChaptersForMembershipType'); 
  }
  
  public function SuggestChapterRequest($accesskey,$associationid,$secreteaccessid,$membershipOrganizationID,$potentialMemberID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='SuggestChapter',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <SuggestChapter xmlns="http://membersuite.com/contracts">
                    <membershipOrganizationID>'.$membershipOrganizationID.'</membershipOrganizationID>
                    <potentialMemberID>'.$potentialMemberID.'</potentialMemberID>
                    </SuggestChapter>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='SuggestChapter');
    return $this->api->createobject($response,'SuggestChapter'); 
  }
  
  public function GetEmailTemplateRequest($accesskey,$associationid,$secreteaccessid,$nameOrIDOfTemplate){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetEmailTemplate',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetEmailTemplate xmlns="http://membersuite.com/contracts">
                    <nameOrIDOfTemplate>'.$nameOrIDOfTemplate.'</nameOrIDOfTemplate>
                    </GetEmailTemplate>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetEmailTemplate');
    return $this->api->createobject($response,'GetEmailTemplate'); 
  }
  
  public function SendEmailRequest($accesskey,$associationid,$secreteaccessid,$emailTemplateNameOrID,$targets,$overrideEmailAddress){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='SendEmail',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $target = '';
     if($targets)
     {
     foreach($targets as $targets)
     {
      $target.='<string>'.$targets.'</string>';
     }
     }
      $body = '<s:Body>
                    <SendEmail xmlns="http://membersuite.com/contracts">
                    <emailTemplateNameOrID>'.$emailTemplateNameOrID.'</emailTemplateNameOrID>
                    <targets>'.$target.'</targets>
                    <overrideEmailAddress>'.$overrideEmailAddress.'</overrideEmailAddress>
                    </SendEmail>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='SendEmail');
    return $this->api->createobject($response,'SendEmail'); 
  }
  
  public function GetAllEmailTemplatesRequest($accesskey,$associationid,$secreteaccessid){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetAllEmailTemplates',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     // This Method do not require body tag 
    
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequestheaders,$method='GetAllEmailTemplates');
    return $this->api->createobject($response,'GetAllEmailTemplates'); 
  }
  
  public function PreviewEmailBlastRequest($accesskey,$associationid,$secreteaccessid,$templateToUse,$search,$destinationEmail,$count){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='PreviewEmailBlast',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     
     $searchToUse = $this->api->createsearch($search);
     
     $template = $this->object_to_array($templateToUse);
     $emailtemplate='';
     foreach($template as $key=>$value)
     {
      $emailtemplate.='<'.$key.'>'.$value.'</'.$key.'>';
     }
      $body = '<s:Body>
                    <PreviewEmailBlast xmlns="http://membersuite.com/contracts">
                    <templateToUse>'.$emailtemplate.'</templateToUse>
                    <search>'.$searchToUse.'</search>
                    <destinationEmail>'.$destinationEmail.'</destinationEmail>
                    <count>'.$count.'</count>
                    </PreviewEmailBlast>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    //print_r($apirequest);die;
    $response = $this->api->SendSoapRequest($apirequest,$method='PreviewEmailBlast');
    return $this->api->createobject($response,'PreviewEmailBlast'); 
  }
  
  public function SendCustomizedEmailRequest($accesskey,$associationid,$secreteaccessid,$template,$targets,$overrideEmailAddress){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='SendCustomizedEmail',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $templatetoUse = $this->object_to_array($template);
     $emailtemplate='';
     foreach($templatetoUse as $key=>$value)
     {
      $emailtemplate.='<'.$key.'>'.$value.'</'.$key.'>';
     }
     
     $target='';
     foreach($targets as $targets)
     {
      $target.='<string>'.$targets.'</string>';
     }
      $body = '<s:Body>
                    <SendCustomizedEmail xmlns="http://membersuite.com/contracts">
                    <template>'.$emailtemplate.'</template>
                    <targets>'.$target.'</targets>
                    <overrideEmailAddress>'.$overrideEmailAddress.'</overrideEmailAddress>
                    </SendCustomizedEmail>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='SendCustomizedEmail');
    return $this->api->createobject($response,'SendCustomizedEmail'); 
  }
  
  public function DropMembershipsRequest($accesskey,$associationid,$secreteaccessid,$searchToUseForDrop,$terminationReasonID,$newStatusID,$terminationDate){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='DropMemberships',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $search = '';
    $criteria='';
    $grouptype='';
    $search = $this->api->createsearch($searchToUseForDrop);
    
     
      $body = '<s:Body>
                    <DropMemberships xmlns="http://membersuite.com/contracts">
                    <searchToUseForDrop>'.$search.'</searchToUseForDrop>
                    <terminationReasonID>'.$terminationReasonID.'</terminationReasonID>
                    <newStatusID>'.$newStatusID.'</newStatusID>
                    <terminationDate>'.$terminationDate.'</terminationDate>
                    </DropMemberships>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='DropMemberships');
    return $this->api->createobject($response,'DropMemberships'); 
  }
}
?>