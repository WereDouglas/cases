  <!-- jQuery -->
    <script src="<?= base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url(); ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url(); ?>vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="<?= base_url(); ?>vendors/validator/validator.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= base_url(); ?>build/js/custom.min.js"></script>

    <!-- validator -->
    <script>
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });
    </script>
    <!-- /validator -->
  
   
    <!-- FastClick -->
    <script src="<?= base_url(); ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url(); ?>vendors/nprogress/nprogress.js"></script>
    <!-- Datatables -->
    <script src="<?= base_url(); ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url(); ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?= base_url(); ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url(); ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?= base_url(); ?>vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="<?= base_url(); ?>vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?= base_url(); ?>vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?= base_url(); ?>build/js/custom.min.js"></script>

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>