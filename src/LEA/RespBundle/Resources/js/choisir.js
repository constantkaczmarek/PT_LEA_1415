function showModal(ele){
    ele.style.display = "block";
}

function hideModal(ele){
    ele.style.display = "none";
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
            url: Routing.generate('lea_resp_changeForm',{formation:formation}),
            success:function(data){
                location.reload();
            }
        });
        return false;
    });

});