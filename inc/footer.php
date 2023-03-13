      <div class="card-footer text-center py-3">
          <p>Copyright @<script>document.write(new Date().getFullYear());</script> All Rights Reserved By<b> Khun Tun</b></p>
      </div>
  
    <script src="assets/js/jquery-3.6.4.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#flash-msg").delay(7000).fadeOut("slow");
        });
        $(document).ready(function() {
            $('#myTable').DataTable();
        } );
    </script>
  </body>
</html>
