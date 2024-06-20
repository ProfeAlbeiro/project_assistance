/* -------------------------------------------------------------------------------- */
/* DATATABLES: FILTROS EN TABLA --------------------------------------------------- */
/* -------------------------------------------------------------------------------- */

$(document).ready(function () {
    var table = $('#ej-data-tables').DataTable({
        dom: 'Bfrtip',
        "order": [
            [ 0, "desc" ],
            [ 4, "asc" ],
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
        // rowReorder: {
        //     selector: 'td:nth-child(2)'
        // },
        responsive: true,
        language: {
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
        // rowReorder: {
        //     selector: 'td:nth-child(2)'
        // },
        responsive: true,
        language: {
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

// let temp = $("#btn1").clone();
// $("#btn1").click(function(){
//     $("#btn1").after(temp);
// });

// $(document).ready(function(){
//     var table = $('#example').DataTable({
//         "order": [
//         [ 4, "desc" ],
//         [ 5, "desc" ],
//         ],
//         orderCellsTop: true,
//         fixedHeader: true 
//     });

//     //Creamos una fila en el head de la tabla y lo clonamos para cada columna
//     $('#example thead tr').clone(true).appendTo( '#example thead' );

//     $('#example thead tr:eq(1) th').each( function (i) {
//         var title = $(this).text(); //es el nombre de la columna
//         $(this).html( '<input type="text" placeholder="Search...'+title+'" />' );

//         $( 'input', this ).on( 'keyup change', function () {
//             if ( table.column(i).search() !== this.value ) {
//                 table
//                     .column(i)
//                     .search( this.value )
//                     .draw();
//             }
//         } );
//     } );   
// });