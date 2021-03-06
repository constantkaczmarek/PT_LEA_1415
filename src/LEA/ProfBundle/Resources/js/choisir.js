function showModal(ele){
    ele.style.display = "block";
}

function hideModal(ele){
    ele.style.display = "none";
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