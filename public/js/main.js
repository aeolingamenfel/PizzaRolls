function GetPrice(goods){
    $.ajax({
        type: "GET",
        url: "./comparison/product",
        data:{
            search: $("#Search").val()
        }
    }).done(function(message){
        if(message.success === "yes"){
            $("#Output").html(message.data.string);
        }else{
            alert("There was an error on the indexing site!\n\nPlease try refreshing.");
        }
    });
}


