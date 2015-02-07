$(document).ready(function () {

    var entrCle = $('#infosMissionForm_entreprise');
    var regieCle = $('#infosMissionForm_entrepriseAlt');

    entrCle.change(function(){
        entrCle = $(this).val();

        $.ajax({
            type: "POST",
            url: Routing.generate('lea_etu_appel_ajax_entr',{entrCle:entrCle}),

            success: function(data) {
                console.log(data);
                $('#infosMissionForm_bureau').html('');
                $.each(data["bureau"], function(k, v) {
                    $('#infosMissionForm_bureau').append('<option value="' + k + '">' + v + '</option>');
                });

                $('#infosMissionForm_referent').html('');
                $.each(data["referent"], function(k, v) {
                    $('#infosMissionForm_referent').append('<option value="' + k + '">' + v + '</option>');
                });

                $('#infosMissionForm_referent1').html('');
                $.each(data["referent"], function(k, v) {
                    $('#infosMissionForm_referent1').append('<option value="' + k + '">' + v + '</option>');
                });
            }
        });
        return false;
    });

    regieCle.change(function(){
        regieCle = $(this).val();

        $.ajax({
            type: "POST",
            url: Routing.generate('lea_etu_appel_ajax_regie',{entrCle:regieCle}),
            success: function(data) {
                console.log(data);
                $('#infosMissionForm_bureauAlt').html('');
                $.each(data["bureau"], function(k, v) {
                    $('#infosMissionForm_bureauAlt').append('<option value="' + k + '">' + v + '</option>');
                });

                $('#infosMissionForm_referentAlt').html('');
                $.each(data["referent"], function(k, v) {
                    $('#infosMissionForm_referentAlt').append('<option value="' + k + '">' + v + '</option>');
                });

                $('#infosMissionForm_referent1Alt').html('');
                $.each(data["referent"], function(k, v) {
                    $('#infosMissionForm_referent1Alt').append('<option value="' + k + '">' + v + '</option>');
                });
            }
        });
        return false;
    });

    var inscrireBureau = $('#insBur');
    inscrireBureau.click(function(){

        var nomEntr = $('#infosMissionForm_entreprise option:selected').text().split('-');

        nomEntr = nomEntr[0].substring(0,nomEntr[0].length-1);
        var url = Routing.generate('lea_etu_inscrireBureau',{entr:nomEntr});
        window.location=url;

    });

    var inscrireBureauAlt = $('#insBurAlt');
    inscrireBureauAlt.click(function(){

        var nomEntr = $('#infosMissionForm_entrepriseAlt option:selected').text().split('-');

        nomEntr = nomEntr[0].substring(0,nomEntr[0].length-1);
        var url = Routing.generate('lea_etu_inscrireBureau',{entr:nomEntr});
        window.location=url;

    });

    var modifBureau = $('#modifBur');
    modifBureau.click(function(){

        var nomBureau = $('#infosMissionForm_bureau option:selected').val();

        var nomEntr = $('#infosMissionForm_entreprise option:selected').text().split('-');
        nomEntr = nomEntr[0].substring(0,nomEntr[0].length-1);

        var url = Routing.generate('lea_etu_modifBureau',{entr:nomEntr,bureau:nomBureau});
        window.location=url;

    });


    var modifBureauAlt = $('#modifBurAlt');
    modifBureauAlt.click(function(){

        var nomBureau = $('#infosMissionForm_bureauAlt option:selected').val();

        var nomEntr = $('#infosMissionForm_entrepriseAlt option:selected').text().split('-');
        nomEntr = nomEntr[0].substring(0,nomEntr[0].length-1);

        var url = Routing.generate('lea_etu_modifBureau',{entr:nomEntr,bureau:nomBureau});
        window.location=url;

    });


    var inscrireRef = $('#insRef');
    inscrireRef.click(function(){

        var nomEntr = $('#infosMissionForm_entreprise option:selected').text().split('-');

        nomEntr = nomEntr[0].substring(0,nomEntr[0].length-1);
        var url = Routing.generate('lea_etu_inscrireRef',{entr:nomEntr});
        window.location=url;

    });

    var inscrireRefAlt = $('#insRefAlt');
    inscrireRefAlt.click(function(){

        var nomEntr = $('#infosMissionForm_entrepriseAlt option:selected').text().split('-');

        nomEntr = nomEntr[0].substring(0,nomEntr[0].length-1);
        var url = Routing.generate('lea_etu_inscrireRef',{entr:nomEntr});
        window.location=url;

    });

    var modifRef = $('#modifRef');
    modifRef.click(function(){

        var nomEntr = $('#infosMissionForm_entreprise option:selected').text().split('-');
        nomEntr = nomEntr[0].substring(0,nomEntr[0].length-1);

        var nomRef = $('#infosMissionForm_referent option:selected').val();

        var url = Routing.generate('lea_etu_modifRef',{entr:nomEntr,referent:nomRef});
        window.location=url;

    });

    var modifRef_bis = $('#modifRef1');
    modifRef_bis.click(function(){

        var nomEntr = $('#infosMissionForm_entreprise option:selected').text().split('-');
        nomEntr = nomEntr[0].substring(0,nomEntr[0].length-1);

        var nomRef = $('#infosMissionForm_referent1 option:selected').val();

        var url = Routing.generate('lea_etu_modifRef',{entr:nomEntr,referent:nomRef});
        window.location=url;

    });

    var modifRefAlt = $('#modifRefAlt');
    modifRefAlt.click(function(){

        var nomEntr = $('#infosMissionForm_entrepriseAlt option:selected').text().split('-');
        nomEntr = nomEntr[0].substring(0,nomEntr[0].length-1);

        var nomRef = $('#infosMissionForm_referentAlt option:selected').val();

        var url = Routing.generate('lea_etu_modifRef',{entr:nomEntr,referent:nomRef});
        window.location=url;

    });

    var modifRefAlt_bis = $('#modifRef1Alt');
    modifRefAlt_bis.click(function(){

        var nomEntr = $('#infosMissionForm_entrepriseAlt option:selected').text().split('-');
        nomEntr = nomEntr[0].substring(0,nomEntr[0].length-1);

        var nomRef = $('#infosMissionForm_referent1Alt option:selected').val();

        var url = Routing.generate('lea_etu_modifRef',{entr:nomEntr,referent:nomRef});
        window.location=url;

    });

});