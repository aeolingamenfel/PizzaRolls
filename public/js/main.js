function GetPrice(){
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
            alert(message.message);
        }
    });
}


