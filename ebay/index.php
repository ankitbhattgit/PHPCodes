

  <?php
     
     include 'config.php';  // including the configuration class
     include 'ebay.php';   //including the main ebay class
     $list='list';
     $sold='sold';

     $ebayobj = new ConnEbay($config);    // creating object of the class 
      $ebayobj ->setXML($list);           // set headers and tags for XML request
     $conn_list = $ebayobj->setConn();    // creating connection for product listing 

     $response_list = $ebayobj->getOrder($conn_list);  //getting the order information in json format            
     $response_list = json_decode($response_list);     // decoding the json object

     if (isset($response_list)) {

       $active_list = $response_list->ActiveList->ItemArray->Item;
        if(is_array($active_list))  // for checking if their are more then one items in the current listing
          {
              $active_list = $response_list->ActiveList->ItemArray->Item;
         }
         else{
            $active_list = $response_list->ActiveList->ItemArray;
         }
     
     }
     

     $ItemID=$response_list->SoldList->OrderTransactionArray->OrderTransaction->Transaction->Item->ItemID; // loop

     $ebayobj ->setXML($sold,$ItemID);
     $conn_sold = $ebayobj->setConn();    // creating connection for sold products
     $response_sold = $ebayobj->getOrder($conn_sold);  //getting the order information in json format            
     $response_sold = json_decode($response_sold); 
   
  
    $item_sold = $response_list->SoldList->OrderTransactionArray->OrderTransaction;
      
   ?>

 <!DOCTYPE html>
 <html>
   <head>
     <link rel="stylesheet" type="text/css" href="style.css">
   </head>
   <body>
    <div class="wrapper">
     <table>
      <caption>Active listing</caption>
      <th>Title</th>
      <th>Image</th>
      <th>Item id</th>
      <th>SKU</th>
      <th>Price</th>
      <th>Shipping type</th>
      
      
               <?php 
                    
                  foreach ($active_list as $key => $product) {
                
               //  looping through the orders one by one
              
                     echo '<tr><td>'.$product->Title.'</td>';
                      echo '<td>';
                     if(isset($product->PictureDetails->GalleryURL))  // check if the product has an image or not
                      { 
                        echo '<img src='.$product->PictureDetails->GalleryURL.' />';
                      }
                     echo '</td>';                  
                    echo '<td>'.$product->ItemID.'</td>';
                      echo '<td>';
                     if(isset($product->SKU))  // check if the product has an SKU or not
                      { 
                       echo $product->SKU;
                      }
                     echo '</td>';   
                     echo '<td>'.$product->SellingStatus->CurrentPrice.'</td>';
                    echo '<td>'.$product->ShippingDetails->ShippingType.'</td></tr>';
                  }
          ?>
     </table>
      <table>
      <caption>Sold Items</caption>

               <?php 
               foreach ($item_sold as $key => $product) {

                 $detail['email'] = $product->Buyer->Email;

               }
               foreach (array($response_sold) as $key => $product) {
                     echo '<tr><td>Title</td><td>'.$product->Item->Title.'</td></tr>';
                                  
                    echo '<tr><td>Item id</td><td>'.$product->Item->ItemID.'</td></tr>';
                      echo '<tr><td>SKU</td><td>';
                     if(isset($product->Item->SKU))  // check if the product has an SKU or not
                      { 
                       echo $product->Item->SKU;
                      }
                     echo '</td></tr>';   
                     echo '<tr><td>OrderID</td><td>'.$product->TransactionArray->Transaction->OrderLineItemID.'</td></tr>';         
                     echo '<tr><td>Amount</td><td>'.$product->TransactionArray->Transaction->AmountPaid.'</td></tr>';
                    echo '<tr><td>Paid Status</td><td>'.$product->TransactionArray->Transaction->Status->CompleteStatus.'</td></tr>';
           echo '<tr><td>Payment Method</td><td>'.$product->TransactionArray->Transaction->Status->PaymentMethodUsed.'</td></tr>';
                    echo '<tr><td>Shipping type</td><td>'.$product->TransactionArray->Transaction->ShippingDetails->ShippingType.'</td></tr>';
                    //echo '<tr><td>Email</td><td>'.$detail['email'].'</td></tr>';
                        echo '<tr><td>Name</td><td>'.$product->TransactionArray->Transaction->Buyer->BuyerInfo->ShippingAddress->Name.'</td></tr>';
                      echo '<tr><td>Email</td><td>'.$product->TransactionArray->Transaction->Buyer->Email.'</td></tr>';
                    echo '<tr><td>ID</td><td>'.$product->TransactionArray->Transaction->Buyer->UserID.'</td></tr>';
                echo '<tr><td>Country</td><td>'.$product->TransactionArray->Transaction->Buyer->BuyerInfo->ShippingAddress->Country.'</td></tr>';
        echo '<tr><td>Address</td><td>'.$product->TransactionArray->Transaction->Buyer->BuyerInfo->ShippingAddress->Street1 .' ,' . $product->TransactionArray->Transaction->Buyer->BuyerInfo->ShippingAddress->CityName.' ,' . $product->TransactionArray->Transaction->Buyer->BuyerInfo->ShippingAddress->StateOrProvince.'</td></tr>';
              
             }
                
          ?>
     </table>
    </div>
  </body>
 </html>