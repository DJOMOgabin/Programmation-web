$(document).ready(function () {/*
    $(".button-collapse").sideNav();*/
    /*console.log("bonjour");
    $.ajaxSetup({
        headers: {"X-CSRF-TOKEN":$("meta[name='csrf-token']").attr("content")}
    })
    console.log($("meta[name='csrf-token']").attr("content"));
*/

    function Changer(){

        var url = readURL(this);
        console.log("toto");
        $("#example-save").empty();
        msg = "<img style='max-width: 80%' src="+url+" alt='image du logo'>";
        $("#example-save").appendChild(msg);

    }

    function rechercheService(texte){
        var value = document.getElementById('searchService').value;
        var column = document.getElementById('option').value;
        $.ajax({
            url: "/admin/rechercheService",
            type: "POST",
            header:{"myval":"val"},
            data: {column: column,value:value
                //    ,"_token":$("input[_token]").val()
            }, // je passe la variable JS
            dataType:'html',
            success: function(msg){ // je récupère la réponse dans la variable msg en format HTML
                console.log(msg);
                $('#recherche').empty();
                $('#recherche').append(msg);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function ajout(name){
        prompt(name,name);
        var tr = document.createElement('div');
        tr.innerHTML = "<div class='input-field col m11'>"+
            "<input id='orther' type='text' name='other'  required autofocus>"+
            "<label for='orther'>Other Category</label>"+
            "</div>";
        document.getElementById('orther').appendChild(tr);
    }
    function exercice() {
        prompt("toto","tata");
        //var i=1;
        var tr = document.createElement('div');
        tr.innerHTML = "<div id='div"+i+"'><label for='exercice'><u><b>Exercice "+i+":</b></u> </label>" +
            "<input class='exercice form-control' type='text' name='exercice"+i+"' value='' placeholder=\"Titre de l' exercice\" size='100' maxlength='100'/>" +
            "<br><br><br><p><textarea rows='7' cols='150' class='enonce  form-control' name='enonce"+i+"'  placeholder=\"Veuillez entrer l'enoncé de votre exercice\"></textarea><p></div>";

        tr.innerHTML = "<div class='input-field col m11'>"+
        "<input id='orther' type='text' name='other'  required autofocus>"+
        "<label for='orther'>Other Category</label>"+
        "</div></div>";
        tr.innerHTML = "<p> je suis un mauvais enfant";
        prompt("tata","tata");
        $('#epreuve').append(tr);
    }
    $("#other").click(function (event) {
        prompt("toto","toto");
    });
});