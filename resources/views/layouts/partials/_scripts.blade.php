        <script src="{{ URL::asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
        {{-- <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> --}}
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('plugins/fastclick/fastclick.js') }}"></script>
        <script src="{{ URL::asset('js/admin_app.min.js') }}"></script>
        <script src="{{ URL::asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ URL::asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
        <script src="{{ URL::asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ URL::asset('plugins/chartjs/Chart.min.js') }}"></script>
        <script src="{{ URL::asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
        <script src="{{ URL::asset('plugins/daterangepicker/moment.js')}}"></script>
        <script src="{{ URL::asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
        <script src="{{ URL::asset('js/app.js') }}"></script>

        @yield('script')


<script>
    $(document).ready(function () {
        $('#datepicker').datepicker({
                format: 'dd-mm-yyyy'
                });
        
    });

</script>