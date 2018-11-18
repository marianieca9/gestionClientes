var table = null;
var urlAllClients = null;
var dniClient = null;
var rowSelect = null;

var searchClients = function (){

  $.ajax({
     type: "POST",
     url: urlAllClients,
       beforeSend: function() {
           //openModal();
       },
       complete: function(jqXHR,textStatus){
            //closeModal();
       },
     success:function(response){
         if (response){
             data = jQuery.parseJSON(response);
             
             table = $('#tableClients').DataTable({
                columns : [
                    {   data : 'name',
                        sorting:false,
                        class:'table-name-client',
                        searchable: false
                    },
                    {   data : 'surname',
                        sorting:false,
                        class:'table-surname-client',
                        searchable: false
                    },
                    {   data : 'dni',
                        sorting:false,
                        class:'table-dni-client'
                    },
                    {
                        className      : 'details-control',
                        defaultContent : '',
                        data           : null,
                        sorting      : false,
                        searchable: false
                    }
                ],
                data : data,
                responsive: true,
                 sorting:false,
                 scrollY:'60vh',
                 scrollCollapse: true,
                 paging:false,
                 language: {
                        search: '<span class="glyphicon glyphicon-search"></span>',
                        searchPlaceholder: "DNI"
                  }
              });
         } else {
             console.log("errorListClients--->client.js");
         }

     }
  });//Fin ajax
    
    return null;
}


$(document).ready(function(){
    
    urlAllClients = "/client/getAll/1000/0";
    
    searchClients();
    
    $('#tableClients tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if(row.child.isShown()){
            row.child.hide();
            tr.removeClass('shown');
        } else {
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
  });
    
});


function format(data) {
    return details='<div class="details-container"><div><p><strong>Address: </strong>'+data.address+'</p></div><div><p><strong>Phone: </strong>'+data.phone+'</p></div><div><p><strong>Email: </strong>'+data.email+'</p></div><div><p data-dni="'+data.dni+'"><a class="iconActionClient" onclick="editClient(event)"><span class="glyphicon glyphicon-pencil"></span></a><a class="iconActionClient" onclick="deleteClient(event)"><span class="glyphicon glyphicon-trash"></span></a><a class="iconActionClient" onclick="showProductClient(event)"><span class="glyphicon glyphicon-briefcase"></span></a></p></div></div>';  
}

function deleteClient(e){
    var padre = $(e.target).parents("tr");
    rowSelect = padre.siblings('tr.shown');
    dniClient = $(e.target).parents("p").attr("data-dni");
    $('#deleteModal').show();
    $('#deleteModal').css('display','block');
}

function closeModal(){
    $('#deleteModal').hide();
    $('#deleteModal').css('display','none');
}

function confirmDeleteClient() {
    var url = "/client/delete/"+dniClient;
    
    $.ajax({
            type: "POST",
            url: url,
            beforeSend: function() {
                //openModal();
            },
            complete: function(jqXHR,textStatus){
                //closeModal();
            },
            success:function(response){
                table.row(rowSelect).remove().draw();
                closeModal();
            }
    });
}

function editClient(e){
    dniClient = $(e.target).parents("p").attr("data-dni");
    location.href = "/client/add/"+dniClient;
}

function showProductClient(e){
    dniClient = $(e.target).parents("p").attr("data-dni");
    location.href = "/client/show_products/"+dniClient;
}

