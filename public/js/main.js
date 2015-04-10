function GetPrice(caller){
    var oldText = $(caller).html();
    $(caller).html('<i class="fa fa-cog fa-spin"></i> Requesting...');
    
    $.ajax({
        type: "GET",
        url: "./comparison/product",
        data:{
            search: $("#Search").val()
        }
    }).done(function(message){
        $(caller).html(oldText);
        
        if(message.success > 0){
            $("#OutputImage").attr('src', message.data.image);
            $("#OutputHeader").text(message.data.productname);
            $("#OutputCost").text("Price: " + message.data.raw + " Pizza Rolls");
            $("#OutputDescription").text(message.data.shortdescription);
        }else{
            alert(message.message);
        }
    });
}


