{{-- Scripts globales de la plantilla inicial --}}
@livewireScripts
<script src="{{asset("assets/js/libs/jquery-3.1.1.min.js")}}"></script>
<script src="{{asset("bootstrap/js/popper.min.js")}}"></script>
<script src="{{asset("bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{asset("plugins/perfect-scrollbar/perfect-scrollbar.min.js")}}"></script>
<script src="{{asset("assets/js/app.js")}}"></script>
<script>
   $(document).ready(function () {
      App.init();
   });
</script>
<script src="{{asset("assets/js/custom.js")}}"></script>
<script src="{{asset("plugins/snackbar/snackbar.min.js")}}"></script>
<script>
    function noty(msg, option = 1){
        Snackbar.show({
            text:msg.toUpperCase(),
            actionText: 'CERRAR',
            duration: 3000,
            actionTextColor: '#fff',
            backgroundColor: option == 1 ? '#1ABC9C' : '#e7515a',
            pos: 'top-right',
        });
    }
</script>
<script src="{{asset("plugins/sweetalerts/sweetalert2.min.js")}}"></script>