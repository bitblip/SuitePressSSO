<?php
/*
 This class is used to generate Security Token, Session Id for signle sign on.
 Created Date: 21/March/2013
 Created By: SmartdataInc.
  
*/
include_once('Concierge.php');

class SearchAPI extends Concierge{

public function __construct(){
	// Create object of the concierge class
	$this->api = new Concierge();
}	

    public function CreateExecuteMSQL($accesskey,$associationid,$secreteaccessid,$query,$startrecord,$maximumNumberOfRecordsToReturn){  
    
    // Get file content    
    $filecontent = $this->api->GetFormat();
    
    if($filecontent=='Error') {
    $errormsg = 'API Request can not be generated';
    return false;
    }
    
    // Create API Request Headers
    $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'ExecuteMSQL',$accesskey,$associationid,$secreteaccessid);
    
    if($maximumNumberOfRecordsToReturn == null) {
    $maximumNumberOfRecordsToReturn = "";
    }
    else {
    $maximumNumberOfRecordsToReturn = "<maximumNumberOfRecordsToReturn>".$maximumNumberOfRecordsToReturn."</maximumNumberOfRecordsToReturn>"; 
    }
    
    // Construct Body
    
    $body = '<s:Body>
    <ExecuteMSQL xmlns="http://membersuite.com/contracts">
    <msqlStatement>'.$query.'</msqlStatement>
    <startRecord>'.$startrecord.'</startRecord>'.
    $maximumNumberOfRecordsToReturn
    .'</ExecuteMSQL>
    </s:Body>';
    
