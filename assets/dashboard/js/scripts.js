function editRegister(editRegister){
    var myModal = new bootstrap.Modal(document.getElementById(editRegister), {
        keyboard: false,
        backdrop: 'static'
    });
    myModal.show();
}

function deleteRegister(controller, action, registerId){        
    swal({
        title: "Está seguro de eliminar el registro",
        text: "Si elimina el registro, ya no podrá recuperarlo de la memoria!",
        icon: "warning",
        buttons: [true, "Aceptar"],
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {            
            swal("El registro será eliminado!", {
                icon: "success",                
            }).then((result) => {                
                window.location = '?c='+controller+'&a='+action+'Delete&id'+action+'=' + registerId;                
            });
        } else {
            swal("El registro se ha conservado en la Base de Datos");            
        }
    });    
}