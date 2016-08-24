<?php
/*
 Created Date: 1/May/2013
 Created By: SmartdataInc.
*/
include_once('Concierge.php');

class Fundraising extends Concierge{
  
  public function __construct(){
   
   // Create object of the concierge class
    $this->api = new Concierge();
  }
 
  public function GenerateDonorRequest($accesskey,$associationid,$secreteaccessid,$GiftID,$logActivity){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GenerateDonorAcknowledgmentLetter',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GenerateDonorAcknowledgmentLetter xmlns="http://membersuite.com/contracts">
                    <GiftID>'.$GiftID.'</GiftID>
                    <logActivity>'.$logActivity.'</logActivity>
                    </GenerateDonorAcknowledgmentLetter>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GenerateDonorAcknowledgmentLetter');
    return $this->api->createobject($response,'GenerateDonorAcknowledgmentLetter'); 
  }
  
  public function GenerateDonorsRequest($accesskey,$associationid,$secreteaccessid,$GiftID,$logActivity){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GenerateDonorAcknowledgmentLetters',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $Giftid = '';
     foreach($GiftID as $GiftID)
     {
        $Giftid.='<string>'.$GiftID.'</string>';
     }
     
     $LogActivity = '';
     foreach($logActivity as $logActivity)
     {
        $LogActivity.='<string>'.$logActivity.'</string>';
     }
     
     
      $body = '<s:Body>
                    <GenerateDonorAcknowledgmentLetters xmlns="http://membersuite.com/contracts">
                    <GiftID>'.$Giftid.'</GiftID>
                    <logActivity>'.$LogActivity.'</logActivity>
                    </GenerateDonorAcknowledgmentLetters>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GenerateDonorAcknowledgmentLetters');
    return $this->api->createobject($response,'GenerateDonorAcknowledgmentLetters'); 
  }
  
   public function GenerateDonorReceiptRequest($accesskey,$associationid,$secreteaccessid,$GiftID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GenerateDonorReceipt',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GenerateDonorReceipt xmlns="http://membersuite.com/contracts">
                    <GiftID>'.$GiftID.'</GiftID>
                    </GenerateDonorReceipt>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GenerateDonorReceipt');
    return $this->api->createobject($response,'GenerateDonorReceipt'); 
  }
  
  public function GenerateDonorReceiptsRequest($accesskey,$associationid,$secreteaccessid,$listOfGifts){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GenerateDonorReceipts',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $giftid = '';
     foreach($listOfGifts as $GiftID)
     {
      $giftid.='<string>'.$GiftID.'</string>';
     }
     
      $body = '<s:Body>
                    <GenerateDonorReceipts xmlns="http://membersuite.com/contracts">
                    <listOfGifts>'.$giftid.'</listOfGifts>
                    </GenerateDonorReceipts>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GenerateDonorReceipts');
    return $this->api->createobject($response,'GenerateDonorReceipts'); 
  }
  
  public function VoidGiftRequest($accesskey,$associationid,$secreteaccessid,$giftIdToVoid){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='VoidGift',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <VoidGift xmlns="http://membersuite.com/contracts">
                    <giftIdToVoid>'.$giftIdToVoid.'</giftIdToVoid>
                    </VoidGift>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='VoidGift');
    return $this->api->createobject($response,'VoidGift'); 
  }
  
  public function ProcessPremiumsRequest($accesskey,$associationid,$secreteaccessid,$giftToProcess,$batchID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ProcessPremiums',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <ProcessPremiums xmlns="http://membersuite.com/contracts">
                    <giftToProcess>'.$giftToProcess.'</giftToProcess>
                    <batchID>'.$batchID.'</batchID>
                    </ProcessPremiums>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ProcessPremiums');
    return $this->api->createobject($response,'ProcessPremiums'); 
  }
  
  public function GetZipCodesRequest($accesskey,$associationid,$secreteaccessid,$zipCode,$radiusInMiles){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetZipCodesWithinSpecifiedRadiusByZip',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetZipCodesWithinSpecifiedRadiusByZip xmlns="http://membersuite.com/contracts">
                    <zipCode>'.$zipCode.'</zipCode>
                    <radiusInMiles>'.$radiusInMiles.'</radiusInMiles>
                    </GetZipCodesWithinSpecifiedRadiusByZip>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetZipCodesWithinSpecifiedRadiusByZip');
    return $this->api->createobject($response,'GetZipCodesWithinSpecifiedRadiusByZip'); 
  }
  
  public function GetZipCodesbyCityRequest($accesskey,$associationid,$secreteaccessid,$city,$twoLetterState,$radiusInMiles){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetZipCodesWithinSpecifiedRadiusByCityState',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetZipCodesWithinSpecifiedRadiusByCityState xmlns="http://membersuite.com/contracts">
                    <city>'.$city.'</city>
                    <twoLetterState>'.$twoLetterState.'</twoLetterState>
                    <radiusInMiles>'.$radiusInMiles.'</radiusInMiles>
                    </GetZipCodesWithinSpecifiedRadiusByCityState>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetZipCodesWithinSpecifiedRadiusByCityState');
    return $this->api->createobject($response,'GetZipCodesWithinSpecifiedRadiusByCityState'); 
  }
  
  public function CreateGiftRequest($accesskey,$associationid,$secreteaccessid,$msoGiftToCreate){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='CreateGift',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($msoGiftToCreate);
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
                    <CreateGift xmlns="http://membersuite.com/contracts">
                    <msoGiftToCreate>
                    <mem:ClassType>'.$objectarr['ClassType'].'</mem:ClassType>
                    <mem:Fields>
                    '.$objecttype.'
                    </mem:Fields>
                    </msoGiftToCreate>
                    </CreateGift>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='CreateGift');
    return $this->api->createobject($response,'CreateGift'); 
  }
  
  public function EditGiftRequest($accesskey,$associationid,$secreteaccessid,$msoGiftToEdit){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='EditGift',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($msoGiftToEdit);
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
                    <EditGift xmlns="http://membersuite.com/contracts">
                    <msoGiftToEdit>
                    <mem:ClassType>'.$objectarr['ClassType'].'</mem:ClassType>
                    <mem:Fields>
                    '.$objecttype.'
                    </mem:Fields>
                    </msoGiftToEdit>
                    </EditGift>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='EditGift');
    return $this->api->createobject($response,'EditGift'); 
  }
}
?>