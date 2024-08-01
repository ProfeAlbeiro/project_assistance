/* -------------------------------------------------------------------------------- */
/* DATATABLES: FILTROS EN TABLA --------------------------------------------------- */
/* -------------------------------------------------------------------------------- */

$(document).ready(function () {
    var table = $('#ej-rol').DataTable({
        dom: 'Bfrtip',
        "order": [
            [ 0, "asc" ],            
        ],
        buttons: [
            'copy',
            'csv',
            'excel',
            'pdf',
            {
                extend: 'print',
                text: 'Imprimir Todo',
                exportOptions: {
                    modifier: {
                        selected: null
                    }
                }
            }
        ],
        select: true,
        responsive: true,
        pageLength: 6,
        language: {
            select: {
                rows: {
                    _: '\' %d Filas seleccionadas \'',
                    0: '\' Clic fila para seleccionar \'',
                    1: '\' 1 Fila seleccionada \''
                }
            },
            search: 'Buscar',
            zeroRecords: 'No hay registros para mostrar.',
            emptyTable: 'La tabla está vacia.',
            info: "Mostrando _START_ de _END_ de _TOTAL_ Registros.",
            infoFiltered: "(Filtrados de _MAX_ Registros.)",
            paginate: {                
                first: 'Primero',
                previous: 'Anterior',
                next: 'Siguiente',
                last: 'Último'
            }
        }
    });
});

$(document).ready(function () {
    var table = $('#ej-user').DataTable({
        dom: 'Bfrtip',
        "order": [
            [ 5, "asc" ],
            [ 0, "desc" ],
        ],
        buttons: [
            'copy',
            'csv',
            'excel',
            'pdf',
            {
                extend: 'print',
                text: 'Imprimir Todo',
                exportOptions: {
                    modifier: {
                        selected: null
                    }
                }
            }
        ],
        select: true,
        responsive: true,
        pageLength: 6,
        language: {
            select: {
                rows: {
                    _: '\' %d Filas seleccionadas \'',
                    0: '\' Clic fila para seleccionar \'',
                    1: '\' 1 Fila seleccionada \''
                }
            },
            search: 'Buscar',
            zeroRecords: 'No hay registros para mostrar.',
            emptyTable: 'La tabla está vacia.',
            info: "Mostrando _START_ de _END_ de _TOTAL_ Registros.",
            infoFiltered: "(Filtrados de _MAX_ Registros.)",
            paginate: {                
                first: 'Primero',
                previous: 'Anterior',
                next: 'Siguiente',
                last: 'Último'
            }
        }
    });
});

$(document).ready(function () {
    var table = $('#ej-student').DataTable({
        dom: 'Bfrtip',
        "order": [
            [ 5, "asc" ],
            [ 0, "desc" ],
        ],
        buttons: [
            'copy',
            'csv',
            'excel',
            'pdf',
            {
                extend: 'print',
                text: 'Imprimir Todo',
                exportOptions: {
                    modifier: {
                        selected: null
                    }
                }
            }
        ],
        select: true,
        responsive: true,
        pageLength: 6,
        language: {
            select: {
                rows: {
                    _: '\' %d Filas seleccionadas \'',
                    0: '\' Clic fila para seleccionar \'',
                    1: '\' 1 Fila seleccionada \''
                }
            },            
            search: 'Buscar',
            zeroRecords: 'No hay registros para mostrar.',
            emptyTable: 'La tabla está vacia.',
            info: "Mostrando _START_ de _END_ de _TOTAL_ Registros.",
            infoFiltered: "(Filtrados de _MAX_ Registros.)",
            paginate: {                
                first: 'Primero',
                previous: 'Anterior',
                next: 'Siguiente',
                last: 'Último'
            }
        }        
    });
});

