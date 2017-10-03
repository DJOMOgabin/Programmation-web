/**
 * Created by D'rin on 06/04/2017.
 */
$(document).ready(function () {
    $('select').material_select();
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();

    $('.language').hide();
    $('.currency').hide();
    $('.prenom').hide();
    $('.shortname').hide();
    $('.gps').hide();
    $('.civility').hide();

    // gestion de la localisation
     var map = new google.maps.Map(document.getElementById('map_canvas'), {
     zoom: 1,
     center: new google.maps.LatLng(35.137879, -82.836914),
     mapTypeId: google.maps.MapTypeId.ROADMAP
     });

     var myMarker = new google.maps.Marker({
     position: new google.maps.LatLng(47.651968, 9.478485),
     draggable: true
     });
     var latitude, longitude;

     google.maps.event.addListener(myMarker, 'dragend', function (evt) {
     latitude = evt.latLng.lat().toFixed(3);
     longitude = evt.latLng.lng().toFixed(3);
     console.log('Latitude: ' + latitude + ' Longitude: ' + longitude);

     });


     google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
     document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
     });
     $('#save-location').click(function () {
     console.log('Latitude: ' + latitude + ' Longitude: ' + longitude);
     $('#gps').removeAttr('placeholder');
     $('#gps').val('Latitude: ' + latitude + ', Longitude: ' + longitude);
     });

     map.setCenter(myMarker.position);
     myMarker.setMap(map);
     $("#typeOfUser").change(function () {
     gestioonTypeCompte();
     });


    $('#agree-conditions').click(function () {
        $('#conditions').prop('checked', true);
    });
    $('#disagree-conditions').click(function () {
        $('#conditions').prop('checked', false);
    });


});

function gestioonTypeCompte() {
    var typeUser = $("#typeOfUser").val();
    if (typeUser != null && (typeUser == "Individual" || typeUser == "Educational")) {
        $('.language').hide();
        $('.currency').hide();
        $('.shortname').hide();
        $('.gps').hide();

        $('.prenom').show();
        $('.civility').show();
    }
    if (typeUser != null && typeUser == "Company") {
        $('.language').show();
        $('.currency').show();
        $('.shortname').show();
        $('.gps').show();
        $('.prenom').hide();
        $('.civility').hide();
    }

}