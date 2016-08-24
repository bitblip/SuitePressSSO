<?php
/*
 This class is used for calling different category methods like database and metadata.
 Created Date: 03/April/2013
 Created By: SmartdataInc.
*/
include_once('Concierge.php');

class Data extends Concierge{
  private $debug = false;
  
  public function __construct(){
   // Create object of the concierge class
    $this->api = new Concierge();
  }
  
  public function SerializeObject($parentTag, $mso) {
	$objectarr = $this->object_to_array($mso);
	return '<mem:'.$parentTag.' '.Config::Read('BaseNamespaces').'>'.$this->build_msnode($objectarr).'</mem:'.$parentTag.'>'; 
  }
  
  public function FromClassMetadata($resultobject)
  {
    $metadataarray = array();
        
    $responsearr = $this->object_to_array($resultobject);
        
    $metadataarray['ClassType'] = $responsearr['Name'];
        
    if($responsearr['bFields']['bFieldMetadata'])
    $resultset = $responsearr['bFields']['bFieldMetadata'];
    else if($responsearr['bFields']['bKeyValueOfstringanyType'])
    $resultset = $responsearr['bFields']['bKeyValueOfstringanyType'];
        
    foreach($resultset as $key)
    {
        $metadataarray[$key['bName']] = $key['bDefaultValue'];
    }
    return $metadataarray;
  }
    
  // function to save data
  public function SaveDataRequest($accesskey,$associationid,$secreteaccessid,$object){
    // Get file content
    $filecontent = $this->api->GetFormat();
    if($filecontent=='Error')
    {
      $errormsg = 'API Request can not be generated';
      return false;
    }
    // Create API Request Headers
    $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='Save',$accesskey,$associationid,$secreteaccessid);
    $objectarr = $this->object_to_array($object);
    $objecttype = $this->build_msnode($objectarr);  
    
    $body = '<s:Body>
                    <Save xmlns="http://membersuite.com/contracts">
                    <objectToSave>
                    '.$objecttype.'
                    </objectToSave>
                    </Save>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    
    if ($this->debug) echo 'SAVE REQUEST<br>'.$apirequest.'<br><br>';
    
    // Create Response
    $getsaveResult = $this->api->SendSoapRequest($apirequest,$method='Save');
   
    if ($this->debug) echo 'SAVE RESULT<br>'.$getsaveResult.'<br><br>';
    
