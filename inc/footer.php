      <div class="card-footer text-center py-3">
          <p>Copyright @<script>document.write(new Date().getFullYear());</script> All Rights Reserved By<b> Khun Tun</b></p>
      </div>
  
    <!----------------  
      * jQuery *
    ------------------>
    <script src="assets/js/jquery-3.6.4.min.js"></script>

     <!----------------  
      * Bootstrap JS *
    ------------------>
    <script src="assets/js/bootstrap.min.js"></script>

     <!----------------  
      * Data TablesLibs JS *
    ------------------>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap5.min.js"></script>


    <!----------------  
      * Select-2  JS *
    ------------------>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

     <!----------------  
      * Custom JS *
    ------------------>
    <script>
        $(document).ready(function () {
            $("#flash-msg").delay(7000).fadeOut("slow");
        });
        $(document).ready(function() {
            $('#myTable').DataTable();
        } );
        $(document).ready(function () {
          $('#roleTable').DataTable();
        });
        
        $(document).ready(function() {
          $('.multiple-select-field').select2({
              placeholder: "Choose permissions...",
              allowClear: true
          });
        });
    </script>
  </body>
</html>
