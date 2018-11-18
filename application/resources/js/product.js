$(document).ready(function(){
    $("#filUpload").on('change',function(evt){
       if( $("#filUpload").val() != ""){
              var form = $("#filUpload").parent('form')[0];
              var data = new FormData(form);
              $.ajax({
                  type: "POST",
                  enctype: 'multipart/form-data',
                  url: "/product/chargeFile",
                  data: data,
                  processData: false,
                  contentType: false,
                  cache: false,
                  timeout: 600000,
                  success: function (data) {
                    var json = jQuery.parseJSON(data);
                    if(json){
                        location.href = "/product/list";
                    }
                  }
              });
       }
     });
    
});
