
<script src="{{ asset('admin/vendors/js/vendors.min.js')}}" type="text/javascript "></script>




<script src="{{ asset('admin/vendors/js/pickers/pickadate/picker.js')}}" type="text/javascript"></script>
  <script src="{{ asset('admin/vendors/js/pickers/pickadate/picker.date.js')}}" type="text/javascript"></script>
  <script src="{{ asset('admin/vendors/js/pickers/pickadate/picker.time.js')}}" type="text/javascript"></script>
  <script src="{{ asset('admin/vendors/js/pickers/pickadate/legacy.js')}}" type="text/javascript"></script>
  <script src="{{ asset('admin/vendors/js/pickers/dateTime/moment-with-locales.min.js')}}"
  type="text/javascript"></script>
  <script src="{{ asset('admin/vendors/js/pickers/daterange/daterangepicker.js')}}"
  type="text/javascript"></script>


<script src="{{ asset('admin/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{ asset('admin/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{ asset('admin/js/scripts/customizer.js')}}" type="text/javascript"></script>


  <script src="{{ asset('admin/js/scripts/pickers/dateTime/pick-a-datetime.js')}}"
  type="text/javascript"></script>



<script src="{{ asset('admin/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/vendors/js/tables/datatable/dataTables.buttons.min.js') }}"
  type="text/javascript"></script>
  <script src="{{ asset('admin/vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"
  type="text/javascript"></script>


  <script src="{{ asset('admin/vendors/js/tables/jszip.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/vendors/js/tables/pdfmake.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/vendors/js/tables/vfs_fonts.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/vendors/js/tables/buttons.html5.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/vendors/js/tables/buttons.print.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/vendors/js/tables/buttons.colVis.min.js') }}" type="text/javascript"></script>


<script src="{{ asset('admin/toastr/toastr.min.js') }}"></script>



  




  <script src="{{ asset('admin/js/scripts/tables/datatables-extensions/datatable-button/datatable-html5.js') }}"
  type="text/javascript"></script>



  <!-- END PAGE LEVEL JS-->

  
  <script>
  @if(Session::has('message'))
 
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
             case 'danger':
            toastr.danger("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>
    
    @section('script')
            

                  @show


