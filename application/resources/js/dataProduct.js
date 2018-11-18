var table = null;
var urlAllProducts = null;

var searchProducts = function (){

  $.ajax({
     type: "POST",
     url: urlAllProducts,
       beforeSend: function() {
           //openModal();
       },
       complete: function(jqXHR,textStatus){
            //closeModal();
       },
     success:function(response){
         if (response){
             data = jQuery.parseJSON(response);
             
             table = $('#tableProducts').DataTable({
                columns : [
                    {data : 'code',
                    sorting:false,
                    class:'table-code-product'},
                    {data : 'name',
                    sorting:false,
                    class:'table-name-product'},
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
                        searchPlaceholder: "Code or Name"
                    }
              });
         } else {
             console.log("errorListProducts--->dataProducts.js");
         }

     }
  });//Fin ajax
    
    return null;
}


$(document).ready(function(){
    
    urlAllProducts = "/product/getAll/1000/0";
    
    searchProducts();
    
    $('#tableProducts tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if(row.child.isShown()){
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
  });
    
});


function format ( data ) {
    return '<div class="details-container">'+data.dscrp+'</div>';
}

