<?php
/*
 Global configuration file
 Created Date: 21/March/2013
*/
class Config{

 public static function Read($name){
 
  $config = array(
             'Commonxml' => '<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/" xmlns:mem="http://schemas.datacontract.org/2004/07/MemberSuite.SDK.Types"
                               xmlns:i="http://www.w3.org/2001/XMLSchema-instance"
                              xmlns:a="http://www.w3.org/2001/XMLSchema"
                              xmlns:b="http://schemas.datacontract.org/2004/07/MemberSuite.SDK.Searching">
                                <s:Header>
                                  <Action></Action>
                                  <To>https://soap.membersuite.com</To>
                                  <ConciergeRequestHeader xmlns:i="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://membersuite.com/schemas">
                                    <SessionId i:nil="true" />
                                    <AccessKeyId></AccessKeyId>
                                    <AssociationId></AssociationId>
                                    <Signature></Signature>
                                  </ConciergeRequestHeader>
                                </s:Header>
                                <s:Body></s:Body>
                              </s:Envelope>',
			 'BaseNamespaces' => 'xmlns:mem="http://schemas.datacontract.org/2004/07/MemberSuite.SDK.Types"
                               xmlns:i="http://www.w3.org/2001/XMLSchema-instance"
                              xmlns:a="http://www.w3.org/2001/XMLSchema"'
            );
  
  return $config[$name];
 
 }
 
}

?>
