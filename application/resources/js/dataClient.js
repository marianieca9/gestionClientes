function saveDataClient() {
    var dniOld=$('#dniClient').val();
    var name=$('#inputName').val();
    var surname=$('#inputSurname').val();
    var dni=$('#inputDni').val();
    var address=$('#inputAddress').val();
    var phone=$('#inputPhone').val();
    var email=$('#inputEmail').val();
    
    if(name=='' || !validateName(name)){
        $('#errorDataClient').text("Write a correct name.");
    } else if(surname==''|| !validateName(surname)){
        $('#errorDataClient').text("Write a correct surname.");
    } else if(dni=='' || !validateDNI(dni)){
        $('#errorDataClient').text("Write a correct dni.");
    } else if(address==''){
        $('#errorDataClient').text("Write an address.");
    } else if(phone=='' || !validatePhone(phone)){
        $('#errorDataClient').text("Write a correct phone.");
    } else if(email=='' || !validateEmail(email)){
        $('#errorDataClient').text("Write a correct email.");
    } else {
        var urlSave='/client/save_client';
        var info = $('#formDataClient').serialize();
        
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
                    if (response.localeCompare('exist')==0){
                        $('#errorDataClient').text("DNI already exists. Try with another.");
                    }else if(response.localeCompare('error')==0){
                        $('#errorDataClient').text("An error has occurred. Try again.");
                    }else {
                       location.href = '/client/list'; 
                    }
                }else {
                    console.log("errorSaveDataClient--->dataClient.js");
                }
            }
        });
    }

}

function validateName(name){
    var format=/^[A-Za-z\s \u00E0-\u00FC]+$/;
    return format.test(name);
}

function validateDNI(dni) {
    if (/^\d{8}[a-zA-Z]$/.test(dni)) {
        var n = dni.substr(0,8);
        var c = dni.substr(8,1);
        return (c.toUpperCase() == 'TRWAGMYFPDXBNJZSQVHLCKET'.charAt(n%23));	
    }
    return false;
}

function validateEmail(email) {
    var format = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return format.test(email);
}

function validatePhone(phone){
    var format = /^\d{9}$/;
    return format.test(phone);
}