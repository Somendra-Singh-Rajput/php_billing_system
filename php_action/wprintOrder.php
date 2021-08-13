<?php    

require_once 'core.php';

$orderId = $_POST['orderId'];

$sql = "SELECT order_id,order_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due, payment_place,gstn FROM worders WHERE order_id = $orderId";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();

$order_id = $orderData[0];
$orderDate = $orderData[1];
$clientName = $orderData[2];
$clientContact = $orderData[3]; 
$subTotal = $orderData[4];
$vat = $orderData[5];
$totalAmount = $orderData[6]; 
$discount = $orderData[7];
$grandTotal = $orderData[8];
$paid = $orderData[9];
$due = $orderData[10];
$payment_place = $orderData[11];
$gstn = $orderData[12];

$orderItemSql = "SELECT order_item.product_id, order_item.rate, order_item.quantity, order_item.total,
product.product_name FROM order_item INNER JOIN product ON order_item.product_id = product.product_id WHERE order_item.order_id = $orderId";

$orderItemResult = $connect->query($orderItemSql);
$table = '<style> .star img { visibility: visible;} </style>
         <table align="center" cellpadding="0" cellspacing="0" style="width: 100%;border:1px solid black;margin-bottom: 10px;">
               <tbody>
                  <tr>
                     <td colspan="5" style="text-align:center;color: red;text-decoration: underline; font-size: 25px;">Prabha Artlife Wellness Center</td>
                  </tr>
                  <tr><td colspan="5" style=" text-align:center;padding-top:10px;"></td></tr>
                  <tr>
                     <td colspan="5" style="text-align:center;">Plot No.-215 Laxmi Nagar,Niwaru Road,Jhotwara,Jaipur-302012</td>
                  </tr>
                  <tr>
                     <td colspan="5" style="text-align:center;color: blue;text-decoration: underline;">Mobile : 9694099153 & Email: prabhaartlife@gmail.com</td>
                  </tr>
                   <tr><td colspan="5" style=" text-align:center;padding-top:10px;"></td></tr>

                   <td colspan="5" style="text-align:center;font-weight:bold">GSTN - 08AAYFP4998C1ZE</td>

                   <tr><td colspan="5" style=" text-align:center;padding-top:10px;"></td></tr>

                   <tr>
                     <td colspan="5" style="width:100%;height:40px;text-align:center;background-color:red;color:black;font-size: 25px;border-right:1px solid black;border-left: 1px solid black;border-bottom: 1px solid red;border-top: 1px solid black;-webkit-print-color-adjust: exact;">TAX INVOICE</td>
                  </tr>
              
                  <tr>
                     <td colspan="2" style="padding: 0px;vertical-align: top;border-right:1px solid black;">
                        <table align="left" cellpadding="0" cellspacing="0" style=" width: 100%">
                           <tbody>
                              <tr>
                                 <td style="width: 70px;vertical-align:top;color:red;border-top:1px solid black;border-left:1px solid black;" rowspan="3">TO, </td>
                                 <td style="border-bottom-style: solid; border-bottom-width: thin;border-top: 1px solid black; font-size: 20px">Mr./Mrs./Ms. - '.$clientName.'</td>
                              </tr>

                           </tbody>
                        </table>
                        <table align="left" cellspacing="0" style="width: 100%; ">
                           <tbody>
                              <tr>
                                 <td style="border-left-style: solid; border-left-width: thin; border-left-color: black; border-bottom-style: solid; border-bottom-width: thin;border-bottom-color: black; font-size: 20px">Mobile No: '.$clientContact.'</td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                     <td style="padding: 0px;vertical-align: top;" colspan="3">
                        <table align="left" cellpadding="0" cellspacing="0" style="width: 100%">
                           <tbody>
                              <tr>
                                 <td style="border-bottom-style: solid;border-bottom-width: thin;border-bottom-color: black;border-top: 1px solid black;border-right: 1px solid black;color: black; text-align:right;font-size: 20px">Invoice No : INV-'.$order_id.'</td>
                              </tr>
                              <tr>
                                 <td style=" border-right:1px solid black;font-size: 20px; text-align:right;">Invoice Date: '.$orderDate.'</td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td style="width: 50px; text-align:center; background-color:white; color:black; border-right:1px solid black; border-left:1px solid black; border-bottom-style:solid;border-bottom-width:thin;border-bottom-color:black;">S. NO. </td>

                     <td style="width: 50px; text-align:center; border-bottom-style:solid; border-right:1px solid black;border-bottom-width:thin; border-bottom-color:black; color:black; background-color:white;">Item Name</td>

                     <td style="width: 150px;text-align: center;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-top-width: thin;border-right-width: thin;border-bottom-width: thin;border-top-color: black;border-right-color: #000;border-bottom-color: black;background-color: white;color: black;">Qty.</td>

                     <td style="width: 150px;text-align: center;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-top-width: thin;border-right-width: thin;border-bottom-width: thin;border-top-color: black;border-right-color: #000;border-bottom-color: black;background-color: white;color: black;">Rate&nbsp; In &#8377;
                     </td>

                     <td style="width: 150px;text-align: center;border-top-style: solid;border-right-style: solid;border-bottom-style: solid;border-top-width: thin;border-right-width: thin;border-bottom-width: thin;border-top-color: black;border-right-color: black;border-bottom-color: black;color:black; background-color: white;">Amount&nbsp; In &#8377;
                     </td>
                  </tr>';
                  $x = 1;
                  $cgst = 0;
                  $igst = 0;
                  if($payment_place == 2)
                  {
                     $igst = $subTotal*18/100;
                  }
                  else
                  {
                     $cgst = $subTotal*9/100;
                  }
                  $total = $subTotal+2*$cgst+$igst;
            while($row = $orderItemResult->fetch_array()) {       
                        
               $table .= '<tr>
                     <td style="border-left: 1px solid black;border-right: 1px solid black;height: 27px; text-align:center;">'.$x.'.</td>
                     <td style="height: 27px;">'.$row[4].'</td>
                     <td style="border-left: 1px solid black;height: 27px; text-align:center;">'.$row[2].'</td>
                     <td style="border-left: 1px solid black;height: 27px; text-align:right;">'.$row[1].'</td>
                     <td style="border-left: 1px solid black;border-right: 1px solid black;height: 27px; text-align:right;">'.$row[3].'</td>
                  </tr>
               ';
            $x++;
            } // /while
                $table.= '
                  <tr style="border-bottom: 1px solid black;">
                     <td style="border-left: 1px solid black;border-right: 1px solid black;height: 27px;"></td>
                     <td style="height: 27px;"></td>
                     <td style="border-left: 1px solid black;height: 27px;"></td>
                     <td style="width: 149px;border-right:1px solid black;border-bottom:1px solid black;background-color:white; color:black; padding-left: 5px;-webkit-print-color-adjust: exact; text-align:right;border-left:1px solid black;border-top-style:solid;border-top-width: thin;border-top-color: black;">Total</td>

                     <td style="width: 218px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-top-width: thin; border-right-width: thin; border-bottom-width: thin; border-top-color: black; border-right-color: black; border-bottom-color: black; text-align:right;">'.$subTotal.'</td>
                  </tr>
                  <tr>
                     <td colspan="3" style="border-top: 1px solid black;border-left: 1px solid black;padding: 5px; font-style:bold;font-weight:400;text-decoration:underline;font-size:20px">Terms & Conditions</td>
                     <td rowspan="2" style="border-bottom: 1px solid black;width: 199px;color: black;background-color: white;padding-left: 5px;-webkit-print-color-adjust: exact; text-align:right;border-left:1px solid black;">S.G.S.T. 9%</td>
                     <td rowspan="2" style="border-bottom: 1px solid black;width: 288px;border-right:1px solid black; text-align:right;border-left:1px solid black;">'.$cgst.'.00</td>
                  </tr>
                  <tr>
                     <td colspan="3" style="width: 859px;border-left: 1px solid black;padding: 5px;">Goods once sold will not be taken back and exchanged.</td>
                  </tr>
                  <tr>
                     <td colspan="3" style="border-left: 1px solid black;padding: 5px;">Bills not paid due date will attract 24% interest.</td>
                     <td rowspan="2" style="border-bottom: 1px solid black;width: 149px;background-color: white;color: black;padding-left: 5px;-webkit-print-color-adjust: exact; text-align:right;border-left:1px solid black;">C.G.S.T. 9%</td>
                     <td rowspan="2" style="width:218px;border-bottom: 1px solid black;border-right: 1px solid black; text-align:right;border-left: 1px solid black;">'.$cgst.'.00
                     </td>
                  </tr>
                  <tr>
                     <td colspan="3" style="border-left: 1px solid black;padding: 5px;">All disputes subject to Jurisdication only.</td>
                  </tr>
                  <tr>
                     <td colspan="3" style="border-left: 1px solid black;padding: 5px;">Prescribed Sale Tax declaration bill be given.</td>
                     <td style="border-bottom: 1px solid #fff;background-color: white;color: black;padding: 5px;-webkit-print-color-adjust: exact; text-align:right;border-left:1px solid black;border-bottom:1px solid black;">Grand Total</td>
                     <td style="border-bottom: 1px solid black;border-right: 1px solid; text-align:right;border-left: 1px solid black;border-bottom:1px solid black;">'.$total.'.00</td>
                  </tr>
                  <tr>
                  <td colspan="6" style="height:60px;margin-bottom:20px;vertical-align: bottom;padding: 5px;color: red;border-right: 1px solid black;text-align: left; font-style:bold;font-weight:400;font-size:22px;border-left:1px solid black;">Authorised Signatory:</td>
                  </tr>
               </tbody>
            </table>';
$connect->close();

echo $table;