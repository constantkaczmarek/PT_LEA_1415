function changeFilter(ele){

    var eleValue = $("#"+ele+"");

    eleValue.change(function(){

        eleValue = $(this).val();

        alert(ele+":"+eleValue);
        $.ajax({
            type: "POST",
            url: Routing.generate('lea_prof_changeForm',{ele:eleValue}),
            success:function(data){
                alert(data);
                location.reload();
            }
        });
        return false;
    });
}

function redirectAction(etu,value){
    window.location.href = Routing.generate('lea_prof_'+value+'',{name:etu});
}

$(document).ready(function () {


   /* var action = $("#action");

    action.change(function(){

        action = $(this).val();
        $.ajax({
            type: "POST",
            url: Routing.generate('lea_prof_changeAction',{action:action}),
            success:function(data){
                window.location.href = Routing.generate('lea_prof_'+data+'',{name:'bilasco'});
            },
            error: function(XmlHttpRequest,textStatus, errorThrown){

                alert("Failed! ");
            }
            complete: function(xhr)
            {
                if (xhr.status == 302) {
                    location.href = xhr.getResponseHeader("Location");
                }
            }
        });
        return false;
    });*/


});