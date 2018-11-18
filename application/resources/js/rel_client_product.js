var dni='';
var tableProductClient=null;
var tableProductNoClient=null;
var productsClient = new Array();
var arrayProducts=new Array();
var arrayProductsClient=new Array();

$(document).ready(function(){
    dni=$('#dniClient').val();
    
    if(dni!=null && dni!=''){
        getClientByDni();
    }
    
    $('#tableRelProductNoClient tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            tableProductNoClient.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
    
    $('#tableRelProductClient tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            tableProductClient.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
    
});


function getClientByDni(){
    $.ajax({
     type: "POST",
     url: "/client/get_client_withProducts/"+dni,
     beforeSend: function() {
         //openModal();
     },
     complete: function(jqXHR,textStatus){
          //closeModal();
     },
     success:function(response){
         if (response){
            var data = jQuery.parseJSON(response);
            $('.panel-heading').text(data.client[0].name+" "+data.client[0].surname);
            
             arrayProducts = data.arrayP;
             productsClient = data.client[0].arrayProducts;
             

             if (arrayProducts!= null && arrayProducts.length>0 && productsClient!=null && productsClient.length>0){
                 for(var i=0;i<productsClient.length;i++){
                     for(var j=0;j<arrayProducts.length;j++){
                         if(productsClient[i] == arrayProducts[j].code){
                             arrayProductsClient.push(arrayProducts[j]);
                             arrayProducts.splice(j,1);
                             break;
                         }
                     }
                 }
             }
             
             
            chargeTableProductClient();
            chargeTableProductNoClient();

             
         } else {
             console.log("errorGetClientByDni--->rel_client_product.js");
         }
       }
     });  
}

function upNewProduct() {
    $('#bodyTableRelProductNoClient tr.selected').each(function(){
        var childCode=$(this).children('td.table-code-product');
        var valProduct=childCode.text();
        var i;
        for(i=0;i<arrayProducts.length;i++){
            if(arrayProducts[i].code.localeCompare(valProduct)==0){
                break;
            }
        }
        var elementDelete = arrayProducts.splice(i, 1);
        arrayProductsClient.push(elementDelete[0]);
    
        tableProductNoClient.destroy();
        tableProductClient.destroy();
        chargeTableProductClient();
        chargeTableProductNoClient();
    });
        
}

function downProduct() {
    $('#bodyTableRelProductClient tr.selected').each(function(){
        var childCode=$(this).children('td.table-code-product');
        var valProduct=childCode.text();
        var i;
        for(i=0;i<arrayProductsClient.length;i++){
            if(arrayProductsClient[i].code.localeCompare(valProduct)==0){
                break;
            }
        }
        var elementDelete = arrayProductsClient.splice(i, 1);
        arrayProducts.push(elementDelete[0]);
    
        tableProductNoClient.destroy();
        tableProductClient.destroy();
        chargeTableProductClient();
        chargeTableProductNoClient();
    });
}

function saveDataCP() {
    
    for(var i=0;i<arrayProductsClient.length;i++){
        $('#selectProducts').append('<option value="'+arrayProductsClient[i].code+'" selected></option>');
    }
    
        var urlSave='/client/saveProductClient';
        var info = $('#formprodclient').serialize();
        
        $.ajax({
            type: "POST",
            url: urlSave,
            data: info,
            beforeSend: function() {
               //openModal();
            },
            complete: function(jqXHR,textStatus){
                //closeModal();
            },
            success:function(response){
                if (response){
                    location.href="/client/list";
                }else {
                    console.log("errorSaveDataClient--->dataClient.js");
                }
            }
        });
}

function chargeTableProductClient() {
    tableProductClient = $('#tableRelProductClient').DataTable({
        columns : [
            {data : 'code',
            sorting:false,
            class:'table-code-product'},
            {data : 'name',
            sorting:false,
            class:'table-name-product'}
        ],
        data : arrayProductsClient,
        responsive: true,
         sorting:false,
         scrollY:'60vh',
         scrollCollapse: true,
         paging:false,
         language: {
                search: '<span class="glyphicon glyphicon-search"></span>',
                searchPlaceholder: "Code or Name"
            }
      });
             
}

function chargeTableProductNoClient(){
    tableProductNoClient = $('#tableRelProductNoClient').DataTable({
        columns : [
            {data : 'code',
            sorting:false,
            class:'table-code-product'},
            {data : 'name',
            sorting:false,
            class:'table-name-product'}
        ],
        data : arrayProducts,
        responsive: true,
         sorting:false,
         scrollY:'60vh',
         scrollCollapse: true,
         paging:false,
         language: {
                search: '<span class="glyphicon glyphicon-search"></span>',
                searchPlaceholder: "Code or Name"
            }
      });
             
}