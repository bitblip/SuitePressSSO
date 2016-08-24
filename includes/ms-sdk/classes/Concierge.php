<?php
/*
 This class is used to create request and generate response.
 Created Date: 02/April/2013
 Created By: SmartdataInc.
*/

$filedir = dirname(__FILE__);
$filedir = substr($filedir,0,-7);
include_once($filedir.'lib/Config.php');
include_once($filedir.'lib/Curl.php');

class Concierge{

  function __construct(){
    $this->crypt = new CryptoManager();
  }

  // Get Request Format
  protected function Getformat(){
    $filecontent = Config::read("Commonxml");
    /*
     if(!file_exists($filepath)){
      $error = 'Error';
      return $error;
    }
    $filecontent = file_get_contents($filepath);
    */
    return $filecontent;
  }

   // This function to construct SOAP Action and Headers
  protected function ConstructSoapHeaders($xmlformat,$method,$accesskey,$associationid,$SecretAccessKey){
    $action = "http://membersuite.com/contracts/IConciergeAPIService/$method";
    $messagesignature = $this->crypt->GenerateMessageSignature($method, $SecretAccessKey, $associationid, $SessionId = "");
    // Values that needs to be changed
    $replacearr = array('<Action></Action>',
                        '<AccessKeyId></AccessKeyId>',
                        '<AssociationId></AssociationId>',
                        '<Signature></Signature>',
                        );
    // By these values
    $replacevalue = array('<Action>'.$action.'</Action>',
                          '<AccessKeyId>'.$accesskey.'</AccessKeyId>',
                          '<AssociationId>'.$associationid.'</AssociationId>',
                          '<Signature>'.$messagesignature.'</Signature>',
                          );
    // Replace strings
    $apiheaderrequest = str_replace($replacearr,$replacevalue,$xmlformat);
    return $apiheaderrequest;
  }

  // This function sends the request api to the Concierge Server
  protected function SendSoapRequest($requestapi,$method){
    // Calling cURL class
    $curl = new Curl();
    $curl->url = 'https://soap.membersuite.com';
    $curl->header = array (
           "SOAPAction:http://membersuite.com/contracts/IConciergeAPIService/$method",
           'Content-Type: text/xml; charset=utf-8',
          );
	
    $curl->postdata = $requestapi;
    $result = $curl->init();
    return $result;
  }

  protected function createobject($xmlresponse,$method){
    error_log($xmlresponse);
    $string = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xmlresponse);
    $xml = simplexml_load_string($string);
    $json = json_encode($xml);
    $responseObject = json_decode($json,False);

