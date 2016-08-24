<?php
/*
 Created Date: 1/May/2013
 Created By: SmartdataInc.
*/
include_once('Concierge.php');

class Integration extends Concierge{
  
  public function __construct(){
   
   // Create object of the concierge class
    $this->api = new Concierge();
  }
 
  public function SetConfigurationSettingRequest($accesskey,$associationid,$secreteaccessid,$ns,$name,$value,$description){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='SetConfigurationSetting',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <SetConfigurationSetting xmlns="http://membersuite.com/contracts">
                    <ns>'.$ns.'</ns>
                    <name>'.$name.'</name>
                    <value>'.$value.'</value>
                    <description>'.$description.'</description>
                    </SetConfigurationSetting>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='SetConfigurationSetting');
    return $this->api->createobject($response,'SetConfigurationSetting'); 
  }
  
  public function GetConfigurationSettingRequest($accesskey,$associationid,$secreteaccessid,$ns,$settingName){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetConfigurationSetting',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetConfigurationSetting xmlns="http://membersuite.com/contracts">
                    <ns>'.$ns.'</ns>
                    <settingName>'.$settingName.'</settingName>
                    </GetConfigurationSetting>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetConfigurationSetting');
    return $this->api->createobject($response,'GetConfigurationSetting'); 
  }
  
  public function GetAllConfigurationSettingRequest($accesskey,$associationid,$secreteaccessid,$ns){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetAllConfigurationSettings',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetAllConfigurationSettings xmlns="http://membersuite.com/contracts">
                    <ns>'.$ns.'</ns>
                    </GetAllConfigurationSettings>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetAllConfigurationSettings');
    return $this->api->createobject($response,'GetAllConfigurationSettings'); 
  }
  
  public function PingExtensionServiceRequest($accesskey,$associationid,$secreteaccessid,$msoService){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='PingExtensionService',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($msoService);
     $objecttype = '';
     foreach($objectarr as $key=>$value){
       if($key<>'ClassType'){ 
      $objecttype.= '<mem:FieldMetadata>
        <mem:Name>'.$key.'</mem:Name>
        <mem:Value>'.$value.'</mem:Value>
        </mem:FieldMetadata>';  
       }
      }
      $body = '<s:Body>
                    <PingExtensionService xmlns="http://membersuite.com/contracts">
                    <msoService>
                    <mem:ClassType>'.$objectarr['ClassType'].'</mem:ClassType>
                    <mem:Fields>
                    '.$objecttype.'
                    </mem:Fields>
                    </msoService>
                    </PingExtensionService>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='PingExtensionService');
    return $this->api->createobject($response,'PingExtensionService'); 
  }
  
  public function ExecuteMailMergeRequest($accesskey,$associationid,$secreteaccessid,$searchToUse,$mailMergeTemplate,$outputFormat,$createActivity,$activityTypeID,$activityMemo){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ExecuteMailMerge',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
        $search = '';
        $search =  $this->api->createsearch($searchToUse);
        
    
    $create = $createActivity==''?'true':$createActivity;
    $activityid = $activityTypeID==''?'true':$activityTypeID;
    $activitymemo = $activityMemo==''?'true':$activityMemo;
    
      $body = '<s:Body>
                    <ExecuteMailMerge xmlns="http://membersuite.com/contracts">
                    <searchToUse>'.$search.'</searchToUse>
                    <mailMergeTemplate>'.$mailMergeTemplate.'</mailMergeTemplate>
                    <mem:outputFormat>
                    <mem:MailMergeOutputFormat>'.$outputFormat.'</mem:MailMergeOutputFormat>
                    </mem:outputFormat>
                    <createActivity>'.$create.'</createActivity>
                    <activityTypeID>'.$activityid.'</activityTypeID>
                    <activityMemo>'.$activitymemo.'</activityMemo>
                    </ExecuteMailMerge>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ExecuteMailMerge');
    return $this->api->createobject($response,'ExecuteMailMerge'); 
  }
}
?>