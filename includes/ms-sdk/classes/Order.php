<?php
/*
 Created Date: 7/May/2013
 Created By: SmartdataInc.
*/
include_once('Concierge.php');

class Order extends Concierge{
  
  public function __construct(){
   
   // Create object of the concierge class
    $this->api = new Concierge();
  }
  
  public function GetPriorityConfiguration($accesskey,$associationid,$secreteaccessid,$entityID){
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetPriorityConfiguration',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetPriorityConfiguration xmlns="http://membersuite.com/contracts">
                    <entityID>'.$entityID.'</entityID>
                    </GetPriorityConfiguration>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
	
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='GetPriorityConfiguration');
    return $this->api->createobject($response,'GetPriorityConfiguration'); 
  }
  
  // Get File Cabinet Request
  public function VoidOrderRequest($accesskey,$associationid,$secreteaccessid,$orderID){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='VoidOrder',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <VoidOrder xmlns="http://membersuite.com/contracts">
                    <orderID>'.$orderID.'</orderID>
                    </VoidOrder>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='VoidOrder');
    return $this->api->createobject($response,'VoidOrder'); 
  }
  
  // Get File Cabinet Request
  public function GetOrderFormForProductRequest($accesskey,$associationid,$secreteaccessid,$productID){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetOrderFormForProduct',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetOrderFormForProduct xmlns="http://membersuite.com/contracts">
                    <productID>'.$productID.'</productID>
                    </GetOrderFormForProduct>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetOrderFormForProduct');
    return $this->api->createobject($response,'GetOrderFormForProduct'); 
  }
  
  // Get File Cabinet Request
  public function CheckLongRunningTaskStatusRequest($accesskey,$associationid,$secreteaccessid,$taskInfo){
    
    // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='CheckLongRunningTaskStatus',$accesskey,$associationid,$secreteaccessid);
     	 
     // Construct Body
      $body = '<s:Body>
                    <CheckLongRunningTaskStatus xmlns="http://membersuite.com/contracts">
                    <info><mem:RunID>'.$taskInfo->bRunID.'</mem:RunID><mem:WorkflowID>'.$taskInfo->bWorkflowID.'</mem:WorkflowID></info>
                    </CheckLongRunningTaskStatus>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='CheckLongRunningTaskStatus');
    return $this->api->createobject($response,'CheckLongRunningTaskStatus'); 
  }
  
  // Get File Cabinet Request
  public function UpdateOrderBillingInfoRequest($accesskey,$associationid,$secreteaccessid,$orderID,$ccNumber,$ccvCode,$expDate,$billingAddress){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='UpdateOrderBillingInfo',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $address='';
     if($billingAddress)
     {
     foreach($billingAddress as $key=>$value)
     {
      $address.='<'.$key.'>'.$value.'</'.$key.'>';
     }
     }
      $body = '<s:Body>
                    <UpdateOrderBillingInfo xmlns="http://membersuite.com/contracts">
                    <orderID>'.$orderID.'</orderID>
                    <ccNumber>'.$ccNumber.'</ccNumber>
                    <ccvCode>'.$ccvCode.'</ccvCode>
                    <expDate>'.$expDate.'</expDate>
                    <billingAddress>'.$address.'</billingAddress>
                    </UpdateOrderBillingInfo>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='UpdateOrderBillingInfo');
    return $this->api->createobject($response,'UpdateOrderBillingInfo'); 
  }
  
  // Get File Cabinet Request
  public function UpdateInvoiceBillingInfoRequest($accesskey,$associationid,$secreteaccessid,$invoiceID,$poNumber,$billingEmailAddress,$billingAddress){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='UpdateInvoiceBillingInfo',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $address='';
     if($billingAddress)
     {
     foreach($billingAddress as $key=>$value)
     {
      $address.='<'.$key.'>'.$value.'</'.$key.'>';
     }
     }
      $body = '<s:Body>
                    <UpdateInvoiceBillingInfo xmlns="http://membersuite.com/contracts">
                    <invoiceID>'.$invoiceID.'</invoiceID>
                    <poNumber>'.$poNumber.'</poNumber>
                    <billingEmailAddress>'.$billingEmailAddress.'</billingEmailAddress>
                    <billingAddress>'.$address.'</billingAddress>
                    </UpdateInvoiceBillingInfo>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='UpdateInvoiceBillingInfo');
    return $this->api->createobject($response,'UpdateInvoiceBillingInfo'); 
  }
  
  // Get File Cabinet Request
  public function ProcessFulfillmentBatchRequest($accesskey,$associationid,$secreteaccessid,$fulfillmentBatchID){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ProcessFulfillmentBatch',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <ProcessFulfillmentBatch xmlns="http://membersuite.com/contracts">
                    <fulfillmentBatchID>'.$fulfillmentBatchID.'</fulfillmentBatchID>
                    </ProcessFulfillmentBatch>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ProcessFulfillmentBatch');
    return $this->api->createobject($response,'ProcessFulfillmentBatch'); 
  }
  
  // Get File Cabinet Request
  public function GenerateRenewalOrderRequest($accesskey,$associationid,$secreteaccessid,$targetID){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GenerateRenewalOrder',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GenerateRenewalOrder xmlns="http://membersuite.com/contracts">
                    <targetID>'.$targetID.'</targetID>
                    </GenerateRenewalOrder>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GenerateRenewalOrder');
    return $this->api->createobject($response,'GenerateRenewalOrder'); 
  }
  
  // Get File Cabinet Request
  public function FulfillOrderRequest($accesskey,$associationid,$secreteaccessid,$orderID,$itemsToFulfill){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='FulfillOrder',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $item = '';
     if($itemsToFulfill)
     {
      foreach($itemsToFulfill as $itemsToFulfill)
      {
        $item.='<string>'.$itemsToFulfill.'</string>';
      }
     }
      $body = '<s:Body>
                    <FulfillOrder xmlns="http://membersuite.com/contracts">
                    <orderID>'.$orderID.'</orderID>
                    <itemsToFulfill>'.$item.'</itemsToFulfill>
                    </FulfillOrder>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='FulfillOrder');
    return $this->api->createobject($response,'FulfillOrder'); 
  }
  
  // Get File Cabinet Request
  public function ShipOrderRequest($accesskey,$associationid,$secreteaccessid,$orderID,$itemsToShip,$shipDate,$shippingMethod,$trackingNumber){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ShipOrder',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $item='';
     if($itemsToShip)
     {
      foreach($itemsToShip as $itemsToShip)
      {
        $item.='<string>'.$itemsToShip.'</string>';
      }
     }
     
      $body = '<s:Body>
                    <ShipOrder xmlns="http://membersuite.com/contracts">
                    <orderID>'.$orderID.'</orderID>
                    <itemsToShip>'.$item.'</itemsToShip>
                    <shipDate>'.$shipDate.'</shipDate>
                    <shippingMethod>'.$shippingMethod.'</shippingMethod>
                    <trackingNumber>'.$trackingNumber.'</trackingNumber>
                    </ShipOrder>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ShipOrder');
    return $this->api->createobject($response,'ShipOrder'); 
  }
  
  // Get File Cabinet Request
  public function BillOrderRequest($accesskey,$associationid,$secreteaccessid,$orderID){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='BillOrder',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <BillOrder xmlns="http://membersuite.com/contracts">
                    <orderID>'.$orderID.'</orderID>
                    </BillOrder>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='BillOrder');
    return $this->api->createobject($response,'BillOrder'); 
  }
  
  public function GetOrderFormRequest($accesskey,$associationid,$secreteaccessid,$order){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetOrderForm',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($order);
     $objecttype = $this->build_msnode($objectarr);  
      $body = '<s:Body>
                    <GetOrderForm xmlns="http://membersuite.com/contracts">
                    <order>
                    '.$objecttype.'
                    </order>
                    </GetOrderForm>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetOrderForm');
    return $this->api->createobject($response,'GetOrderForm'); 
  }
  
  public function ProcessOrderRequest($accesskey,$associationid,$secreteaccessid,$msOrderToProcess,$antiDuplicationKey=""){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ProcessOrder',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($msOrderToProcess);
     $objecttype = $this->build_msnode($objectarr);  
      $body = '<s:Body>
                    <ProcessOrder xmlns="http://membersuite.com/contracts">
                    <msOrder>
                    '.$objecttype.'
                    </msOrder>
                    </ProcessOrder>
                    </s:Body>
                    ';
					
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ProcessOrder');
    return $this->api->createobject($response,'ProcessOrder'); 
  }
  
  public function SaveDetailsRequest($accesskey,$associationid,$secreteaccessid,$msoOrder){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='SaveDetails',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($msoOrder);
     $objecttype = $this->build_msnode($objectarr);  
      $body = '<s:Body>
                    <SaveDetails xmlns="http://membersuite.com/contracts">
                    <msoOrder>
                    '.$objecttype.'
                    </msoOrder>
                    </SaveDetails>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='SaveDetails');
    return $this->api->createobject($response,'SaveDetails'); 
  }
  
  public function ProcessReturnRequest($accesskey,$associationid,$secreteaccessid,$msReturn,$autoGenerateRefunds=true){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ProcessReturn',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($msReturn);
     $objecttype = $this->build_msnode($objectarr);  
      $body = '<s:Body>
                    <ProcessReturn xmlns="http://membersuite.com/contracts">
                    <msReturn>
                    '.$objecttype.'
                    </msReturn>
                    <autoGenerateRefunds>'.$autoGenerateRefunds.'</autoGenerateRefunds>
                    </ProcessReturn>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ProcessReturn');
    return $this->api->createobject($response,'ProcessReturn'); 
  }
  
  public function SaveFulfillmentBatchRequest($accesskey,$associationid,$secreteaccessid,$msoFulfillmentBatch){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='SaveFulfillmentBatch',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($msoFulfillmentBatch);
     $objecttype = $this->build_msnode($objectarr);  
      $body = '<s:Body>
                    <SaveFulfillmentBatch xmlns="http://membersuite.com/contracts">
                    <msoFulfillmentBatch>
                    '.$objecttype.'
                    </msoFulfillmentBatch>
                    </SaveFulfillmentBatch>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='SaveFulfillmentBatch');
    return $this->api->createobject($response,'SaveFulfillmentBatch'); 
  }
  
  public function AdjustOrderRequest($accesskey,$associationid,$secreteaccessid,$msOrderToAdjust){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='AdjustOrder',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($msOrderToAdjust);
     $objecttype = $this->build_msnode($objectarr);  
      $body = '<s:Body>
                    <AdjustOrder xmlns="http://membersuite.com/contracts">
                    <msOrderToAdjust>
                    '.$objecttype.'
                    </msOrderToAdjust>
                    </AdjustOrder>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='AdjustOrder');
    return $this->api->createobject($response,'AdjustOrder'); 
  }
  
  public function PreProcessOrderRequest($accesskey,$associationid,$secreteaccessid,$msOrderToFinalize){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='PreProcessOrder',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($msOrderToFinalize);
     $objecttype = $this->build_msnode($objectarr);  
      $body = '<s:Body>
                    <PreProcessOrder xmlns="http://membersuite.com/contracts">
                    <msOrderToFinalize>
                    '.$objecttype.'
                    </msOrderToFinalize>
                    </PreProcessOrder>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='PreProcessOrder');
    return $this->api->createobject($response,'PreProcessOrder'); 
  }
  
  public function ProcessInventoryTransactionRequest($accesskey,$associationid,$secreteaccessid,$inventoryTransaction){
    
     // Get file content
     $filecontent = $this->api->GetFormat();
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ProcessInventoryTransaction',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($inventoryTransaction);
     $objecttype = $this->build_msnode($objectarr);  
      $body = '<s:Body>
                    <ProcessInventoryTransaction xmlns="http://membersuite.com/contracts">
                    <inventoryTransaction>
                    '.$objecttype.'
                    </inventoryTransaction>
                    </ProcessInventoryTransaction>
                    </s:Body>
                    ';
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    $response = $this->api->SendSoapRequest($apirequest,$method='ProcessInventoryTransaction');
    return $this->api->createobject($response,'ProcessInventoryTransaction'); 
  }
}
?>