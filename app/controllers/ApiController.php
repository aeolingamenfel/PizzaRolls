<?php

class ApiController extends Controller {
    
    protected function movieSearch()
    {
        $pricePerPizzaRoll = PizzaRoller::GetPizzaRollPrice();
        $query = Input::get('search');
        $query = urlencode($query);
        
        $rawData = file_get_contents('http://api.themoviedb.org/3/search/movie?api_key=9004a44d87b2613704631f1013b47cc9&query=' . $query);
        
        $data = json_decode($rawData);
        
        $first = $data->results[0];
        $movie = ApiController::getMovie($first);
        
        $value = $movie->revenue;
        $pizzaRollPrice = floor($value / $pricePerPizzaRoll);
        
        $output = array(
            "raw" => $pizzaRollPrice,
            "revenue" => $value,
            "name" => $movie->original_title
        );
        
        return PizzaRoller::RollJSON(1, "Found movie successfully.", PizzaRoller::ArrayToObject($output));
    }
    
    protected static function getMovie($basicMovieObject)
    {
        $rawData = file_get_contents("http://api.themoviedb.org/3/movie/" . $basicMovieObject->id . "?api_key=9004a44d87b2613704631f1013b47cc9");
        $data = json_decode($rawData);
        
        return $data;
    }

    /**
     * Product comparison based on WalMart open API.
     */
    protected function productComparison()
    {
       $pricePerPizzaRoll = PizzaRoller::GetPizzaRollPrice();
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
