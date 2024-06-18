</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/dashboard/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/dashboard/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/dashboard/vendor/echarts/echarts.min.js"></script>
  <script src="assets/dashboard/vendor/quill/quill.js"></script>
  <script src="assets/dashboard/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/dashboard/vendor/php-email-form/validate.js"></script>
  
  <!-- DataTables -->
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script> 
  <!-- <script src="assets/dashboard/vendor/simple-datatables/simple-datatables.js"></script> -->
  
  <!-- Template Main JS File -->
  <script src="assets/dashboard/js/main.js"></script>

  <script>
    let temp = $("#btn1").clone();
    $("#btn1").click(function(){
        $("#btn1").after(temp);
    });

    $(document).ready(function(){
        var table = $('#example').DataTable({
          "order": [
            [ 3, "desc" ],
            [ 4, "desc" ],
          ],
          orderCellsTop: true,
          fixedHeader: true 
        });

        //Creamos una fila en el head de la tabla y lo clonamos para cada columna
        $('#example thead tr').clone(true).appendTo( '#example thead' );

        $('#example thead tr:eq(1) th').each( function (i) {
            var title = $(this).text(); //es el nombre de la columna
            $(this).html( '<input type="text" placeholder="Search...'+title+'" />' );
    
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );   
    });
  </script>

</body>

</html>