    return $this->api->createobject($getsaveResult,'Save'); 
  }
  
  public function GetDataRequest($accesskey,$associationid,$secreteaccessid,$Id){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='Get',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     
     $body = '<s:Body>
                    <Get xmlns="http://membersuite.com/contracts">
                    <id>'.$Id.'</id>
                    </Get>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='Get');
    return $this->api->createobject($getResult,'Get'); 
  }
  
  public function GetObject($accesskey,$associationid,$secreteaccessid,$Id){
      $response = $this->GetDataRequest($accesskey,$associationid,$secreteaccessid,$Id);
      if ($response->aSuccess == 'true')
      {    	
    	  $obj = $this->build_msobject($response->aResultValue); 
		    return $obj;
  	  } else {
		    throw new Exception("Could not find object Id=".$Id);
	  }	
  }
  
  public function ConvertToObject($data){
    $obj = $this->build_msobject($data); 
		return $obj;
  }
  
  public function RecordJobRequest($accesskey,$associationid,$secreteaccessid,$jobID,$additionalLogText,$newStatus){
    // Get file content
    
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='RecordJobProgress',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     
     $body = '<s:Body>
                    <RecordJobProgress xmlns="http://membersuite.com/contracts">
                    <jobID>'.$jobID.'</jobID>
                    <additionalLogText>'.$additionalLogText.'</additionalLogText>
                    <newStatus>'.$newStatus.'</newStatus>
                    </RecordJobProgress>
                    </s:Body>
                    ';
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='RecordJobProgress');
    
    return $this->api->createobject($getResult,'RecordJobProgress'); 
  }
  
  public function DataQuery($accesskey,$associationid,$secreteaccessid,$objectType,$whereClause,$orderBy,$startIndex){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='Query',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
 
     $body = '<s:Body>
                    <Query xmlns="http://membersuite.com/contracts">
                    <objectType>'.$objectType.'</objectType>
                    <whereClause>'.$whereClause.'</whereClause>
                    <orderBy>'.$orderBy.'</orderBy>
                    <startIndex>'.$startIndex.'</startIndex>
                    </Query>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='Query');
    return $this->api->createobject($getResult,'Query'); 
    
  }
  
  public function DataQuerySingle($accesskey,$associationid,$secreteaccessid,$objectType,$whereClause){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='QuerySingle',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
 
     $body = '<s:Body>
                    <QuerySingle xmlns="http://membersuite.com/contracts">
                    <objectType>'.$objectType.'</objectType>
                    <whereClause>'.$whereClause.'</whereClause>
                    </QuerySingle>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='QuerySingle');
    return $this->api->createobject($getResult,'QuerySingle'); 
    
  }
  
  public function DownloadFileRequest($accesskey,$associationid,$secreteaccessid,$fileID){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='DownloadFile',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
 
     $body = '<s:Body>
                    <DownloadFile xmlns="http://membersuite.com/contracts">
                    <fileID>'.$fileID.'</fileID>
                    </DownloadFile>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='DownloadFile');
    return $this->api->createobject($getResult,'DownloadFile'); 
    
  }
  
  public function GetNameRequest($accesskey,$associationid,$secreteaccessid,$recordID){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetName',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
 
     $body = '<s:Body>
                    <GetName xmlns="http://membersuite.com/contracts">
                    <recordID>'.$fileID.'</recordID>
                    </GetName>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='GetName');
    return $this->api->createobject($getResult,'GetName'); 
    
  }
  
  public function GetNamesRequest($accesskey,$associationid,$secreteaccessid,$recordID){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetNames',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $string = '';
     foreach($recordID as $recordID)
     {
      $string.='<string>'.$recordID.'</string>';
     }
     
     $body = '<s:Body>
                    <GetNames xmlns="http://membersuite.com/contracts">
                    <recordID>'.$string.'</recordID>
                    </GetNames>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='GetNames');
    return $this->api->createobject($getResult,'GetNames'); 
    
  }
  
  public function DeleteRecord($accesskey,$associationid,$secreteaccessid,$id){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='Delete',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <Delete xmlns="http://membersuite.com/contracts">
                    <id>'.$id.'</id>
                    </Delete>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='Delete');
    return $this->api->createobject($getResult,'Delete'); 
    
  }
  
  public function GetAutoNumberSeedInfoRequest($accesskey,$associationid,$secreteaccessid,$objectName){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetAutoNumberSeedInfo',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <GetAutoNumberSeedInfo xmlns="http://membersuite.com/contracts">
                    <objectName>'.$objectName.'</objectName>
                    </GetAutoNumberSeedInfo>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='GetAutoNumberSeedInfo');
    return $this->api->createobject($getResult,'GetAutoNumberSeedInfo'); 
    
  }
  
  public function UpdateAutoNumberSeedRequest($accesskey,$associationid,$secreteaccessid,$objectName,$newSeed){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='UpdateAutoNumberSeed',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $body = '<s:Body>
                    <UpdateAutoNumberSeed xmlns="http://membersuite.com/contracts">
                    <objectName>'.$objectName.'</objectName>
                    <newSeed>'.$newSeed.'</newSeed>
                    </UpdateAutoNumberSeed>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='UpdateAutoNumberSeed');
    return $this->api->createobject($getResult,'UpdateAutoNumberSeed'); 
    
  }
  
  public function MergeRequest($accesskey,$associationid,$secreteaccessid,$source,$destination,$sourceFieldsToUse){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='Merge',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $sourcefield = '';
     foreach($sourceFieldsToUse as $sourceFieldsToUse)
     {
      $sourcefield.='<c:string>'.$sourceFieldsToUse.'</c:string>';
     }
     
     $body = '<s:Body>
                    <Merge xmlns="http://membersuite.com/contracts">
                    <source>'.$source.'</source>
                    <destination>'.$destination.'</destination>
                    <sourceFieldsToUse xmlns:c="http://schemas.microsoft.com/2003/10/Serialization/Arrays">'.$sourcefield.'</sourceFieldsToUse>
                    </Merge>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='Merge');
    return $this->api->createobject($getResult,'Merge'); 
    
  }
  
  public function ValidateMultipleAddressesRequest($accesskey,$associationid,$secreteaccessid,$entityIdentifiers){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ValidateMultipleAddresses',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     
     $entity='';
     foreach($entityIdentifiers as $entityIdentifiers)
     {
      $entity.='<string>'.$entityIdentifiers.'</string>';
     }
     
     $body = '<s:Body>
                    <ValidateMultipleAddresses xmlns="http://membersuite.com/contracts">
                    <entityIdentifiers xmlns="http://schemas.microsoft.com/2003/10/Serialization/Arrays">'.$entity.'</entityIdentifiers>
                    </ValidateMultipleAddresses>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='ValidateMultipleAddresses');
    return $this->api->createobject($getResult,'ValidateMultipleAddresses'); 
    
  }
  
  public function MassUpdateRequest($accesskey,$associationid,$secreteaccessid,$recordType,$recordIdentifiers,$msoNewValues){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='MassUpdate',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $objectarr = $this->object_to_array($msoNewValues);
     $objecttype = $this->build_msnode($objectarr);  
     
     $record='';
     foreach($recordIdentifiers as $recordIdentifiers)
     {
      $record.='<string>'.$recordIdentifiers.'</string>';
     }
     
     $body = '<s:Body>
                    <MassUpdate xmlns="http://membersuite.com/contracts">
                    <recordType>'.$recordType.'</recordType>
                    <recordIdentifiers>'.$record.'</recordIdentifiers>
                    <msoNewValues>'.$objecttype.'</msoNewValues>
                    </MassUpdate>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='MassUpdate');
    return $this->api->createobject($getResult,'MassUpdate'); 
    
  }
  
  public function MassDeleteRequest($accesskey,$associationid,$secreteaccessid,$recordType,$recordIdentifiers){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='MassDelete',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $record='';
     foreach($recordIdentifiers as $recordIdentifiers)
     {
      $record.='<string>'.$recordIdentifiers.'</string>';
     }
     
     $body = '<s:Body>
                    <MassDelete xmlns="http://membersuite.com/contracts">
                    <recordType>'.$recordType.'</recordType>
                    <recordIdentifiers>'.$record.'</recordIdentifiers>
                    </MassDelete>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='MassDelete');
    return $this->api->createobject($getResult,'MassDelete'); 
    
  }
  
  public function MassAssignEntitlementsRequest($accesskey,$associationid,$secreteaccessid,$msoEntitlement,$idsToAssign){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='MassAssignEntitlements',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $ids='';
     foreach($idsToAssign as $idsToAssign)
     {
      $ids.='<string>'.$idsToAssign.'</string>';
     }
     $objectarr = $this->object_to_array($msoEntitlement);
     $objecttype = $this->build_msnode($objectarr);  
     
     $body = '<s:Body>
                    <MassAssignEntitlements xmlns="http://membersuite.com/contracts">
                    <msoEntitlement>
                    '.$objecttype.'
                    </msoEntitlement>
                    <idsToAssign>'.$ids.'</idsToAssign>
                    </MassAssignEntitlements>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='MassAssignEntitlements');
    return $this->api->createobject($getResult,'MassAssignEntitlements'); 
    
  }
  
  public function RecordErrorAuditLogRequest($accesskey,$associationid,$secreteaccessid,$msoErrorAuditLog){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='RecordErrorAuditLog',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
    
     $objectarr = $this->object_to_array($msoErrorAuditLog);
     $objecttype = $this->build_msnode($objectarr);  
     
     $body = '<s:Body>
                    <RecordErrorAuditLog xmlns="http://membersuite.com/contracts">
                    <msoErrorAuditLog>
                    '.$objecttype.'
                    </msoErrorAuditLog>
                    </RecordErrorAuditLog>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='RecordErrorAuditLog');
    return $this->api->createobject($getResult,'RecordErrorAuditLog'); 
    
  }
  
  public function ValidateAddressRequest($accesskey,$associationid,$secreteaccessid,$addressToValidate){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ValidateAddress',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $addressvalidate = $this->object_to_array($addressToValidate);
     $address='';
     foreach($addressvalidate as $key=>$value)
     {
      $address.='<'.$key.'>'.$value.'</'.$key.'>';
     }
     
     $body = '<s:Body>
                    <ValidateAddress xmlns="http://membersuite.com/contracts">
                    <addressToValidate>
                    '.$address.'
                    </addressToValidate>
                    </ValidateAddress>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='ValidateAddress');
    return $this->api->createobject($getResult,'ValidateAddress'); 
    
  }
  
  public function PopulateCityStateFromPostalCodeRequest($accesskey,$associationid,$secreteaccessid,$addressToProcess){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='PopulateCityStateFromPostalCode',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $addressvalidate = $this->object_to_array($addressToProcess);
     $address='';
     foreach($addressvalidate as $key=>$value)
     {
      $address.='<'.$key.'>'.$value.'</'.$key.'>';
     }
     
     $body = '<s:Body>
                    <PopulateCityStateFromPostalCode xmlns="http://membersuite.com/contracts">
                    <addressToProcess>
                    '.$address.'
                    </addressToProcess>
                    </PopulateCityStateFromPostalCode>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='PopulateCityStateFromPostalCode');
    return $this->api->createobject($getResult,'PopulateCityStateFromPostalCode'); 
    
  }
  
  public function GetDefaultDuplicateDetectionRulesRequest($accesskey,$associationid,$secreteaccessid,$recordType){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetDefaultDuplicateDetectionRules',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $addressvalidate = $this->object_to_array($addressToProcess);
     $address='';
     foreach($addressvalidate as $key=>$value)
     {
      $address.='<'.$key.'>'.$value.'</'.$key.'>';
     }
     
     $body = '<s:Body>
                    <GetDefaultDuplicateDetectionRules xmlns="http://membersuite.com/contracts">
                    <recordType>'.$recordType.'</recordType>
                    </GetDefaultDuplicateDetectionRules>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='GetDefaultDuplicateDetectionRules');
    return $this->api->createobject($getResult,'GetDefaultDuplicateDetectionRules'); 
    
  }
  
  public function GetObjectBySearchRequest($accesskey,$associationid,$secreteaccessid,$searchToUse,$fieldToUseAsObjectIdentifier='ID'){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetObjectBySearch',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $search = '';
    $criteria='';
    $grouptype='';
    $search= $this->api->createsearch($searchToUse);
    
    
    $objectidentyfier = $fieldToUseAsObjectIdentifier==''?'ID':$fieldToUseAsObjectIdentifier;
    
     $body = '<s:Body>
                    <GetObjectBySearch xmlns="http://membersuite.com/contracts">
                    <searchToUse>'.$search.'</searchToUse>
                    <fieldToUseAsObjectIdentifier>'.$objectidentyfier.'</fieldToUseAsObjectIdentifier>
                    </GetObjectBySearch>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='GetObjectBySearch');
    return $this->api->createobject($getResult,'GetObjectBySearch'); 
    
  }
  
  public function GetObjectsBySearchRequest($accesskey,$associationid,$secreteaccessid,$searchToUse,$fieldToUseAsObjectIdentifier='ID',$startRecord,$maximumNumberOfRecordsToReturn){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetObjectsBySearch',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $search = '';
    $criteria='';
    $grouptype='';
    $search= $this->api->createsearch($searchToUse);
    
    $objectidentyfier = $fieldToUseAsObjectIdentifier==''?'ID':$fieldToUseAsObjectIdentifier;
     $body = '<s:Body>
                    <GetObjectsBySearch xmlns="http://membersuite.com/contracts">
                    <searchToUse>'.$search.'</searchToUse>
                    <fieldToUseAsObjectIdentifier>'.$objectidentyfier.'</fieldToUseAsObjectIdentifier>
                    <startRecord>'.$startRecord.'</startRecord>
                    <maximumNumberOfRecordsToReturn>'.$maximumNumberOfRecordsToReturn.'</maximumNumberOfRecordsToReturn>
                    </GetObjectsBySearch>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='GetObjectsBySearch');
    return $this->api->createobject($getResult,'GetObjectsBySearch'); 
    
  }
  
  public function FindPotentialDuplicatesRequest($accesskey,$associationid,$secreteaccessid,$mso,$ruleIDs,$spec,$startRecord,$pageSize){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='FindPotentialDuplicates',$accesskey,$associationid,$secreteaccessid);
     // Construct Body
     $search = '';
      $search= $this->api->createsearch($spec);
      $ruleID='';
      
      foreach($ruleIDs as $ruleIDs)
      {
        $ruleID.='<c:string>'.$ruleIDs.'</c:string>';
      }
      
      $objectarr = $this->object_to_array($mso);
     $objecttype = '';
     foreach($objectarr as $key=>$value){
      $objecttype.= '<mem:'.$key.'>'.$value.'</mem:'.$key.'>';
      }
      
     $body = '<s:Body>
                    <FindPotentialDuplicates xmlns="http://membersuite.com/contracts">
                    <mso>'.$objecttype.'</mso>
                    <ruleIDs xmlns:c="http://schemas.microsoft.com/2003/10/Serialization/Arrays">'.$ruleID.'</ruleIDs>
                    <spec>'.$search.'</spec>
                    <startRecord>'.$startRecord.'</startRecord>
                    <pageSize>'.$pageSize.'</pageSize>
                    </FindPotentialDuplicates>
                    </s:Body>
                    ';
    // Replace strings
         
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $getResult = $this->api->SendSoapRequest($apirequest,$method='FindPotentialDuplicates');
    return $this->api->createobject($getResult,'FindPotentialDuplicates');
  }
}
?>