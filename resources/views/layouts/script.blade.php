 <!-- jQuery -->
 <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
 <!-- Bootstrap 4 -->
 <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 {{-- select2 --}}
 <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
 {{-- mdbootstrap --}}
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
 {{-- chart.js --}}
 <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
 <script src="dist/js/pages/dashboard3.js"></script>


 <!-- Ekko Lightbox -->
 <script src="{{ asset('plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
 {{-- aos --}}
 <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

 <!-- overlayScrollbars -->
 <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

 <!-- AdminLTE App -->
 <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

 <script>
     AOS.init();
 </script>

 <script>
     $(document).ready(function() {
         $('.select2').select2();
     });
 </script>


 <script>
     $(function() {
         $(document).on('click', '[data-toggle="lightbox"]', function(event) {
             event.preventDefault();
             $(this).ekkoLightbox({
                 alwaysShowClose: true
             });
         });

         $('.btn[data-filter]').on('click', function() {
             $('.btn[data-filter]').removeClass('active');
             $(this).addClass('active');
         });
     })
 </script>

 <livewire:scripts>
