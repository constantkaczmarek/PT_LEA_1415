function showFom_AddOptions(form,transport, select,selectRetour,selectEscaleAller,selectEscaleDepart){
    select.append(new Option(transport,transport));
    selectRetour.append(new Option(transport,transport));
    selectEscaleAller.append(new Option(transport,transport));
    selectEscaleDepart.append(new Option(transport,transport));

    form.style.display = "block";
}

function hideForm_delOptions(form,select,selectRetour,selectEscaleAller,selectEscaleDepart){
    select.remove();
    selectRetour.remove();
    selectEscaleAller.remove();
    selectEscaleDepart.remove();
    form.style.display = "none";
}

function changeTransport(transport){

    $("#ODMType_transport"+transport+"").change(function() {
        if(this.checked)
            showFom_AddOptions(document.getElementById("form"+transport),transport,$("#ODMType_transportAller"),$("#ODMType_transportRetour"),$("#ODMType_transportAllerEscale"),$("#ODMType_transportRetourEscale"));
        else
            hideForm_delOptions(document.getElementById("form"+transport),$("#ODMType_transportAller option[value='"+transport+"']"),$("#ODMType_transportRetour option[value='"+transport+"']"),$("#ODMType_transportAllerEscale option[value='"+transport+"']"),$("#ODMType_transportRetourEscale option[value='"+transport+"']"));
    })
}

$(document).ready(function () {

    changeTransport("Train");
    changeTransport("Voiture");
    changeTransport("Location");
    changeTransport("Avion");
    changeTransport("Taxi");
    changeTransport("Metro");
    changeTransport("Velo");

    $("#ODMType_departDifferent").change(function () {
        if(this.checked)
            document.getElementById("formDepartDifferent").style.display = "block";
        else
            document.getElementById("formDepartDifferent").style.display = "none";
    });

    $("#ODMType_escaleAller").change(function(){
        if(this.checked)
            document.getElementById("formEscaleAller").style.display = "block";
        else
            document.getElementById("formEscaleAller").style.display = "none";
    });

    $("#ODMType_escaleRetour").change(function(){
        if(this.checked)
            document.getElementById("formEscaleRetour").style.display = "block";
        else
            document.getElementById("formEscaleRetour").style.display = "none";
    });

    $("#ODMType_dateRetourDifferente").change(function () {
        if(this.checked)
            document.getElementById("formDateRetourDifferente").style.display = "block";
        else
            document.getElementById("formDateRetourDifferente").style.display = "none";
    });

});