$(document).ready(function () {
    var table = $('#ej-assistances').DataTable({
        "order": [
            [ 0, "desc" ],
            [ 3, "desc" ],
        ],
        dom: 'Bfrtip',
        buttons: [
            'copy',
            'csv',
            'excel',
            'pdf',
            {
                extend: 'print',
                text: 'Imprimir Todo',
                exportOptions: {
                    modifier: {
                        selected: null
                    }
                }
            }
        ],
        select: true,
        responsive: true,
        pageLength: 6,
        language: {
            select: {
                rows: {
                    _: '\' %d Filas seleccionadas \'',
                    0: '\' Clic fila para seleccionar \'',
                    1: '\' 1 Fila seleccionada \''
                }
            },
            search: 'Buscar',
            zeroRecords: 'No hay registros para mostrar.',
            emptyTable: 'La tabla está vacia.',
            info: "Mostrando _START_ de _END_ de _TOTAL_ Registros.",
            infoFiltered: "(Filtrados de _MAX_ Registros.)",
            paginate: {
                first: 'Primero',
                previous: 'Anterior',
                next: 'Siguiente',
                last: 'Último'
            }
        }
    });
});

$(document).ready(function () {
    var table = $('#ej-journe').DataTable({
        "order": [
            [ 1, "asc" ],            
        ],
        dom: 'Bfrtip',
        buttons: [
            'copy',
            'csv',
            'excel',
            'pdf',
            {
                extend: 'print',
                text: 'Imprimir Todo',
                exportOptions: {
                    modifier: {
                        selected: null
                    }
                }
            }
        ],
        select: true,
        responsive: true,
        pageLength: 6,
        language: {
            select: {
                rows: {
                    _: '\' %d Filas seleccionadas \'',
                    0: '\' Clic fila para seleccionar \'',
                    1: '\' 1 Fila seleccionada \''
                }
            },
            search: 'Buscar',
            zeroRecords: 'No hay registros para mostrar.',
            emptyTable: 'La tabla está vacia.',
            info: "Mostrando _START_ de _END_ de _TOTAL_ Registros.",
            infoFiltered: "(Filtrados de _MAX_ Registros.)",
            paginate: {
                first: 'Primero',
                previous: 'Anterior',
                next: 'Siguiente',
                last: 'Último'
            }
        }
    });
});

$(document).ready(function () {
    var table = $('#ej-grade').DataTable({
        "order": [
            [ 0, "asc" ],            
        ],
        dom: 'Bfrtip',
        buttons: [
            'copy',
            'csv',
            'excel',
            'pdf',
            {
                extend: 'print',
                text: 'Imprimir Todo',
                exportOptions: {
                    modifier: {
                        selected: null
                    }
                }
            }
        ],
        select: true,
        responsive: true,
        pageLength: 6,
        language: {
            select: {
                rows: {
                    _: '\' %d Filas seleccionadas \'',
                    0: '\' Clic fila para seleccionar \'',
                    1: '\' 1 Fila seleccionada \''
                }
            },
            search: 'Buscar',
            zeroRecords: 'No hay registros para mostrar.',
            emptyTable: 'La tabla está vacia.',
            info: "Mostrando _START_ de _END_ de _TOTAL_ Registros.",
            infoFiltered: "(Filtrados de _MAX_ Registros.)",
            paginate: {
                first: 'Primero',
                previous: 'Anterior',
                next: 'Siguiente',
                last: 'Último'
            }
        }
    });
});

$(document).ready(function () {
    var table = $('#ej-course').DataTable({
        "order": [
            [ 1, "asc" ],            
        ],
        dom: 'Bfrtip',
        buttons: [
            'copy',
            'csv',
            'excel',
            'pdf',
            {
                extend: 'print',
                text: 'Imprimir Todo',
                exportOptions: {
                    modifier: {
                        selected: null
                    }
                }
            }
        ],
        select: true,
        responsive: true,
        pageLength: 6,
        language: {
            select: {
                rows: {
                    _: '\' %d Filas seleccionadas \'',
                    0: '\' Clic fila para seleccionar \'',
                    1: '\' 1 Fila seleccionada \''
                }
            },
            search: 'Buscar',
            zeroRecords: 'No hay registros para mostrar.',
            emptyTable: 'La tabla está vacia.',
            info: "Mostrando _START_ de _END_ de _TOTAL_ Registros.",
            infoFiltered: "(Filtrados de _MAX_ Registros.)",
            paginate: {
                first: 'Primero',
                previous: 'Anterior',
                next: 'Siguiente',
                last: 'Último'
            }
        }
    });
});