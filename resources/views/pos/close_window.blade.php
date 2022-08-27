<script src="{{asset('admin_assets/vendor/global/global.min.js')}}"></script>
<script>
    ManageQB_PopUp();
    function ManageQB_PopUp() {
            $(document).ready(function () {
                window.close();
            });
            window.onunload = function () {
                var win = window.opener;
                if (!win.closed) {
                    window.opener.location.reload();
                }
            };
        }
</script>