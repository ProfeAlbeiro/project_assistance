function deleteRegister(registerId, nameConst){        
    swal({
        title: "Está seguro de eliminar el registro: " + registerId,
        text: "Si elimina el registro, ya no podrá recuperarlo de la memoria!",
        icon: "warning",
        buttons: [true, "Aceptar"],
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {            
            swal("El registro ha sido eliminado!", {
                icon: "success",                
            }).then((result) => {                
                window.location = '?c=Colleges&a='+nameConst+'Delete&id'+nameConst+'=' + registerId;                
            });
        } else {
            swal("El registro se ha conservado en la Base de Datos");            
        }
    });    
}

function editCollege(){    
    var myModal = new bootstrap.Modal(document.getElementById('editCollege'), {
        keyboard: false,
        backdrop: 'static'
    });
    myModal.show();
}

function editJourne(){    
    var myModal = new bootstrap.Modal(document.getElementById('editJourne'), {
        keyboard: false,
        backdrop: 'static'
    });
    myModal.show();
}

function editGrade(){
    var myModal = new bootstrap.Modal(document.getElementById('editGrade'), {
        keyboard: false,
        backdrop: 'static'
    });
    myModal.show();
}