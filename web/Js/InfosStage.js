$(document).ready(function () {

    var entrCle = $('#infosMissionForm_entreprise');
    var regieCle = $('#infosMissionForm_entrepriseAlt');

    entrCle.change(function(){
        entrCle = $(this).val();

        $.ajax({
            type: "POST",
            url: "{{ url('lea_etu_appel_ajax_entr') }}?entrCle="+entrCle,

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
            url: "{{ url('lea_etu_appel_ajax_regie') }}?entrCle="+regieCle,

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

        var url = "{{ path('lea_etu_inscrireBureau', {'name': name,'entr':'entre'}) }}";
        url = url.replace("entre",nomEntr["0"]);
        window.location=url;

    });

    var inscrireRef = $('#insRef');
    inscrireRef.click(function(){

        var nomEntr = $('#infosMissionForm_entreprise option:selected').text().split('-');

        var url = "{{ path('lea_etu_inscrireRef', {'name': name,'entr':'entre'}) }}";
        url = url.replace("entre",nomEntr["0"]);
        window.location=url;

    });

});