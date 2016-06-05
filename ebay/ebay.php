<?php

class ConnEbay
{
    private $dev_id,$app_id,$cert_id,$server_url,$list,$sold,$user_token,$username,$site_id,$start_time_from,$start_time_to,$entry_per_page,$compact_level;

  function __construct($config)
  {
      $this->dev_id = $config['DEV_ID'];
      $this->app_id = $config['APP_ID'];
      $this->cert_id= $config['CERT_ID'];
      $this->server_url = $config['SERVER_URL'];
      $this->user_token = $config['USER_TOKEN'];
      $this->username = $config['USERNAME'];
      $this->site_id = $config['SITE_ID'];
      $this->list =  $config['LIST'];
      $this->sold =  $config['SOLD']; 
      $this->start_time_from = $config['START_TIME_FROM'];
      $this->start_time_to = $config['START_TIME_TO'];
      $this->entry_per_page = $config['ENTRIES_PER_PAGE'];
      $this->compact_level =$config['COMPAT_LEVEL'];
  
      
  }

 //Regulates versioning of the XML interface for the API
  
  function setXML($call,$itemID='')
  {  

     $header = array (
        "X-EBAY-API-COMPATIBILITY-LEVEL: " . $this->compact_level,
        //set the keys 
        "X-EBAY-API-DEV-NAME: " .  $this->dev_id,
        "X-EBAY-API-APP-NAME: " . $this->app_id,
        "X-EBAY-API-CERT-NAME: " . $this->cert_id,
        //the name of the call we are requesting
        "X-EBAY-API-SITEID: " . $this->site_id,
        );

     if (isset($call) && isset($itemID)) {

            $itemID=$itemID;

            if($call == 'list')
         { 
           $tag = $this->list;
           $list = "X-EBAY-API-CALL-NAME: " . $this->list;
         }

           elseif($call == 'sold')
          {
              $tag = $this->sold;
              $list = "X-EBAY-API-CALL-NAME: " . $this->sold;
              $itemID='<ItemID>'.$itemID.'</ItemID>';
         }

        array_push ($header,$list);
        $this->headers=$header;
        
     }

     else {
       die('Parameter is missing');
     }


     //Build the request Xml string

      $this->requestXmlBody ='<?xml version="1.0" encoding="utf-8"?>
          <'.$tag.'Request xmlns="urn:ebay:apis:eBLBaseComponents">
            <RequesterCredentials>
          <eBayAuthToken>'.$this->user_token.'</eBayAuthToken>
          </RequesterCredentials>
           '.$itemID.'
          <DetailLevel>ReturnAll</DetailLevel> 
          </'.$tag.'Request>';
       
          //print_r($this->requestXmlBody);
         // die;

  }

// for creating connection with EBAY through API

      function setConn()
      {
        $url= $this->server_url;
        $curl_conn=$this->curl($url);
        if($curl_conn['httpcode'] == 200) // checking if connection is created or not using  HTTP status code
          {
            $response=$curl_conn['response'];
            return $response;
          }
        else 
          { 
            die("Not connected");
          }
      }


  function curl($url)

  {
        $connection = curl_init();
        //set the server we are using (could be Sandbox or Production server)
        curl_setopt($connection, CURLOPT_URL,$url);
        //stop CURL from verifying the peer"s certificate
        curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($connection, CURLOPT_SSL_VERIFYHOST, 0);
        //set the headers using the array of headers
        curl_setopt($connection, CURLOPT_HTTPHEADER, $this->headers);
        //set method as POST
        curl_setopt($connection, CURLOPT_POST, 1);
        //set the XML body of the request
        curl_setopt($connection, CURLOPT_POSTFIELDS, $this->requestXmlBody);
        //set it to return the transfer as a string from curl_exec
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
        //Send the Request
        $response = curl_exec($connection);  // executing the CURL connection
        $httpcode = curl_getinfo($connection, CURLINFO_HTTP_CODE); // getting the HTTP status code
        $data['response'] = $response;
        $data['httpcode']= $httpcode;

        return  $data;
  }


// for listing of orders
    function getOrder($response)
  {
      $data=simplexml_load_string($response); // Interprets a string of XML into an object 
      return json_encode($data);  // encoding the data into JSON object

  }

//for closing the connection
  function disconn()
  {
     //close the connection
     curl_close($connection);
  }
}

?>


