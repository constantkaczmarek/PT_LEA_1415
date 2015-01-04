function showModal(ele){
    ele.style.visibility = "visible";
}

function hideModal(ele){
    ele.style.visibility = "hidden";
}


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

$(document).ready(function () {


    var formation = $("#formation");

    formation.change(function(){

        formation = $(this).val();
        $.ajax({
            type: "POST",
            url: Routing.generate('lea_prof_changeForm',{formation:formation}),
            success:function(data){
                location.reload();
            }
        });
        return false;
    });

    var situ = $("#situ");

    situ.change(function(){

        situ = $(this).val();
        $.ajax({
            type: "POST",
            url: Routing.generate('lea_prof_changeForm',{"situ":situ}),
            success:function(data){
                location.reload();
            }
        });
        return false;
    });

});