    // Replace strings
    
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    
    // Create Response			
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ExecuteMSQL');  
    return $this->api->createobject($response,'ExecuteMSQL'); 
    
    }



    public function CreateExecuteSearch($accesskey,$associationid,$messagesignature,$searchtouse,$startrecord,$MaximumNumOfRecord){  
    
    // Get file content    
    $filecontent = $this->api->GetFormat();
    if($filecontent=='Error') {
    $errormsg = 'API Request can not be generated';
    return false;
    }
    
    // Create API Request Headers
    $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'ExecuteSearch',$accesskey,$associationid,$messagesignature);
    // Construct Body
    $search = $this->api->createsearch($searchtouse);
    
    $body = '<s:Body>
           <ExecuteSearch xmlns="http://membersuite.com/contracts" >
           <searchToExecute>'.$search.'</searchToExecute>
           <startRecord>'.$startrecord.'</startRecord>
           <MaximumNumOfRecord>'.$MaximumNumOfRecord.'</MaximumNumOfRecord>
           </ExecuteSearch>
    </s:Body>';
    
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
    $response = $this->api->SendSoapRequest($apirequest,$method='ExecuteSearch');
    return $this->api->createobject($response,'ExecuteSearch'); 
    }
    
    public function ExecuteSearchesRequest($accesskey,$associationid,$messagesignature,$searchesToExecute,$startRecord,$maximumNumberOfRecordsToReturn){  
    
    // Get file content    
    $filecontent = $this->api->GetFormat();
    if($filecontent=='Error') {
    $errormsg = 'API Request can not be generated';
    return false;
    }
    
    // Create API Request Headers
    $apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'ExecuteSearches',$accesskey,$associationid,$messagesignature);
    // Construct Body
    $search = null;
    $count=0;
    foreach($searchesToExecute as $searchesToExecute)
    {
        $search.= '<b:Search>'.$this->api->createsearch($searchesToExecute).'</b:Search> ';
    }
     
    $body = '<s:Body>
           <ExecuteSearches xmlns="http://membersuite.com/contracts" >
           <searchesToExecute>'.$search.'</searchesToExecute>
           <startRecord>'.$startRecord.'</startRecord>
           <maximumNumberOfRecordsToReturn>'.$maximumNumberOfRecordsToReturn.'</maximumNumberOfRecordsToReturn>
           </ExecuteSearches>
    </s:Body>';
    
    // Replace strings
    $apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
    
    $response = $this->api->SendSoapRequest($apirequest,$method='ExecuteSearches');
    return $this->api->createobject($response,'ExecuteSearches'); 
    }

        public function str_replace_last( $search , $replace , $str ) {
        if( ( $pos = strrpos( $str , $search ) ) !== false ) {
            $search_length  = strlen( $search );
            $str    = substr_replace( $str , $replace , $pos , $search_length );
        }
        return $str;
        }


	public function DescribeSearchRequest($accesskey,$associationid,$secreteaccessid,$searchType,$searchContext){  
	
	// Get file content    
	$filecontent = $this->api->GetFormat();
	if($filecontent=='Error') {
	$errormsg = 'API Request can not be generated';
	return false;
	}
	// Create API Request Headers
	$apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'DescribeSearch',$accesskey,$associationid,$secreteaccessid);
	// Construct Body
	
	$body = '<s:Body>
	<DescribeSearch xmlns="http://membersuite.com/contracts">
	<searchType>'.$searchType.'</searchType>
	<searchContext>'.$searchContext.'</searchContext>
	</DescribeSearch>
	</s:Body>';
	// Replace strings
	$apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
	// Create Response			
	$response = $this->api->SendSoapRequest($apirequest,$method='DescribeSearch');
	return $this->api->createobject($response,'DescribeSearch'); 
	}
        
        public function DescribeCompiledSearchRequest($accesskey,$associationid,$secreteaccessid,$searchToInspect){  
	
	// Get file content    
	$filecontent = $this->api->GetFormat();
	if($filecontent=='Error') {
	$errormsg = 'API Request can not be generated';
	return false;
	}
	// Create API Request Headers
	$apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'DescribeCompiledSearch',$accesskey,$associationid,$secreteaccessid);
	// Construct Body
	$search = $this->api->createsearch($searchToInspect);
       
        $body = '<s:Body>
	<DescribeCompiledSearch xmlns="http://membersuite.com/contracts">
	<searchToInspect>'.$search.'</searchToInspect>
	</DescribeCompiledSearch>
	</s:Body>';
	// Replace strings
	$apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
	// Create Response			
	$response = $this->api->SendSoapRequest($apirequest,$method='DescribeCompiledSearch');
	return $this->api->createobject($response,'DescribeCompiledSearch'); 
	}
        
        public function DescribeCompiledSearchesRequest($accesskey,$associationid,$secreteaccessid,$searchesToInspect){  
	
	// Get file content    
	$filecontent = $this->api->GetFormat();
	if($filecontent=='Error') {
	$errormsg = 'API Request can not be generated';
	return false;
	}
	// Create API Request Headers
	$apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'DescribeCompiledSearches',$accesskey,$associationid,$secreteaccessid);
	// Construct Body
        $search='';
        foreach($searchesToInspect as $searchesToInspect)
        {
	$search = '<b:Search>'.$this->api->createsearch($searchesToInspect).'</b:Search> ';
        }
        
        $body = '<s:Body>
	<DescribeCompiledSearches xmlns="http://membersuite.com/contracts">
	<searchesToInspect>'.$search.'</searchesToInspect>
	</DescribeCompiledSearches>
	</s:Body>';
	// Replace strings
	$apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
	// Create Response			
	$response = $this->api->SendSoapRequest($apirequest,$method='DescribeCompiledSearches');
	return $this->api->createobject($response,'DescribeCompiledSearches'); 
	}
        
        public function ExecuteSearchWithFileOutputRequest($accesskey,$associationid,$secreteaccessid,$searchToExecute,$searchOutputType,$abortIfZeroResults='true'){  
	
	// Get file content    
	$filecontent = $this->api->GetFormat();
	if($filecontent=='Error') {
	$errormsg = 'API Request can not be generated';
	return false;
	}
	// Create API Request Headers
	$apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'ExecuteSearchWithFileOutput',$accesskey,$associationid,$secreteaccessid);
	// Construct Body
	$search = $this->api->createsearch($searchToExecute);
        
        $body = '<s:Body>
	<ExecuteSearchWithFileOutput xmlns="http://membersuite.com/contracts">
	<searchToExecute>'.$search.'</searchToExecute>
        <searchOutputType>'.$searchOutputType.'</searchOutputType>
        <abortIfZeroResults>'.$abortIfZeroResults.'</abortIfZeroResults>
	</ExecuteSearchWithFileOutput>
	</s:Body>';
	// Replace strings
	$apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
	// Create Response			
	$response = $this->api->SendSoapRequest($apirequest,$method='ExecuteSearchWithFileOutput');
	return $this->api->createobject($response,'ExecuteSearchWithFileOutput'); 
	}
	
	public function GetSearchFieldMetadataFromFullPathRequest($accesskey,$associationid,$secreteaccessid,$searchType,$searchContext,$fieldFullPaths){  
	
	// Get file content    
	$filecontent = $this->api->GetFormat();
	if($filecontent=='Error') {
	$errormsg = 'API Request can not be generated';
	return false;
	}
	// Create API Request Headers
	$apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'GetSearchFieldMetadataFromFullPath',$accesskey,$associationid,$secreteaccessid);
	// Construct Body
	$filepath='';
	foreach($fieldFullPaths as $fieldFullPath)
	{
		$filepath.='<string>'.$fieldFullPath.'</string>';
	}
	
	$body = '<s:Body>
	<GetSearchFieldMetadataFromFullPath xmlns="http://membersuite.com/contracts">
	<searchType>'.$searchType.'</searchType>
	<searchContext>'.$searchContext.'</searchContext>
	<fieldFullPaths>'.$filepath.'</fieldFullPaths>
	</GetSearchFieldMetadataFromFullPath>
	</s:Body>';
	// Replace strings
	$apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
	// Create Response			
	$response = $this->api->SendSoapRequest($apirequest,$method='GetSearchFieldMetadataFromFullPath');
	return $this->api->createobject($response,'GetSearchFieldMetadataFromFullPath'); 
	}
	
	public function ConvertMQLToSearchRequest($accesskey,$associationid,$secreteaccessid,$msqlStatement){  
	
	// Get file content    
	$filecontent = $this->api->GetFormat();
	if($filecontent=='Error') {
	$errormsg = 'API Request can not be generated';
	return false;
	}
	// Create API Request Headers
	$apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'ConvertMQLToSearch',$accesskey,$associationid,$secreteaccessid);
	// Construct Body
	
	$body = '<s:Body>
	<ConvertMQLToSearch xmlns="http://membersuite.com/contracts">
	<msqlStatement>'.$msqlStatement.'</msqlStatement>
	</ConvertMQLToSearch>
	</s:Body>';
	// Replace strings
	$apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
	// Create Response			
	$response = $this->api->SendSoapRequest($apirequest,$method='ConvertMQLToSearch');
	return $this->api->createobject($response,'ConvertMQLToSearch'); 
	}
	
	public function GetBuiltInSearchesRequest($accesskey,$associationid,$secreteaccessid,$searchType){  
	
	// Get file content    
	$filecontent = $this->api->GetFormat();
	if($filecontent=='Error') {
	$errormsg = 'API Request can not be generated';
	return false;
	}
	// Create API Request Headers
	$apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'GetBuiltInSearches',$accesskey,$associationid,$secreteaccessid);
	// Construct Body
	
	$body = '<s:Body>
	<GetBuiltInSearches xmlns="http://membersuite.com/contracts">
	<searchType>'.$searchType.'</searchType>
	</GetBuiltInSearches>
	</s:Body>';
	// Replace strings
	$apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
	// Create Response			
	$response = $this->api->SendSoapRequest($apirequest,$method='GetBuiltInSearches');
	return $this->api->createobject($response,'GetBuiltInSearches'); 
	}
	
	public function LoadBuiltInSearchRequest($accesskey,$associationid,$secreteaccessid,$searchName){  
	
	// Get file content    
	$filecontent = $this->api->GetFormat();
	if($filecontent=='Error') {
	$errormsg = 'API Request can not be generated';
	return false;
	}
	// Create API Request Headers
	$apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'LoadBuiltInSearch',$accesskey,$associationid,$secreteaccessid);
	// Construct Body
	
	$body = '<s:Body>
	<LoadBuiltInSearch xmlns="http://membersuite.com/contracts">
	<searchName>'.$searchName.'</searchName>
	</LoadBuiltInSearch>
	</s:Body>';
	// Replace strings
	$apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
	// Create Response			
	$response = $this->api->SendSoapRequest($apirequest,$method='LoadBuiltInSearch');
	return $this->api->createobject($response,'LoadBuiltInSearch'); 
	}
	
	public function QuickSearchRequest($accesskey,$associationid,$secreteaccessid,$searchType,$searchContext,$queryText,$startRecord,$maximumNumberOfRecordsToReturn){  
	
	// Get file content    
	$filecontent = $this->api->GetFormat();
	if($filecontent=='Error') {
	$errormsg = 'API Request can not be generated';
	return false;
	}
	// Create API Request Headers
	$apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'QuickSearch',$accesskey,$associationid,$secreteaccessid);
	// Construct Body
	
	$body = '<s:Body>
	<QuickSearch xmlns="http://membersuite.com/contracts">
	<searchType>'.$searchType.'</searchType>
	<searchContext>'.$searchContext.'</searchContext>
	<queryText>'.$queryText.'</queryText>
	<startRecord>'.$startRecord.'</startRecord>
	<maximumNumberOfRecordsToReturn>'.$maximumNumberOfRecordsToReturn.'</maximumNumberOfRecordsToReturn>
	</QuickSearch>
	</s:Body>';
	// Replace strings
	$apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
	// Create Response			
	$response = $this->api->SendSoapRequest($apirequest,$method='QuickSearch');
	return $this->api->createobject($response,'QuickSearch'); 
	}
	
	public function GenerateQuickSearchRequest($accesskey,$associationid,$secreteaccessid,$searchText,$searchContext,$queryText){  
	
	// Get file content    
	$filecontent = $this->api->GetFormat();
	if($filecontent=='Error') {
	$errormsg = 'API Request can not be generated';
	return false;
	}
	// Create API Request Headers
	$apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'GenerateQuickSearch',$accesskey,$associationid,$secreteaccessid);
	// Construct Body
	
	$body = '<s:Body>
	<GenerateQuickSearch xmlns="http://membersuite.com/contracts">
	<searchText>'.$searchText.'</searchText>
	<searchContext>'.$searchContext.'</searchContext>
	<queryText>'.$queryText.'</queryText>
	</GenerateQuickSearch>
	</s:Body>';
	// Replace strings
	$apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
	// Create Response			
	$response = $this->api->SendSoapRequest($apirequest,$method='GenerateQuickSearch');
	return $this->api->createobject($response,'GenerateQuickSearch'); 
	}
	
	public function GetPotentialEmailBlastRecipientsRequest($accesskey,$associationid,$secreteaccessid){  
	
	// Get file content    
	$filecontent = $this->api->GetFormat();
	if($filecontent=='Error') {
	$errormsg = 'API Request can not be generated';
	return false;
	}
	// Create API Request Headers
	$apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'GetPotentialEmailBlastRecipients',$accesskey,$associationid,$secreteaccessid);
	// Construct Body
	//This Method do not require Body tag 
	// Create Response			
	$response = $this->api->SendSoapRequest($apirequestheaders,$method='GetPotentialEmailBlastRecipients');
	return $this->api->createobject($response,'GetPotentialEmailBlastRecipients'); 
	}
	
	public function MatchVolunteersToJobOccurrencesRequest($accesskey,$associationid,$secreteaccessid,$jobOccurrenceID){  
	
	// Get file content    
	$filecontent = $this->api->GetFormat();
	if($filecontent=='Error') {
	$errormsg = 'API Request can not be generated';
	return false;
	}
	// Create API Request Headers
	$apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'MatchVolunteersToJobOccurrences',$accesskey,$associationid,$secreteaccessid);
	// Construct Body
	
	$body = '<s:Body>
	<MatchVolunteersToJobOccurrences xmlns="http://membersuite.com/contracts">
	<jobOccurrenceID>'.$jobOccurrenceID.'</jobOccurrenceID>
	</MatchVolunteersToJobOccurrences>
	</s:Body>';
	// Replace strings
	$apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
	// Create Response			
	$response = $this->api->SendSoapRequest($apirequest,$method='MatchVolunteersToJobOccurrences');
	return $this->api->createobject($response,'MatchVolunteersToJobOccurrences'); 
	}
	
	public function MatchJobOccurrencesToVolunteerRequest($accesskey,$associationid,$secreteaccessid,$volunteerID){  
	
	// Get file content    
	$filecontent = $this->api->GetFormat();
	if($filecontent=='Error') {
	$errormsg = 'API Request can not be generated';
	return false;
	}
	// Create API Request Headers
	$apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'MatchJobOccurrencesToVolunteer',$accesskey,$associationid,$secreteaccessid);
	// Construct Body
	
	$body = '<s:Body>
	<MatchJobOccurrencesToVolunteer xmlns="http://membersuite.com/contracts">
	<volunteerID>'.$volunteerID.'</volunteerID>
	</MatchJobOccurrencesToVolunteer>
	</s:Body>';
	// Replace strings
	$apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
	// Create Response			
	$response = $this->api->SendSoapRequest($apirequest,$method='MatchJobOccurrencesToVolunteer');
	return $this->api->createobject($response,'MatchJobOccurrencesToVolunteer'); 
	}
	
	public function GenerateInsertionOrderInvoicesRequest($accesskey,$associationid,$secreteaccessid,$issueId,$batchName,$invoiceTermsId,$searchToUse,$automaticallyEmailInvoices,$jobStatusNotificationEmail){  
	
	// Get file content    
	$filecontent = $this->api->GetFormat();
	if($filecontent=='Error') {
	$errormsg = 'API Request can not be generated';
	return false;
	}
	// Create API Request Headers
	$apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'GenerateInsertionOrderInvoices',$accesskey,$associationid,$secreteaccessid);
	// Construct Body
	$search = $this->api->createsearch($searchToUse);
	$body = '<s:Body>
	<GenerateInsertionOrderInvoices xmlns="http://membersuite.com/contracts">
	<issueId>'.$issueId.'</issueId>
	<batchName>'.$batchName.'</batchName>
	<invoiceTermsId>'.$invoiceTermsId.'</invoiceTermsId>
	<searchToUse>'.$search.'</searchToUse>
	<automaticallyEmailInvoices>'.$automaticallyEmailInvoices.'</automaticallyEmailInvoices>
	<jobStatusNotificationEmail>'.$jobStatusNotificationEmail.'</jobStatusNotificationEmail>
	</GenerateInsertionOrderInvoices>
	</s:Body>';
	// Replace strings
	$apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
	// Create Response			
	$response = $this->api->SendSoapRequest($apirequest,$method='GenerateInsertionOrderInvoices');
	return $this->api->createobject($response,'GenerateInsertionOrderInvoices'); 
	}
        
        public function FulfillSubscriptionsRequest($accesskey,$associationid,$secreteaccessid,$jobManifest){  
	
	// Get file content    
	$filecontent = $this->api->GetFormat();
	if($filecontent=='Error') {
	$errormsg = 'API Request can not be generated';
	return false;
	}
	// Create API Request Headers
	$apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'FulfillSubscriptions',$accesskey,$associationid,$secreteaccessid);
	// Construct Body
	$search = '';
        if($jobManifest->SubscriptionSearchToUseForFulfillment)
        {
        $searchobject = $jobManifest->SubscriptionSearchToUseForFulfillment;
        
        $search = $this->api->createsearch($searchobject);
        }
        $search1='';
        
        if($jobManifest->MembershipSearchToUseForFulfillment)
        {
        $searchobject1 = $jobManifest->MembershipSearchToUseForFulfillment;
        
        $search1 = $this->api->createsearch($searchobject1);
        }
	$body = '<s:Body>
	<FulfillSubscriptions xmlns="http://membersuite.com/contracts">
        <jobManifest xmlns:c="http://schemas.datacontract.org/2004/07/MemberSuite.SDK.Jobs">
	<c:BatchName>'.$jobManifest->BatchName.'</c:BatchName>
        <c:IssueID>'.$jobManifest->IssueID.'</c:IssueID>
	<c:SubscriptionSearchToUseForFulfillment>'.$search.'</c:SubscriptionSearchToUseForFulfillment>
        <c:MembershipSearchToUseForFulfillment>'.$search1.'</c:MembershipSearchToUseForFulfillment>
        </jobManifest>
	</FulfillSubscriptions>
	</s:Body>';
	// Replace strings
	$apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders); 
	// Create Response			
	$response = $this->api->SendSoapRequest($apirequest,$method='FulfillSubscriptions');
	return $this->api->createobject($response,'FulfillSubscriptions'); 
    }
    
    public function RenewSubscriptionsRequest($accesskey,$associationid,$secreteaccessid,$jobManifest){  
	
	// Get file content    
	$filecontent = $this->api->GetFormat();
	if($filecontent=='Error') {
	$errormsg = 'API Request can not be generated';
	return false;
	}
	// Create API Request Headers
	$apirequestheaders = $this->api->ConstructSoapHeaders($filecontent,$method = 'RenewSubscriptions',$accesskey,$associationid,$secreteaccessid);
	// Construct Body
	$search = '';
        $criteria='';
        $grouptype='';
        if($jobManifest->SubscriptionSearchToUseForRenewal)
        {
        $searchobject = $jobManifest->SubscriptionSearchToUseForRenewal;
        $search = $this->api->createsearch($searchobject);
        }
	$body = '<s:Body>
	<RenewSubscriptions xmlns="http://membersuite.com/contracts">
        <jobManifest xmlns="http://schemas.datacontract.org/2004/07/MemberSuite.SDK.Jobs">
        <PublicationID>'.$jobManifest->PublicationID.'</PublicationID>
        <SubscriptionSearchToUseForRenewal>'.$search.'</SubscriptionSearchToUseForRenewal>
	<BatchName>'.$jobManifest->BatchName.'</BatchName>
	<SendOutEmails>'.$jobManifest->SendOutEmails.'</SendOutEmails>
        </jobManifest>
        </RenewSubscriptions>
	</s:Body>';
	// Replace strings
	$apirequest = str_replace('<s:Body></s:Body>',$body,$apirequestheaders);
        //print_r($apirequest);die;
        // Create Response			
	$response = $this->api->SendSoapRequest($apirequest,$method='RenewSubscriptions');
	return $this->api->createobject($response,'RenewSubscriptions'); 
  }
}
?>