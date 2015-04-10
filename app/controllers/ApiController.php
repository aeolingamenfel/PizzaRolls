<?php

class ApiController extends Controller {
    
    protected function movieSearch()
    {
        
    }

    /**
     * Product comparison based on WalMart open API.
     */
    protected function productComparison()
    {
        /*
        * === ULTRA IMPORTANT VARIABLE, KEEP SAFE ===
        */
       $pricePerPizzaRoll = 0.087;
       /*
        * === ULTRA IMPORTANT VARIABLE ABOVE ===
        */

       $searchData = Input::get('search');

       $urlSafeSearchData = urlencode($searchData);

       $errorMessage = "";

       for($x=0; $x<5; $x++){
           try{
               $rawData = file_get_contents('http://api.walmartlabs.com/v1/search?query=' . $urlSafeSearchData . '&format=json&apiKey=uyaq7zdc4rwmx48qp6kqpgv3');

               $data = json_decode($rawData);

               if($data->totalResults > 0){
                   $items = $data->items;
                   $firstItem = $items[0];
                   $firstItem_arr = (array) $firstItem;

                   //return var_dump($firstItem);

                   $cost = $firstItem->salePrice;
                   $pizzaRollCost = floor($cost / $pricePerPizzaRoll);

                   $optionalData = array(
                       "description" => "shortDescription",
                       "image" => "thumbnailImage",
                       "ratingImage" => "customerRatingImage"
                   );

                   $output = array(
                       "raw" => $pizzaRollCost,
                       "cost" => $cost,
                       "name" => $firstItem->name,
                       "string" => "A " . $firstItem->name . " is worth " . $pizzaRollCost . " pizza rolls."
                   );

                   foreach($optionalData as $outputString=> $itemString){
                       if(isset($firstItem_arr[$itemString])){
                           $output[$outputString] = $firstItem_arr[$itemString];
                       }else{
                           $output[$outputString] = "";
                       }
                   }

                   return PizzaRoller::RollJSON(1, "Found item! Amount of pizza rolls incoming.", PizzaRoller::ArrayToObject($output));
               }else{
                   return PizzaRoller::RollJSON(-1, "Could not find item.", null);
               }
           }catch(Exception $exception){
               $errorMessage .= "\n" . $exception->getMessage();
           }
       }
       return PizzaRoller::RollJSON(-1, $errorMessage, null);
    }

}
