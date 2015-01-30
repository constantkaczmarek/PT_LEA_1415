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