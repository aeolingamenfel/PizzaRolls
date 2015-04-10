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
        
        if(message.success === "yes"){
            $("#Output").html(message.data.string);
        }else{
            alert(message.message);
        }
    });
}


