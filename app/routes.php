<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    return View::make('index');
});

Route::get('/comparison/product', function(){
    /*
     * === ULTRA IMPORTANT VARIABLE, KEEP SAFE ===
     */
    $pricePerPizzaRoll = 0.087;
    /*
     * === ULTRA IMPORTANT VARIABLE ABOVE ===
     */
    
    $searchData = Input::get('search');
    
    $urlSafeSearchData = urlencode($searchData);
    
    $rawData = file_get_contents('http://api.walmartlabs.com/v1/search?query=' . $urlSafeSearchData . '&format=json&apiKey=uyaq7zdc4rwmx48qp6kqpgv3');
    
    $data = json_decode($rawData);
    
    if($data->totalResults > 0){
        $items = $data->items;
        $firstItem = $items[0];
        
        //return var_dump($firstItem);
        
        
        $cost = $firstItem->salePrice;
        
        $pizzaRollCost = floor($cost / $pricePerPizzaRoll);
        
        $output = array(
            "raw" => $pizzaRollCost,
            "string" => "A " . $firstItem->name . " is worth " . $pizzaRollCost . " pizza rolls."
        );
        
        return PizzaRoller::RollJSON(1, "Found item! Amount of pizza rolls incoming.", PizzaRoller::ArrayToObject($output));
    }else{
        return PizzaRoller::RollJSON(-1, "Could not find item.", null);
    }
});
