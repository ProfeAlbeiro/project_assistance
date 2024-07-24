function journeDelete(journeId){
    event.preventDefault();
    swal({
        title: "Está seguro de eliminar la Jornada",
        text: "Si elimina la jornada, ya no podrá ser recuperada de la memoria!",
        icon: "warning",
        buttons: [true, "Aceptar"],
        dangerMode: true,
    })
    .then((willDelete) => {        
        if (willDelete) {
            swal("La Jornada ha sido eliminado!", {
                icon: "success",
            });            
            window.location = '?c=Colleges&a=journeDelete&idJourne=' + journeId;
        } else {
            swal("La Jornada se ha convervado en la Base de Datos");            
            window.location = '?c=Colleges&a=journeRead';
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