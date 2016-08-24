<?php
/*
 Created Date: 7/May/2013
 Created By: SmartdataInc.
*/
include_once('Concierge.php');

class Portal extends Concierge{
  
  public function __construct(){
   
   // Create object of the concierge class
    $this->api = new Concierge();
  }
  
  // Get File Cabinet Request
  public function GetAccessiblePortalFormsRequest($accesskey,$associationid,$secreteaccessid,$entityID){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetAccessiblePortalForms',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetAccessiblePortalForms xmlns="http://membersuite.com/contracts">
                    <entityID>'.$entityID.'</entityID>
                    </GetAccessiblePortalForms>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetAccessiblePortalForms');
    return $this->api->createobject($response,'GetAccessiblePortalForms'); 
  }
  
  // Get File Cabinet Request
  public function DescribePortalFormRequest($accesskey,$associationid,$secreteaccessid,$formID,$entityID){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='DescribePortalForm',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <DescribePortalForm xmlns="http://membersuite.com/contracts">
                    <formID>'.$formID.'</formID>
                    <entityID>'.$entityID.'</entityID>
                    </DescribePortalForm>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='DescribePortalForm');
    return $this->api->createobject($response,'DescribePortalForm'); 
  }
  
  // Get File Cabinet Request
  public function CheckEntitlementRequest($accesskey,$associationid,$secreteaccessid,$type,$entityID,$context){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='CheckEntitlement',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <CheckEntitlement xmlns="http://membersuite.com/contracts">
                    <type>'.$type.'</type>
                    <entityID>'.$entityID.'</entityID>
                    <context>'.$context.'</context>
                    </CheckEntitlement>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='CheckEntitlement');
    return $this->api->createobject($response,'CheckEntitlement'); 
  }
  
  // Get File Cabinet Request
  public function AdjustEntitlementAvailableQuantityRequest($accesskey,$associationid,$secreteaccessid,$entityID,$typeOfEntitlement,$context,$amountToAdjust){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='AdjustEntitlementAvailableQuantity',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <AdjustEntitlementAvailableQuantity xmlns="http://membersuite.com/contracts">
                    <entityID>'.$entityID.'</entityID>
                    <typeOfEntitlement>'.$typeOfEntitlement.'</typeOfEntitlement>
                    <context>'.$context.'</context>
                    <amountToAdjust>'.$amountToAdjust.'</amountToAdjust>
                    </AdjustEntitlementAvailableQuantity>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='AdjustEntitlementAvailableQuantity');
    return $this->api->createobject($response,'AdjustEntitlementAvailableQuantity'); 
  }
  
  public function ListEntitlementsRequest($accesskey,$associationid,$secreteaccessid,$entityID,$type){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ListEntitlements',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <ListEntitlements xmlns="http://membersuite.com/contracts">
                    <entityID>'.$entityID.'</entityID>
                    <type>'.$type.'</type>
                    </ListEntitlements>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ListEntitlements');
    return $this->api->createobject($response,'ListEntitlements'); 
  }
  
  public function GetPortalUrlRequest($accesskey,$associationid,$secreteaccessid){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetPortalUrl',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     //This method do not require body tag
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequestheaders,$method='GetPortalUrl');
    return $this->api->createobject($response,'GetPortalUrl'); 
  }
  
  public function GetAppropriateRateCardRequest($accesskey,$associationid,$secreteaccessid,$issueId,$advertiserId){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetAppropriateRateCard',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetAppropriateRateCard xmlns="http://membersuite.com/contracts">
                    <issueId>'.$issueId.'</issueId>
                    <advertiserId>'.$advertiserId.'</advertiserId>
                    </GetAppropriateRateCard>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetAppropriateRateCard');
    return $this->api->createobject($response,'GetAppropriateRateCard'); 
  }
  
  public function ConvertLeadRequest($accesskey,$associationid,$secreteaccessid,$leadID,$newOwnerID,$sendEmailToNewOwner,$entityNameOrID,$createIndividualRecord,$relationshipTypeID,$opportunityNameOrID,$msoFollowUpActivity){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ConvertLead',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     
     
     $activity = '';
     foreach($msoFollowUpActivity as $key=>$value){
       if($key<>'ClassType'){ 
      $activity.= '<mem:FieldMetadata>
        <mem:Name>'.$key.'</mem:Name>
        <mem:Value>'.$value.'</mem:Value>
        </mem:FieldMetadata>';  
       }
      }
     
      $body = '<s:Body>
                    <ConvertLead xmlns="http://membersuite.com/contracts">
                    <leadID>'.$leadID.'</leadID>
                    <newOwnerID>'.$newOwnerID.'</newOwnerID>
                    <sendEmailToNewOwner>'.$sendEmailToNewOwner.'</sendEmailToNewOwner>
                    <entityNameOrID>'.$entityNameOrID.'</entityNameOrID>
                    <createIndividualRecord>'.$createIndividualRecord.'</createIndividualRecord>
                    <relationshipTypeID>'.$relationshipTypeID.'</relationshipTypeID>
                    <opportunityNameOrID>'.$opportunityNameOrID.'</opportunityNameOrID>
                    <msoFollowUpActivity>
                    <mem:ClassType>'.$msoFollowUpActivity->ClassType.'</mem:ClassType>
                    <mem:Fields>
                    '.$activity.'
                    </mem:Fields>
                    </msoFollowUpActivity>
                    </ConvertLead>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ConvertLead');
    return $this->api->createobject($response,'ConvertLead'); 
  }
  
  public function GetAvailableAssociationTemplatesRequest($accesskey,$associationid,$secreteaccessid){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetAvailableAssociationTemplates',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     //This method do not require body Tag
     // Create Response
    
    $response = $this->api->SendSoapRequest($apirequestheaders,$method='GetAvailableAssociationTemplates');
    return $this->api->createobject($response,'GetAvailableAssociationTemplates'); 
  }
  
  public function ProvisionAssociationRequest($accesskey,$associationid,$secreteaccessid,$sourceAssociationID,$msoAssociation,$confirmationEmail,$includeData){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ProvisionAssociation',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $association = '';
     foreach($msoAssociation as $key=>$value){
       if($key<>'ClassType'){ 
      $association.= '<mem:FieldMetadata>
        <mem:Name>'.$key.'</mem:Name>
        <mem:Value>'.$value.'</mem:Value>
        </mem:FieldMetadata>';  
       }
      }
      $body = '<s:Body>
                    <ProvisionAssociation xmlns="http://membersuite.com/contracts">
                    <sourceAssociationID>'.$sourceAssociationID.'</sourceAssociationID>
                    <msoAssociation><mem:ClassType>'.$msoAssociation->ClassType.'</mem:ClassType>
                    <mem:Fields>
                    '.$association.'
                    </mem:Fields>
                    </msoAssociation>
                    <confirmationEmail>'.$confirmationEmail.'</confirmationEmail>
                    <includeData>'.$includeData.'</includeData>
                    </ProvisionAssociation>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ProvisionAssociation');
    return $this->api->createobject($response,'ProvisionAssociation'); 
  }
  
  public function MoveAssociationRequest($accesskey,$associationid,$secreteaccessid,$sourceAssociationID,$destinationDatabase){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='MoveAssociation',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <MoveAssociation xmlns="http://membersuite.com/contracts">
                    <sourceAssociationID>'.$sourceAssociationID.'</sourceAssociationID>
                    <destinationDatabase>'.$destinationDatabase.'</destinationDatabase>
                    </MoveAssociation>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='MoveAssociation');
    return $this->api->createobject($response,'MoveAssociation'); 
  }
  
  public function ObliterateAssociationRequest($accesskey,$associationid,$secreteaccessid,$associationID){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ObliterateAssociation',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <ObliterateAssociation xmlns="http://membersuite.com/contracts">
                    <associationID>'.$associationID.'</associationID>
                    </ObliterateAssociation>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ObliterateAssociation');
    return $this->api->createobject($response,'ObliterateAssociation'); 
  }
  
  public function GetDatabaseServersRequest($accesskey,$associationid,$secreteaccessid){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetDatabaseServers',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     // This Method do not require body tag
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequestheaders,$method='GetDatabaseServers');
    return $this->api->createobject($response,'GetDatabaseServers'); 
  }
  
  public function ListAllReportsRequest($accesskey,$associationid,$secreteaccessid){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ListAllReports',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     // This Method do not require body tag
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequestheaders,$method='ListAllReports');
    return $this->api->createobject($response,'ListAllReports'); 
  }
  
  public function GetReportInformationRequest($accesskey,$associationid,$secreteaccessid,$reportName){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetReportInformation',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetReportInformation xmlns="http://membersuite.com/contracts">
                    <reportName>'.$reportName.'</reportName>
                    </GetReportInformation>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetReportInformation');
    return $this->api->createobject($response,'GetReportInformation'); 
  }
  
  public function GetAllChartsRequest($accesskey,$associationid,$secreteaccessid){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetAllCharts',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     // This method do not require body tag 
    
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequestheaders,$method='GetAllCharts');
    return $this->api->createobject($response,'GetAllCharts'); 
  }
  
  public function GetAllKPIDefinitionsRequest($accesskey,$associationid,$secreteaccessid){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetAllKPIDefinitions',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     // This method do not require body tag 
    
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequestheaders,$method='GetAllKPIDefinitions');
    return $this->api->createobject($response,'GetAllKPIDefinitions'); 
  }
  
  public function GetAllWidgetDefinitionsRequest($accesskey,$associationid,$secreteaccessid){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetAllWidgetDefinitions',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     // This method do not require body tag 
    
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequestheaders,$method='GetAllWidgetDefinitions');
    return $this->api->createobject($response,'GetAllWidgetDefinitions'); 
  }
  
  public function BuildChartRequest($accesskey,$associationid,$secreteaccessid,$chartName,$context){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='BuildChart',$accesskey,$associationid,$secreteaccessid);
     
      // Construct Body
      $body = '<s:Body>
                    <BuildChart xmlns="http://membersuite.com/contracts">
                    <chartName>'.$chartName.'</chartName>
                    <context>'.$context.'</context>
                    </BuildChart>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
     // This method do not require body tag 
    
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='BuildChart');
    return $this->api->createobject($response,'BuildChart'); 
  }
  
  public function RenderReportRequest($accesskey,$associationid,$secreteaccessid,$manifest){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='RenderReport',$accesskey,$associationid,$secreteaccessid);
     
      // Construct Body
      $body = '<s:Body>
                    <RenderReport xmlns="http://membersuite.com/contracts">
                    <manifest xmlns:d="http://schemas.datacontract.org/2004/07/MemberSuite.SDK.Manifests.Reporting">
                    <d:ReportSpecificationName>'.$manifest->ReportSpecificationName.'</d:ReportSpecificationName>
                    </manifest>
                    </RenderReport>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
     // This method do not require body tag 
    
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='RenderReport');
    return $this->api->createobject($response,'RenderReport'); 
  }
  
  public function LoadReportDefinitionRequest($accesskey,$associationid,$secreteaccessid,$manifest){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='LoadReportDefinition',$accesskey,$associationid,$secreteaccessid);
     
      // Construct Body
      $body = '<s:Body>
                    <LoadReportDefinition xmlns="http://membersuite.com/contracts">
                    <manifest xmlns:d="http://schemas.datacontract.org/2004/07/MemberSuite.SDK.Manifests.Reporting">
                    <d:ReportSpecificationName>'.$manifest.'</d:ReportSpecificationName>
                    </manifest>
                    </LoadReportDefinition>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
     // This method do not require body tag 
    
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='LoadReportDefinition');
    return $this->api->createobject($response,'LoadReportDefinition'); 
  }
  
  public function GetKPIsRequest($accesskey,$associationid,$secreteaccessid,$kpisToRun){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetKPIs',$accesskey,$associationid,$secreteaccessid);
     
      // Construct Body
     $kpi='';
     foreach($kpisToRun as $kpisToRun)
     {
      $kpi.='<Name>'.$kpisToRun.'</Name>';
     }
      $body = '<s:Body>
                    <GetKPIs xmlns="http://membersuite.com/contracts">
                    <kpisToRun>
                    '.$kpi.'
                    </kpisToRun>
                    </GetKPIs>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
     // This method do not require body tag 
    
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetKPIs');
    return $this->api->createobject($response,'GetKPIs'); 
  }
  
  
}
?>