function showModal(ele){
    ele.style.visibility = "visible";
}

function hideModal(ele){
    ele.style.visibility = "hidden";
}

$(document).ready(function () {


    var formation = $("#formation");

    formation.change(function(){

        formation = $(this).val();
        $.ajax({
            type: "POST",
            url: Routing.generate('lea_prof_changeForm',{name:"bilasco",formation:formation}),

            success:function(data){
                //alert(data.formation);
                location.reload();
                //window.location.replace(Routing.generate('lea_prof_choisir',{name:"bilasco"}));

            }
        });
        return false;
    });

});