
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script>
    var $jq = jQuery.noConflict();
    // var questionType = selectedOption.data('question-type');

    $jq(document).ready(function() {
    // Initialize Select2 after DOM is ready
    $jq("#nameid").select2({
        placeholder: "Select a Questions",
        allowClear: true
    });

    // Ensure correct order of initialization
    $jq("#nameid").change(function() {
        var selectedOption = $jq(this).find(':selected');
        var id = selectedOption.val();
        var title = selectedOption.text();
        var questionType = selectedOption.data('question-type');

        // Append selected option to the table
        $jq('#articleTable tbody').append('<tr style="text-align: center;">' +
            '<td >' + id + '</td>' +
            '<td>' + title + '</td>' +
            '<td>' + questionType + '</td>' +
            '<td><button class="btn btn-danger remove-row"><i class="fa-solid fa-trash"></i></button></td>' +
            '</tr>');

        // Add hidden input to capture selected question IDs
        $jq('form').append('<input type="hidden" name="questions[]" value="' + id + '">');
    });

    // Remove row when remove button is clicked
    $jq(document).on('click', '.remove-row', function() {
        $(this).closest('tr').remove();
        var idToRemove = $(this).closest('tr').find('td:first').text();
        $('input[name="questions[]"][value="' + idToRemove + '"]').remove();
    });
});


</script>
<script>
  function confirmation(ev, id) {
    ev.preventDefault();
    var urlToRedirect = document.getElementById('delete-form-' + id).getAttribute('action');
    console.log(urlToRedirect);
    swal({
        title: "Etes-vous sûr de supprimer ceci",
        text: "Vous ne pourrez pas annuler cette suppression",
        icon: "warning",
        buttons: true,
        dangerMode: true
      })
      .then((willCancel) => {
        if (willCancel) {
          document.getElementById('delete-form-' + id).submit();
        }
      });
  }
</script>