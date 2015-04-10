function GetPrice(goods){
    $.ajax({
        type: "GET",
        url: "http://priceonomics.com/api/v1/search/?query=2003+audi+a4",
        data:{}
    }).done(function(message){
        console.log(message);
    });
}


