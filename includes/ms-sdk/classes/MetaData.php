<?php
/*
 This class is used for calling different category methods like database and metadata.
 Created Date: 03/April/2013
 Created By: SmartdataInc.
*/
include_once('Concierge.php');

class MetaData extends Concierge{
 
  public function __construct(){
 
   // Create object of the concierge class
    $this->api = new Concierge();
  }
  
  // List All Objects
  public function ListObjectRequest($accesskey,$associationid,$secreteaccessid,$includeAbstract,$baseObjectType=""){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ListAllObjects',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <ListAllObjects xmlns="http://membersuite.com/contracts">
                    <includeAbstract>'.$includeAbstract.'</includeAbstract>
                    <baseObjectType>'.$baseObjectType.'</baseObjectType>
                    </ListAllObjects>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='ListAllObjects');
    return $this->api->createobject($response,'ListAllObjects'); 
  }
  
  // Describe object
  public function DescribeObjectRequest($accesskey,$associationid,$secreteaccessid,$objecttype){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='DescribeObject',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <DescribeObject xmlns="http://membersuite.com/contracts">
                    <objectType>'.$objecttype.'</objectType>
                    </DescribeObject>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='DescribeObject');
    return $this->api->createobject($response,'DescribeObject'); 
  }
  
  public function GetAssociationConfigurationRequest($accesskey,$associationid,$secreteaccessid){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetAssociationConfiguration',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     // No Body tag required in this method
     // Replace strings
    
    // Create Response
    $response = $this->api->SendSoapRequest($apirequestheaders,$method='GetAssociationConfiguration');
    return $this->api->createobject($response,'GetAssociationConfiguration'); 
  }
  
  public function GetUserPreferencesRequest($accesskey,$associationid,$secreteaccessid){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetUserPreferences',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     
    // Create Response
    $response = $this->api->SendSoapRequest($apirequestheaders,$method='GetUserPreferences');
    return $this->api->createobject($response,'GetUserPreferences'); 
  }
  
  public function GetCommandDefinitionRequest($accesskey,$associationid,$secreteaccessid,$commandName){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetCommandDefinition',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <GetCommandDefinition xmlns="http://membersuite.com/contracts">
                    <commandName>'.$commandName.'</commandName>
                    </GetCommandDefinition>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='GetCommandDefinition');
    return $this->api->createobject($response,'GetCommandDefinition'); 
  }
  
  public function GetAllCommandsRequest($accesskey,$associationid,$secreteaccessid){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetAllCommands',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     
    // Create Response
    $response = $this->api->SendSoapRequest($apirequestheaders,$method='GetAllCommands');
    return $this->api->createobject($response,'GetAllCommands'); 
  }
  
  public function GetConsoleMetadataRequest($accesskey,$associationid,$secreteaccessid){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetConsoleMetadata',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     
    // Create Response
    $response = $this->api->SendSoapRequest($apirequestheaders,$method='GetConsoleMetadata');
    return $this->api->createobject($response,'GetConsoleMetadata'); 
  }
  
  public function DescribeObjectBuiltInFieldsRequest($accesskey,$associationid,$secreteaccessid,$objecttype){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='DescribeObjectBuiltInFields',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <DescribeObjectBuiltInFields xmlns="http://membersuite.com/contracts">
                    <objectType>'.$objecttype.'</objectType>
                    </DescribeObjectBuiltInFields>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='DescribeObjectBuiltInFields');
    return $this->api->createobject($response,'DescribeObjectBuiltInFields'); 
  }
  
  public function GetDefaultDashboardRequest($accesskey,$associationid,$secreteaccessid,$nameOfCommand,$context='true'){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetDefaultDashboard',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <GetDefaultDashboard xmlns="http://membersuite.com/contracts">
                    <nameOfCommand>'.$nameOfCommand.'</nameOfCommand>
                    <context>'.$context.'</context>
                    </GetDefaultDashboard>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='GetDefaultDashboard');
    return $this->api->createobject($response,'GetDefaultDashboard'); 
  }
  
  public function GetDefaultDataEntryPageLayoutRequest($accesskey,$associationid,$secreteaccessid,$objectType){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetDefaultDataEntryPageLayout',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <GetDefaultDataEntryPageLayout xmlns="http://membersuite.com/contracts">
                    <objectType>'.$objectType.'</objectType>
                    </GetDefaultDataEntryPageLayout>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='GetDefaultDataEntryPageLayout');
    return $this->api->createobject($response,'GetDefaultDataEntryPageLayout'); 
  }
  
  public function GetDefaultPortalPageLayoutRequest($accesskey,$associationid,$secreteaccessid,$objectType){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetDefaultPortalPageLayout',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <GetDefaultPortalPageLayout xmlns="http://membersuite.com/contracts">
                    <objectType>'.$objectType.'</objectType>
                    </GetDefaultPortalPageLayout>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='GetDefaultPortalPageLayout');
    return $this->api->createobject($response,'GetDefaultPortalPageLayout'); 
  }
  
  public function GetDefaultData360PageLayoutRequest($accesskey,$associationid,$secreteaccessid,$objectType){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetDefaultData360PageLayout',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <GetDefaultData360PageLayout xmlns="http://membersuite.com/contracts">
                    <objectType>'.$objectType.'</objectType>
                    </GetDefaultData360PageLayout>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='GetDefaultData360PageLayout');
    return $this->api->createobject($response,'GetDefaultData360PageLayout'); 
  }
  
  public function UpdateClassMetadataRequest($accesskey,$associationid,$secreteaccessid,$objectType,$metadataToSave){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='UpdateClassMetadata',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $metaobject='';
     if($metadataToSave)
     {
      foreach($metadataToSave as $key=>$value)
      {
        if($key<>'Fields' && $key<>'ValidationRules' && $key<>'FieldCalculationRules')
        $metaobject.='<mem:'.$key.'>'.$value.'</mem:'.$key.'>';
      }
     }
     $validation='';
     if($metadataToSave->ValidationRules)
     {
      foreach($metadataToSave->ValidationRules as $key=>$value)
      {
        $validation.='<ValidationRule><mem:'.$key.'>'.$value.'</mem:'.$key.'></ValidationRule>';
      }
     }
     
     $fieldcalc='';
     if($metadataToSave->FieldCalculationRules)
     {
      foreach($metadataToSave->FieldCalculationRules as $key=>$value)
      {
        $fieldcalc.='<FieldCalculationRule><mem:'.$key.'>'.$value.'</mem:'.$key.'></FieldCalculationRule>';
      }
     }
     
     $body = '<s:Body>
                    <UpdateClassMetadata xmlns="http://membersuite.com/contracts">
                    <objectType>'.$objectType.'</objectType>
                    <metadataToSave>
                    <mem:Fields>
                    '.$metaobject.'
                    </mem:Fields>
                    '.$validation.$fieldcalc.'
                    </metadataToSave>
                    </UpdateClassMetadata>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='UpdateClassMetadata');
    return $this->api->createobject($response,'UpdateClassMetadata'); 
  }
  
  public function DetermineObjectTypeRequest($accesskey,$associationid,$secreteaccessid,$objectID){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='DetermineObjectType',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <DetermineObjectType xmlns="http://membersuite.com/contracts">
                    <objectID>'.$objectID.'</objectID>
                    </DetermineObjectType>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='DetermineObjectType');
    return $this->api->createobject($response,'DetermineObjectType'); 
  }
  
  public function AddFavoriteRequest($accesskey,$associationid,$secreteaccessid,$cmd){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='AddFavorite',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $command = $this->object_to_array($cmd);
     $commandshortcut='';
     foreach($command as $key=>$value)
     {
      $commandshortcut.='<'.$key.'>'.$value.'</'.$key.'>';
     }
     $body = '<s:Body>
                    <AddFavorite xmlns="http://membersuite.com/contracts">
                    <cmd>'.$commandshortcut.'</cmd>
                    </AddFavorite>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='AddFavorite');
    return $this->api->createobject($response,'AddFavorite'); 
  }
  
  public function UpdateCustomFieldRequest($accesskey,$associationid,$secreteaccessid,$packet){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='UpdateCustomField',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $custom = $this->object_to_array($packet);
     $customfields = '';
     foreach($custom as $key=>$value){
       if($key<>'ClassType'){ 
      $customfields.= '<mem:FieldMetadata>
        <mem:Name>'.$key.'</mem:Name>
        <mem:Value>'.$value.'</mem:Value>
        </mem:FieldMetadata>';  
       }
      }
     $body = '<s:Body>
                    <UpdateCustomField xmlns="http://membersuite.com/contracts">
                    <packet xmlns:c="http://schemas.datacontract.org/2004/07/MemberSuite.SDK.Manifests.CustomField">
                    <c:CustomFieldContainer>
                    '.$customfields.'
                    </c:CustomFieldContainer>
                    </packet>
                    </UpdateCustomField>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='UpdateCustomField');
    return $this->api->createobject($response,'UpdateCustomField'); 
  }
  
  public function UpdateTabsRequest($accesskey,$associationid,$secreteaccessid,$newTabs){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='UpdateTabs',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $command = $this->object_to_array($newTabs);
     $commandshortcut='';
     foreach($command as $key=>$value)
     {
      $commandshortcut.='<'.$key.'>'.$value.'</'.$key.'>';
     }
     $body = '<s:Body>
                    <UpdateTabs xmlns="http://membersuite.com/contracts">
                    <newTabs>
                    <Command>
                    '.$commandshortcut.'
                    </Command>
                    </newTabs>
                    </UpdateTabs>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='UpdateTabs');
    return $this->api->createobject($response,'UpdateTabs'); 
  }
  
  public function UpdatePreferencesRequest($accesskey,$associationid,$secreteaccessid,$preferences){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='UpdatePreferences',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $prefere = $this->object_to_array($preferences);
     $namevaluestringpair='';
     foreach($prefere as $key=>$value)
     {
      $namevaluestringpair.='<string><name>'.$key.'</name><value>'.$value.'</value></string>';
     }
     $body = '<s:Body>
                    <UpdatePreferences xmlns="http://membersuite.com/contracts">
                    <preferences>
                     '.$namevaluestringpair.'
                    </preferences>
                    </UpdatePreferences>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='UpdatePreferences');
    return $this->api->createobject($response,'UpdatePreferences'); 
  }
  
  public function UpdateAssociationSettingsRequest($accesskey,$associationid,$secreteaccessid,$newSettings){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='UpdateAssociationSettings',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $prefere = $this->object_to_array($newSettings);
     $namevaluestringpair='';
     foreach($prefere as $key=>$value)
     {
      $namevaluestringpair.='<string><name>'.$key.'</name><value>'.$value.'</value></string>';
     }
     $body = '<s:Body>
                    <UpdateAssociationSettings xmlns="http://membersuite.com/contracts">
                    <newSettings>
                     '.$namevaluestringpair.'
                    </newSettings>
                    </UpdateAssociationSettings>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='UpdateAssociationSettings');
    return $this->api->createobject($response,'UpdateAssociationSettings'); 
  }
  
  public function Get360PacketRequest($accesskey,$associationid,$secreteaccessid,$primarySearch,$oneClicks){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='Get360Packet',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $primarysearch = $this->api->createsearch($primarySearch);
     
     $oneclicksearch='';
     foreach($oneClicks as $oneClicks)
     {
      $click = $this->api->createsearch($oneClicks);
      $oneclicksearch.='<b:Search>'.$click.'</b:Search>';
     }
     
     $body = '<s:Body>
                    <Get360Packet xmlns="http://membersuite.com/contracts">
                    <primarySearch>'.$primarysearch.'</primarySearch>
                    <oneClicks>'.$oneclicksearch.'</oneClicks>
                    </Get360Packet>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='Get360Packet');
    return $this->api->createobject($response,'Get360Packet'); 
  }
}
?>