    if(isset($responseObject->sBody->sFault->faultstring)){
      return $responseObject->sBody->sFault->faultstring;
    }
    else{
      $response = $method.'Response';
      $gvresponse = $method.'Result';

      return $responseObject->sBody->$response->$gvresponse;
    }
  }

  protected function createsearch($searchToUse)
  {
    $search = '';
    if($searchToUse->Criteria)
    {
        $search.='<b:Criteria>';
        foreach($searchToUse->Criteria as $criteria)
        {
            if(isset($criteria->Criteria))
            {
                $search.='<b:Criteria>';
               foreach($criteria->Criteria as $objcriteria)
               {
                $search.='<b:SearchOperation i:type="c:'.$objcriteria['Type'].'" xmlns:c="http://schemas.datacontract.org/2004/07/MemberSuite.SDK.Searching.Operations">
                <b:FieldName>'.$objcriteria['FieldName'].'</b:FieldName>
                <b:ValuesToOperateOn xmlns:d="http://schemas.microsoft.com/2003/10/Serialization/Arrays">';
                $value= $objcriteria['Value'];
                if(is_array($value))
                {
                foreach($value as $value)
                {
                $search.='<d:anyType i:type="a:string">'.$value.'</d:anyType>';
                }
                }
                else
                {
                $search.='<d:anyType i:type="a:string">'.$value.'</d:anyType>';
                }

                $search.='</b:ValuesToOperateOn></b:SearchOperation>';
                }
                $search.='</b:Criteria>';

                if(isset($criteria->GroupType))
                {
                    foreach($criteria->GroupType as $GroupType)
                    {
                        $search.='<b:GroupType>'.$GroupType['GroupType'].'</b:GroupType>';
                    }
                }
                else
                {
                    $search.='<b:GroupType>And</b:GroupType>';
                }

            }
            else
            {
                $search.='<b:SearchOperation i:type="c:'.$criteria['Type'].'" xmlns:c="http://schemas.datacontract.org/2004/07/MemberSuite.SDK.Searching.Operations">
                <b:FieldName>'.$criteria['FieldName'].'</b:FieldName>
                <b:ValuesToOperateOn xmlns:d="http://schemas.microsoft.com/2003/10/Serialization/Arrays">';
                $value= $criteria['Value'];
                if(is_array($value))
                {
                 foreach($value as $value)
                 {
                     $search.='<d:anyType i:type="a:string">'.$value.'</d:anyType>';
                 }
                }
                else
                {
                 $search.='<d:anyType i:type="a:string">'.$value.'</d:anyType>';
                }

                $search.='</b:ValuesToOperateOn></b:SearchOperation>';

                }

            }
         $search.='</b:Criteria>';
    }
    else
    {
        $search.='<b:Criteria></b:Criteria>';
    }

    if($searchToUse->GroupType)
    {
        foreach($searchToUse->GroupType as $GroupType)
        {
            $search.='<b:GroupType>'.$GroupType['GroupType'].'</b:GroupType>';
        }

    }
    else
    {
        $search.='<b:GroupType>And</b:GroupType>';
    }

    if($searchToUse->OutputColumn)
    {
        $search.='<b:OutputColumns>';
        foreach($searchToUse->OutputColumn as $outputcoloumn)
        {
            $search.='<b:SearchOutputColumn><b:AggregateFunction>'.$outputcoloumn['Aggregate'].'</b:AggregateFunction><b:ColumnWidth>0</b:ColumnWidth>';
            $search.='<b:DisplayName>'.$outputcoloumn['ColoumnName'].'</b:DisplayName><b:Hidden>false</b:Hidden><b:Name>'.$outputcoloumn['ColoumnName'].'</b:Name></b:SearchOutputColumn>';
        }
        $search.='</b:OutputColumns>';
    }
    else
    {
        $search.='<b:OutputColumns></b:OutputColumns>';
    }

    if($searchToUse->Sortcolumn)
    {
        $search.='<b:SortColumns>';
        foreach($searchToUse->Sortcolumn as $SortColumn)
        {
            $search .= '<b:SearchSortColumn><b:IsDescending>'.$SortColumn['isDescending'].'</b:IsDescending>';
            $search .='<b:Name>'.$SortColumn['ColoumnName'].'</b:Name></b:SearchSortColumn>';
        }
        $search.='</b:SortColumns>';
    }
    else
    {
        $search.='<b:SortColumns></b:SortColumns>';
    }
    $search.='<b:Type>'.$searchToUse->Type.'</b:Type>';
    return $search;
  }

  protected function isAssocArray($arr){
  	  return array_keys($arr) !== range(0, count($arr) - 1);
  }

  protected function build_msnode($objectarr){
    $objecttype = '';
    while(list($key, $value) = each($objectarr)) {
      // First do some quick validation
      if(is_array($value) && sizeof($value) == 0) {
        $value = '';
      }
 		  if($key == 'ClassType') {
	 		  $objecttype.= '<mem:ClassType>'.$value.'</mem:ClassType><mem:Fields>'.$this->build_msnode($objectarr).'</mem:Fields>';
		 	  break;
		  } else if (is_array($value)){
			  $arrData = '';
			  
			  if (key($value) === 'RecordType'){
			 	  $arrData.='i:type="mem:'.current($value).'">';
				  foreach ($value as $k => $v){
					  if ($k !== 'RecordType'){
						  $arrData.='<mem:'.$k;
						  if (!is_array($v) && strlen($v) > 0)
							$arrData.='>'.$v.'</mem:'.$k.'>';
						  else
							$arrData.=' i:nil="true" />';
						}
				  }
			} else if (is_array(reset($value)) && key(reset($value)) == 'ClassType'){
				  $arrData.='i:type="mem:ArrayOfMemberSuiteObject">';
				  if (key($value) === 'ClassType'){
						$arrData.='<mem:MemberSuiteObject>'.$this->build_msnode($value).'</mem:MemberSuiteObject>';
				  } else {
					  foreach ($value as $k => $v) {
						  if (!is_array($v) && !is_object($v)){
							  $arrData.='<mem:Key>'.$k.'</mem:Key><mem:Value i:type="a:string">'.$v.'</mem:Value>';
						  } else if ($v != null) {
							  $arrData.='<mem:MemberSuiteObject>'.$this->build_msnode($v).'</mem:MemberSuiteObject>';
						  }
					  }
				  }
			} else {
				// Simple array
				$arrData.= 'i:type="arr:ArrayOfstring" xmlns:arr="http://schemas.microsoft.com/2003/10/Serialization/Arrays">';
				foreach($value as $k=>$v){
					if (!is_array($v)) {
					$arrData.='<arr:string>'.$v.'</arr:string>';
					}
				}
			}
			if (strlen($arrData) > 0) {
					$objecttype.='<mem:KeyValueOfstringanyType><mem:Key>'.$key.'</mem:Key><mem:Value '.$arrData.'</mem:Value></mem:KeyValueOfstringanyType>';
			}
		  } else {
			  
        $objecttype.= '<mem:KeyValueOfstringanyType>
          <mem:Key>'.$key.'</mem:Key><mem:Value ';
		    if(strlen($value) > 0) {
			    if (preg_match("/(\d{4})-(\d{2})-(\d{2})T(\d{2}):(\d{2}):(\d{2})/", $value)){
					$objecttype.= 'i:type="a:dateTime"';
				}
				else {
					$objecttype.= 'i:type="a:string"';
				}
		    }
			else {
			    $objecttype.= 'i:nil="true"';
		    }
		    $objecttype.= '>'.$value.'</mem:Value>
          </mem:KeyValueOfstringanyType>';
		  }
	  }
	  return $objecttype;
  }

  protected function str_replace_last( $search , $replace , $str ) {
    if( ( $pos = strrpos( $str , $search ) ) !== false ) {
        $search_length  = strlen( $search );
        $str = substr_replace( $str , $replace , $pos , $search_length );
    }
    return $str;
  }

  protected function object_to_array($data)
  {
    if ((!is_array($data)) and (!is_object($data))) return $data;

    $result = array();
    $data = (array) $data;
    foreach ($data as $key => $value) {
      if (is_object($value))
        $value = (array) $value;

      if (is_array($value))
        $result[$key] = $this->object_to_array($value);
      else
        $result[$key] = $value;
    }
    return $result;
  }

  protected function build_msobject($data) {
	  if (property_exists($data, 'bClassType') &&
	      property_exists($data, 'bFields') &&
	      property_exists($data->bFields, 'bKeyValueOfstringanyType')){
		  $obj = new stdClass();
		  $obj->ClassType = $data->bClassType;
		  $fields = $data->bFields->bKeyValueOfstringanyType;
		  foreach($fields as $value) {
			  $key = $value->bKey;
			  if (property_exists($value->bValue, 'bMemberSuiteObject')) {
				  $inner = $value->bValue->bMemberSuiteObject;
				   if (is_array($inner) && !$this->isAssocArray($inner)){
					  $obj->{$key} = array();
					  foreach ($inner as $k => $v){
						  $obj->{$key}[$k] = $this->build_msobject($v);
					  }
				  } else {
					  $obj->{$key} = $this->build_msobject($value->bValue->bMemberSuiteObject);
				  }
			  } else {
				  // TODO - Custom Handler for Address. May need to add for other similar types.
				  //if (strlen($key) > 8 && substr($key, -8) == '_Address' && !empty((array)$value->bValue)) {
				  if (!empty((array)$value->bValue) && $this->isAddressArray((array)$value->bValue)) {
					$addr = new Address();
					foreach ($value->bValue as $k => $v){
					  $addr->{ltrim($k,'b')} = $v;
					}
					$obj->{$key} = $addr;
				  } else if (property_exists($value->bValue, 'cstring')) {
					$obj->{$key} = $value->bValue->cstring;
				  } else {
					$obj->{$key} = $value->bValue;
				  }
			  }
		  }
		  return $obj;
	  }
	  throw new Exception("Could not convert to MemberSuite object.");
  }
  
  protected function isAddressArray($arr) {
	  return array_key_exists("bLine1",$arr) and array_key_exists("bCity",$arr) and array_key_exists("bState",$arr) and array_key_exists("bPostalCode",$arr);
  }
}
?>