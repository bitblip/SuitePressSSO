<?php
/*
 Created Date: 1/May/2013
 Created By: SmartdataInc.
*/
include_once('Concierge.php');

class Finance extends Concierge{
  
  public function __construct(){
   
   // Create object of the concierge class
    $this->api = new Concierge();
  }
 
  public function VoidCreditRequest($accesskey,$associationid,$secreteaccessid,$creditID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='VoidCredit',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <VoidCredit xmlns="http://membersuite.com/contracts">
                    <creditID>'.$creditID.'</creditID>
                    </VoidCredit>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='VoidCredit');
    return $this->api->createobject($response,'VoidCredit'); 
  }
  
  public function GetRelatedPaymentsForInvoiceRequest($accesskey,$associationid,$secreteaccessid,$invoiceID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetRelatedPaymentsForInvoice',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <GetRelatedPaymentsForInvoice xmlns="http://membersuite.com/contracts">
                    <invoiceID>'.$creditID.'</invoiceID>
                    </GetRelatedPaymentsForInvoice>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetRelatedPaymentsForInvoice');
    return $this->api->createobject($response,'GetRelatedPaymentsForInvoice'); 
  }
  
  public function GetOpenBatchesRequest($accesskey,$associationid,$secreteaccessid){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetOpenBatches',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     // This Method do not require body tag
     
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequestheaders,$method='GetOpenBatches');
    return $this->api->createobject($response,'GetOpenBatches'); 
  }
  
  public function VoidWriteOffRequest($accesskey,$associationid,$secreteaccessid,$writeOffID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='VoidWriteOff',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <VoidWriteOff xmlns="http://membersuite.com/contracts">
                    <writeOffID>'.$writeOffID.'</writeOffID>
                    </VoidWriteOff>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='VoidWriteOff');
    return $this->api->createobject($response,'VoidWriteOff'); 
  }
  
  public function DeleteWriteOffRequest($accesskey,$associationid,$secreteaccessid,$writeOffID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='DeleteWriteOff',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <DeleteWriteOff xmlns="http://membersuite.com/contracts">
                    <writeOffID>'.$writeOffID.'</writeOffID>
                    </DeleteWriteOff>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='DeleteWriteOff');
    return $this->api->createobject($response,'DeleteWriteOff'); 
  }
  
  public function WipeProFormaInvoicesRequest($accesskey,$associationid,$secreteaccessid,$wipeInvoicesBefore){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='WipeProFormaInvoices',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <WipeProFormaInvoices xmlns="http://membersuite.com/contracts">
                    <wipeInvoicesBefore>'.$wipeInvoicesBefore.'</wipeInvoicesBefore>
                    </WipeProFormaInvoices>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='WipeProFormaInvoices');
    return $this->api->createobject($response,'WipeProFormaInvoices'); 
  }
  
  public function CancelInvoiceRequest($accesskey,$associationid,$secreteaccessid,$invoiceID){
    
    // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='CancelInvoice',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <CancelInvoice xmlns="http://membersuite.com/contracts">
                    <invoiceID>'.$invoiceID.'</invoiceID>
                    </CancelInvoice>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='CancelInvoice');
    return $this->api->createobject($response,'CancelInvoice'); 
  }
  
  public function ChangeBatchRequest($accesskey,$associationid,$secreteaccessid,$targetBatchID,$transactionsToChange){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ChangeBatch',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     
     $changebatch = '';
     foreach($transactionsToChange as $transactionsToChange)
     {
      $changebatch.='<string>'.$transactionsToChange.'</string>';
     }
     
      $body = '<s:Body>
                    <ChangeBatch xmlns="http://membersuite.com/contracts">
                    <targetBatchID>'.$targetBatchID.'</targetBatchID>
                    <transactionsToChange>'.$changebatch.'</transactionsToChange>
                    </ChangeBatch>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ChangeBatch');
    return $this->api->createobject($response,'ChangeBatch'); 
  }
  
  public function RefundPaymentRequest($accesskey,$associationid,$secreteaccessid,$paymentID,$batchID,$instructions,$memo,$autoGenerateRefund){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='RefundPayment',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $instrct='';
     foreach($instructions as $instructions)
     {
      $instrct.='<PaymentAdjustmentInstruction>'.$instructions.'</PaymentAdjustmentInstruction>';
     }
      $body = '<s:Body>
                    <RefundPayment xmlns="http://membersuite.com/contracts">
                    <paymentID>'.$paymentID.'</paymentID>
                    <batchID>'.$batchID.'</batchID>
                    <instructions>'.$instrct.'</instructions>
                    <memo>'.$memo.'</memo>
                    <autoGenerateRefund>'.$autoGenerateRefund.'</autoGenerateRefund>
                    </RefundPayment>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='RefundPayment');
    return $this->api->createobject($response,'RefundPayment'); 
  }
  
  public function ReversePaymentRequest($accesskey,$associationid,$secreteaccessid,$paymentID,$batchID,$instructions,$memo){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ReversePayment',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $instrct='';
     foreach($instructions as $instructions)
     {
      $instrct.='<PaymentAdjustmentInstruction>'.$instructions.'</PaymentAdjustmentInstruction>';
     }
      $body = '<s:Body>
                    <ReversePayment xmlns="http://membersuite.com/contracts">
                    <paymentID>'.$paymentID.'</paymentID>
                    <batchID>'.$batchID.'</batchID>
                    <instructions>'.$instrct.'</instructions>
                    <memo>'.$memo.'</memo>
                    </ReversePayment>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ReversePayment');
    return $this->api->createobject($response,'ReversePayment'); 
  }
  
  public function VoidPaymentRequest($accesskey,$associationid,$secreteaccessid,$paymentID){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='VoidPayment',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <VoidPayment xmlns="http://membersuite.com/contracts">
                    <paymentID>'.$paymentID.'</paymentID>
                    </VoidPayment>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='VoidPayment');
    return $this->api->createobject($response,'VoidPayment'); 
  }
  
  public function CancelBillingScheduleRequest($accesskey,$associationid,$secreteaccessid,$billingScheduleId){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='CancelBillingSchedule',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <CancelBillingSchedule xmlns="http://membersuite.com/contracts">
                    <billingScheduleId>'.$billingScheduleId.'</billingScheduleId>
                    </CancelBillingSchedule>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='CancelBillingSchedule');
    return $this->api->createobject($response,'CancelBillingSchedule'); 
  }
  
  public function ProcessBillingScheduleEntryRequest($accesskey,$associationid,$secreteaccessid,$scheduleID,$date){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ProcessBillingScheduleEntry',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <ProcessBillingScheduleEntry xmlns="http://membersuite.com/contracts">
                    <scheduleID>'.$scheduleID.'</scheduleID>
                    <date>'.$date.'</date>
                    </ProcessBillingScheduleEntry>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ProcessBillingScheduleEntry');
    return $this->api->createobject($response,'ProcessBillingScheduleEntry'); 
  }
  
  public function RecognizeDeferralRequest($accesskey,$associationid,$secreteaccessid,$fiscalYearID,$periodNumber){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='RecognizeDeferralRevenue',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <RecognizeDeferralRevenue xmlns="http://membersuite.com/contracts">
                    <fiscalYearID>'.$fiscalYearID.'</fiscalYearID>
                    <periodNumber>'.$periodNumber.'</periodNumber>
                    </RecognizeDeferralRevenue>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='RecognizeDeferralRevenue');
    return $this->api->createobject($response,'RecognizeDeferralRevenue'); 
  }
  
  public function ClosePeriodRequest($accesskey,$associationid,$secreteaccessid,$fiscalYearID,$periodNumber){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ClosePeriod',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <ClosePeriod xmlns="http://membersuite.com/contracts">
                    <fiscalYearID>'.$fiscalYearID.'</fiscalYearID>
                    <periodNumber>'.$periodNumber.'</periodNumber>
                    </ClosePeriod>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ClosePeriod');
    return $this->api->createobject($response,'ClosePeriod'); 
  }
  
  public function ReopenFiscalPeriodRequest($accesskey,$associationid,$secreteaccessid,$fiscalYearID,$periodNumber,$deleteRecognizedRevenue){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ReopenFiscalPeriod',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
      $body = '<s:Body>
                    <ReopenFiscalPeriod xmlns="http://membersuite.com/contracts">
                    <fiscalYearID>'.$fiscalYearID.'</fiscalYearID>
                    <periodNumber>'.$periodNumber.'</periodNumber>
                    <deleteRecognizedRevenue>'.$deleteRecognizedRevenue.'</deleteRecognizedRevenue>
                    </ReopenFiscalPeriod>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ReopenFiscalPeriod');
    return $this->api->createobject($response,'ReopenFiscalPeriod'); 
  }
  
  public function DescribeProductsRequest($accesskey,$associationid,$secreteaccessid,$entityID,$productsToDescribe){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='DescribeProducts',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $products = '';
     foreach($productsToDescribe as $productsToDescribe)
     {
        $products.='<string>'.$productsToDescribe.'</string>'; 
     }
     
      $body = '<s:Body>
                    <DescribeProducts xmlns="http://membersuite.com/contracts">
                    <entityID>'.$entityID.'</entityID>
                    <productsToDescribe>'.$products.'</productsToDescribe>
                    </DescribeProducts>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='DescribeProducts');
    return $this->api->createobject($response,'DescribeProducts'); 
  }
  
  public function SaveFiscalYearRequest($accesskey,$associationid,$secreteaccessid,$msFiscalYear,$numberOfPeriods){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='SaveFiscalYear',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($msFiscalYear);
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
                    <SaveFiscalYear xmlns="http://membersuite.com/contracts">
                    <msFiscalYear>
                    <mem:ClassType>'.$objectarr['ClassType'].'</mem:ClassType>
                    <mem:Fields>
                    '.$objecttype.'
                    </mem:Fields>
                    </msFiscalYear>
                    <numberOfPeriods>'.$numberOfPeriods.'</numberOfPeriods>
                    </SaveFiscalYear>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
   
    $response = $this->api->SendSoapRequest($apirequest,$method='SaveFiscalYear');
    return $this->api->createobject($response,'SaveFiscalYear'); 
  }
  
  public function SaveBatchRequest($accesskey,$associationid,$secreteaccessid,$msBatch){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='SaveBatch',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($msBatch);
     $objecttype = '';
     foreach($objectarr as $key=>$value){
       if($key<>'ClassType'){ 
      $objecttype.= '<mem:KeyValueOfstringanyType>
        <mem:Key>'.$key.'</mem:Key>
        <mem:Value i:type="a:string">'.$value.'</mem:Value>
        </mem:KeyValueOfstringanyType>';  
       }
      }
     
      $body = '<s:Body>
                    <SaveBatch xmlns="http://membersuite.com/contracts">
                    <msBatch>
                    <mem:ClassType>'.$objectarr['ClassType'].'</mem:ClassType>
                    <mem:Fields>
                    '.$objecttype.'
                    </mem:Fields>
                    </msBatch>
                    </SaveBatch>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='SaveBatch');
    return $this->api->createobject($response,'SaveBatch'); 
  }
  
  public function SaveCreditRequest($accesskey,$associationid,$secreteaccessid,$msCredit){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='SaveCredit',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($msCredit);
     $objecttype = '';
     foreach($objectarr as $key=>$value){
       if($key<>'ClassType'){ 
      $objecttype.= '<mem:FieldMetadata>
        <mem:Name>'.$key.'</mem:Name>
        <mem:PickListEntries>
        <mem:PickListEntry>
        <mem:Value>'.$value.'</mem:Value>
        </mem:PickListEntry>
        </mem:PickListEntries>
        </mem:FieldMetadata>';  
       }
      }
     
      $body = '<s:Body>
                    <SaveCredit xmlns="http://membersuite.com/contracts">
                    <msCredit>
                    <mem:ClassType>'.$objectarr['ClassType'].'</mem:ClassType>
                    <mem:Fields>
                    '.$objecttype.'
                    </mem:Fields>
                    </msCredit>
                    </SaveCredit>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='SaveCredit');
    return $this->api->createobject($response,'SaveCredit'); 
  }
  
  public function CreateInvoiceRequest($accesskey,$associationid,$secreteaccessid,$msInvoice){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='CreateInvoice',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($msInvoice);
     $objecttype = '';
     foreach($objectarr as $key=>$value){
       if($key<>'ClassType'){ 
      $objecttype.= '<mem:KeyValueOfstringanyType>
        <mem:Key>'.$key.'</mem:Key>
        <mem:Value i:type="a:string">'.$value.'</mem:Value>
        </mem:KeyValueOfstringanyType>';  
       }
      }
     
      $body = '<s:Body>
                    <CreateInvoice xmlns="http://membersuite.com/contracts">
                    <msInvoice>
                    <mem:ClassType>Invoice</mem:ClassType>
                    <mem:Fields>
                    '.$objecttype.'
                    </mem:Fields>
                    </msInvoice>
                    </CreateInvoice>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='CreateInvoice');
    return $this->api->createobject($response,'CreateInvoice'); 
  }
  
  public function ProcessWriteOffRequest($accesskey,$associationid,$secreteaccessid,$msWriteOff){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ProcessWriteOff',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($msWriteOff);
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
                    <ProcessWriteOff xmlns="http://membersuite.com/contracts">
                    <msWriteOff>
                    <mem:ClassType>'.$objectarr['ClassType'].'</mem:ClassType>
                    <mem:Fields>
                    '.$objecttype.'
                    </mem:Fields>
                    </msWriteOff>
                    </ProcessWriteOff>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ProcessWriteOff');
    return $this->api->createobject($response,'ProcessWriteOff'); 
  }
  
  public function AdjustInvoiceRequest($accesskey,$associationid,$secreteaccessid,$msInvoice){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='AdjustInvoice',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($msInvoice);
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
                    <AdjustInvoice xmlns="http://membersuite.com/contracts">
                    <msInvoice>
                    <mem:ClassType>'.$objectarr['ClassType'].'</mem:ClassType>
                    <mem:Fields>
                    '.$objecttype.'
                    </mem:Fields>
                    </msInvoice>
                    </AdjustInvoice>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='AdjustInvoice');
    return $this->api->createobject($response,'AdjustInvoice'); 
  }
  
  public function ProcessRefundRequest($accesskey,$associationid,$secreteaccessid,$refund){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ProcessRefund',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($refund);
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
                    <ProcessRefund xmlns="http://membersuite.com/contracts">
                    <refund>
                    <mem:ClassType>'.$objectarr['ClassType'].'</mem:ClassType>
                    <mem:Fields>
                    '.$objecttype.'
                    </mem:Fields>
                    </refund>
                    </ProcessRefund>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ProcessRefund');
    return $this->api->createobject($response,'ProcessRefund'); 
  }
  
  public function GetAllProductsInBatchRequest($accesskey,$associationid,$secreteaccessid,$batchIDs){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GetAllProductsInBatch',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $batchid = '';
     foreach($batchIDs as $batchIDs){
      $batchid.='<string>'.$batchIDs.'</string>';
     }
     
      $body = '<s:Body>
                    <GetAllProductsInBatch xmlns="http://membersuite.com/contracts">
                    <batchIDs>'.$batchid.'</batchIDs>
                    </GetAllProductsInBatch>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GetAllProductsInBatch');
    return $this->api->createobject($response,'GetAllProductsInBatch'); 
  }
  
  public function AdjustRefundRequest($accesskey,$associationid,$secreteaccessid,$refund){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='AdjustRefund',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($refund);
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
                    <AdjustRefund xmlns="http://membersuite.com/contracts">
                    <refund>
                    <mem:ClassType>'.$objectarr['ClassType'].'</mem:ClassType>
                    <mem:Fields>
                    '.$objecttype.'
                    </mem:Fields>
                    </refund>
                    </AdjustRefund>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='AdjustRefund');
    return $this->api->createobject($response,'AdjustRefund'); 
  }
  
  public function PostBatchesRequest($accesskey,$associationid,$secreteaccessid,$batchIDs,$newBatchForProFormaInvoices=""){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='PostBatches',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $batchid = '';
     foreach($batchIDs as $batchIDs){
      $batchid.='<string>'.$batchIDs.'</string>';
     }
     
     $newbatch='';
     if($newBatchForProFormaInvoices)
     {
      foreach($newBatchForProFormaInvoices as $newBatchForProFormaInvoices)
      {
        $newbatch.='<string>'.$newBatchForProFormaInvoices.'</string>';
      }
     }
     
      $body = '<s:Body>
                    <PostBatches xmlns="http://membersuite.com/contracts">
                    <batchIDs>'.$batchid.'</batchIDs>
                    <newBatchForProFormaInvoices xmlns="http://schemas.microsoft.com/2003/10/Serialization/Arrays">'.$newbatch.'</newBatchForProFormaInvoices>
                    </PostBatches>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='PostBatches');
    return $this->api->createobject($response,'PostBatches'); 
  }
  
  public function UnPostBatchesRequest($accesskey,$associationid,$secreteaccessid,$batchIDs){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='UnPostBatches',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $batchid = '';
     foreach($batchIDs as $batchIDs){
      $batchid.='<string>'.$batchIDs.'</string>';
     }
     
      $body = '<s:Body>
                    <UnPostBatches xmlns="http://membersuite.com/contracts">
                    <batchIDs>'.$batchid.'</batchIDs>
                    </UnPostBatches>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='UnPostBatches');
    return $this->api->createobject($response,'UnPostBatches'); 
  }
  
  public function DownloadBatchesRequest($accesskey,$associationid,$secreteaccessid,$batchIDs){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='DownloadBatches',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $batchid = '';
     foreach($batchIDs as $batchIDs){
      $batchid.='<string>'.$batchIDs.'</string>';
     }
     
      $body = '<s:Body>
                    <DownloadBatches xmlns="http://membersuite.com/contracts">
                    <batchIDs>'.$batchid.'</batchIDs>
                    </DownloadBatches>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='DownloadBatches');
    return $this->api->createobject($response,'DownloadBatches'); 
  }
  
  public function GenerateBatchReadinessReportRequest($accesskey,$associationid,$secreteaccessid,$batches){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='GenerateBatchReadinessReport',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $batch = '';
     foreach($batches as $batches){
      $batch.='<string>'.$batches.'</string>';
     }
     
      $body = '<s:Body>
                    <GenerateBatchReadinessReport xmlns="http://membersuite.com/contracts">
                    <batches>'.$batch.'</batches>
                    </GenerateBatchReadinessReport>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='GenerateBatchReadinessReport');
    return $this->api->createobject($response,'GenerateBatchReadinessReport'); 
  }
  
  public function RecordPaymentRequest($accesskey,$associationid,$secreteaccessid,$paymentToRecord){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='RecordPayment',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($paymentToRecord);
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
                    <RecordPayment xmlns="http://membersuite.com/contracts">
                    <paymentToRecord>
                    <mem:ClassType>'.$objectarr['ClassType'].'</mem:ClassType>
                    <mem:Fields>
                    '.$objecttype.'
                    </mem:Fields>
                    </paymentToRecord>
                    </RecordPayment>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='RecordPayment');
    return $this->api->createobject($response,'RecordPayment'); 
  }
  
  public function AdjustPaymentRequest($accesskey,$associationid,$secreteaccessid,$paymentToAdjust){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='AdjustPayment',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($paymentToAdjust);
     $objecttype = '';
     foreach($objectarr as $key=>$value){
       if($key<>'ClassType'){ 
      $objecttype.= '<mem:KeyValueOfstringanyType>
        <mem:Key>'.$key.'</mem:Key>
        <mem:Value i:type="a:string">'.$value.'</mem:Value>
        </mem:KeyValueOfstringanyType>';  
       }
      }
     
      $body = '<s:Body>
                    <AdjustPayment xmlns="http://membersuite.com/contracts">
                    <paymentToAdjust>
                    <mem:ClassType>'.$objectarr['ClassType'].'</mem:ClassType>
                    <mem:Fields>
                    '.$objecttype.'
                    </mem:Fields>
                    </paymentToAdjust>
                    </AdjustPayment>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='AdjustPayment');
    return $this->api->createobject($response,'AdjustPayment'); 
  }
  
  public function ProcessCreditCardPaymentRequest($accesskey,$associationid,$secreteaccessid,$paymentToRecord,$creditCardToProcess,$antiDuplicationKey){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ProcessCreditCardPayment',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $objectarr = $this->object_to_array($paymentToRecord);
     $payment = '';
     foreach($objectarr as $key=>$value){
       if($key<>'ClassType'){ 
      $payment.= '<mem:FieldMetadata>
        <mem:Name>'.$key.'</mem:Name>
        <mem:Value>'.$value.'</mem:Value>
        </mem:FieldMetadata>';  
       }
      }
      
      $creditcard = $this->object_to_array($creditCardToProcess);
     $cardtoprocess = '';
     foreach($creditcard as $key=>$value){
      $cardtoprocess.= '<'.$key.'>'.$value.'</'.$key.'>';
      }
     
      $body = '<s:Body>
                    <ProcessCreditCardPayment xmlns="http://membersuite.com/contracts">
                    <paymentToRecord>
                    <mem:ClassType>'.$objectarr['ClassType'].'</mem:ClassType>
                    <mem:Fields>
                    '.$payment.'
                    </mem:Fields>
                    </paymentToRecord>
                    <creditCardToProcess>
                    '.$cardtoprocess.'
                    </creditCardToProcess>
                    <antiDuplicationKey>'.$antiDuplicationKey.'</antiDuplicationKey>
                    </ProcessCreditCardPayment>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ProcessCreditCardPayment');
    return $this->api->createobject($response,'ProcessCreditCardPayment'); 
  }
  
  public function ProcessInvoiceAdjustmentRequest($accesskey,$associationid,$secreteaccessid,$msInvoiceAdjustment,$paymentAdjustmentInstructions){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='ProcessInvoiceAdjustment',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     $paymentadjustmentinst = $this->object_to_array($paymentAdjustmentInstructions);
     $instrctions = '';
     foreach($paymentadjustmentinst as $key=>$value){
       $instrctions.='<'.$key.'>'.$value.'</'.$key.'>';
      }
      
      $invoice = $this->object_to_array($msInvoiceAdjustment);
     $payment = '';
     foreach($invoice as $key=>$value){
       if($key<>'ClassType'){ 
      $payment.= '<mem:FieldMetadata>
        <mem:Name>'.$key.'</mem:Name>
        <mem:Value>'.$value.'</mem:Value>
        </mem:FieldMetadata>';  
       }
      }
     
      $body = '<s:Body>
                    <ProcessInvoiceAdjustment xmlns="http://membersuite.com/contracts">
                    <msInvoiceAdjustment>
                    <mem:ClassType>'.$invoice['ClassType'].'</mem:ClassType>
                    <mem:Fields>
                    '.$payment.'
                    </mem:Fields>
                    </msInvoiceAdjustment>
                    <paymentAdjustmentInstructions>
                    '.$instrctions.'
                    </paymentAdjustmentInstructions>
                    </ProcessInvoiceAdjustment>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ProcessInvoiceAdjustment');
    return $this->api->createobject($response,'ProcessInvoiceAdjustment'); 
  }
  
  public function EditRevenueRecognitionScheduleRequest($accesskey,$associationid,$secreteaccessid,$revenueRecognitionSchedule){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='EditRevenueRecognitionSchedule',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     
      $invoice = $this->object_to_array($revenueRecognitionSchedule);
     $payment = '';
     foreach($invoice as $key=>$value){
       if($key<>'ClassType'){ 
      $payment.= '<mem:FieldMetadata>
        <mem:Name>'.$key.'</mem:Name>
        <mem:Value>'.$value.'</mem:Value>
        </mem:FieldMetadata>';  
       }
      }
     
      $body = '<s:Body>
                    <EditRevenueRecognitionSchedule xmlns="http://membersuite.com/contracts">
                    <revenueRecognitionSchedule>
                    <mem:ClassType>'.$invoice['ClassType'].'</mem:ClassType>
                    <mem:Fields>
                    '.$payment.'
                    </mem:Fields>
                    </revenueRecognitionSchedule>
                    </EditRevenueRecognitionSchedule>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='EditRevenueRecognitionSchedule');
    return $this->api->createobject($response,'EditRevenueRecognitionSchedule'); 
  }
  
  public function EditBillingScheduleRequest($accesskey,$associationid,$secreteaccessid,$billingSchedule){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='EditBillingSchedule',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     
      $billing = $this->object_to_array($billingSchedule);
     $billingschedule = '';
     foreach($billing as $key=>$value){
       if($key<>'ClassType'){ 
      $billingschedule.= '<mem:FieldMetadata>
        <mem:Name>'.$key.'</mem:Name>
        <mem:Value>'.$value.'</mem:Value>
        </mem:FieldMetadata>';  
       }
      }
     
      $body = '<s:Body>
                    <EditBillingSchedule xmlns="http://membersuite.com/contracts">
                    <billingSchedule>
                    <mem:ClassType>'.$billing['ClassType'].'</mem:ClassType>
                    <mem:Fields>
                    '.$billingschedule.'
                    </mem:Fields>
                    </billingSchedule>
                    </EditBillingSchedule>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='EditBillingSchedule');
    return $this->api->createobject($response,'EditBillingSchedule'); 
  }
  
  public function WriteOffMultipleInvoicesRequest($accesskey,$associationid,$secreteaccessid,$msWriteOffTemplate,$invoicesToWriteOff){
    
     // Get file content
     $filecontent = $this->api->GetFormat(); 
     if($filecontent=='Error')
     {
      $errormsg = 'API Request can not be generated';
      return false;
     }
     // Create API Request Headers
     $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method='WriteOffMultipleInvoices',$accesskey,$associationid,$secreteaccessid);
     
     // Construct Body
     
      $WriteOff = $this->object_to_array($msWriteOffTemplate);
     $writeofftemplate = '';
     foreach($WriteOff as $key=>$value){
       if($key<>'ClassType'){ 
      $writeofftemplate.= '<mem:FieldMetadata>
        <mem:Name>'.$key.'</mem:Name>
        <mem:Value>'.$value.'</mem:Value>
        </mem:FieldMetadata>';  
       }
      }
     
     $invoicesToWrite='';
     
     foreach($invoicesToWriteOff as $invoicesToWriteOff)
     {
      $invoicesToWrite.='<string>'.$invoicesToWriteOff.'</string>';
     }
     
      $body = '<s:Body>
                    <WriteOffMultipleInvoices xmlns="http://membersuite.com/contracts">
                    <msWriteOffTemplate>
                    <mem:ClassType>'.$WriteOff['ClassType'].'</mem:ClassType>
                    <mem:Fields>
                    '.$writeofftemplate.'
                    </mem:Fields>
                    </msWriteOffTemplate>
                    <invoicesToWriteOff>'.$invoicesToWrite.'</invoicesToWriteOff>
                    </WriteOffMultipleInvoices>
                    </s:Body>
                    ';
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    // Create Response
    
    $response = $this->api->SendSoapRequest($apirequest,$method='WriteOffMultipleInvoices');
    return $this->api->createobject($response,'WriteOffMultipleInvoices'); 
  }
}
?>