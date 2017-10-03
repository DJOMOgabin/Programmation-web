/**
 * Created by D'rin on 25/04/2017.
 */
function add(id){
    price = $('#price'+id).val();
    token = $('#token').val();
    alert('#price'+id+'   ');

    data = {'price': price,'id':id,'_token': token};
    alert('#price'+id+'   ');

    if(price==null){
    }else{
        requete(data,'add')
    }
}

function remove(id) {
    token = $('#token').val();
    data = {'id':id,'_token': token};
    requete(data,'remove')
}

function requete(parametre,type) {
    if(type == 'add'){
        /*alert("/defaultSercvices/add/"+parametre['id']+'/'+parametre['price'])
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/defaultSercvices/add/"+parametre['id']+"/"+parametre['price'],
            success: function(data){
                alert(data);
            },
            error: function(data){
                alert('error');
            }
        });*/
        alert("/defaultServices/add/")
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/defaultServices/add/",
            data: {'price': parametre['price'],'id':parametre['id'],'_token': parametre['_token']},
            success: function(data){
                alert(data);
            },
            error: function(data){
                alert('error');
                alert(data)

            }
        });
    }else{
        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "/defaultServices/remove/",
            data: {'id':parametre['id'],'_token': parametre['_token']},
            success: function(data){
                alert(data);
            },
            error: function(data){
                alert('error');
                alert(data)
            }
        });
    }


}