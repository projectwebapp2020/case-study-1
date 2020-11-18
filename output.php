 <?php

//date
echo "" . date("l") . date("d/m/Y") . "\n";
date_default_timezone_set("Asia/Kuala_Lumpur");
echo " " . date("h:i:sa");
echo "\n";

 // ARRAYLIST
 $item = array(
            array(
                "item_name"=>"Maggi Kari",
                "price"=> 4.50,
                "disc" => 0,
              ),
            array(
                  "item_name"=>"Milo 3 in 1",
                  "price"=> 12.70,
                  "disc" => 0,
              ),
            array(
                  "item_name"=>"Nescafe Latte Caramel",
                  "price"=> 17.60,
                  "disc" => 0,
              ),
            array(
                "item_name"=>"30 eggs carton",
                "price"=> 8.90,
                "disc"=> 0.25,
            ),
            array(
                "item_name"=>"Nestum Honey",
                "price"=> 8.70,
                "disc"=> 0,
            ),
            array(
                "item_name"=>"Axion Dishsoap",
                "price"=> 6.10,
                "disc"=> 0.12,
            ),
            array(
                "item_name"=>"Condensed Milk",
                "price"=> 3.20,
                "disc"=> 0,
            ),
            array(
                "item_name"=>"Baby Carrot",
                "price"=> 3.70,
                "disc"=> 0,
            ),
            array(
                "item_name"=>"Mineral Water",
                "price"=> 1.20,
                "disc"=> 0,
            ),
            array(
                "item_name"=>"Coca-cola 250ml",
                "price"=> 1,
                "disc"=> 0,
            )
            );

//variables
$qty   = $_GET['itemQuantity'];
$list = $_GET['itemChecked'];
$q = count($qty);
$n = count($list);

//Function search item name to match between checkbox value and array $list
function searchName($list, $item)
{
  foreach ($item as $key => $val) {
    if ($val["item_name"] === $list) {
      return $key; // return same index value between itemChecked[] and item[]
    }
  }
  return null;
}

//Array to remove all 0/null from quantity input
  if(empty($_GET['itemQuantity']))
  {
  echo("You didn't select any quantity.");
  }
  else{
    for($j=0 ; $j < 10 ; $j++){ //since we have 10 rows/list
        if ($qty[$j]!=0) { //creates a new array without 0
          $arrayq[$j] = ($qty[$j]);
          $arrayq = array_values($arrayq); //re-index array back into ascending order
        }
      }
    }

header('Content-Type: text/plain');

//Display
  if(empty($_GET['itemChecked']))
  {
  echo("You didn't select any list.");
  }
  else{
    echo("\nHere is your receipt: " ) . "\n";
    echo ("\nItem Name\t\tPrice\tDiscount\tQuantity\tTotal \n" );
    echo "---------------------------------------------------------------------------- \n";

    for($i=0 ; $i < $n ; $i++){

      $new = searchName($list[$i], $item);
      $new_discount = $arrayq[$i] * ($item[$new]["price"] - ($item[$new]["price"] * $item[$new]["disc"]));
      echo($item[$new]["item_name"]) . "\t\t" .($item[$new]["price"]) . "\t" .
          ($item[$new]["disc"]) ."\t\t". ($arrayq[$i]) ."\t\t". $new_discount;
      echo "\n";

      $subtotal[$i] = 0;
      $subtotal[$i] = $subtotal[$i] + $new_discount;
        }

      $s = array_sum($subtotal);
      $gst = round($s * 0.06, 2);
      $pay = round($gst + $s, 2);
      echo "\nSubtotal : RM" . round($s, 2) ;
      echo "\n";
      echo "\nGST 6%: RM" . $gst ;
      echo "\n";
      echo "\nTotal need to pay: RM" . $pay ;

      }



/*DISPLAY array list--for testing purposes
echo "\n \n";
print_r($qty);
echo "\n";
print_r($list);
echo "\n";
print_r($arrayq);
echo "\n";
print_r ($subtotal);
echo "\n";
*/

 ?>
