@if (session()->has('info'))                      
        <script type="text/javascript">
            $(function () {
               toastr.info("{{session()->get("info")}}");
            });
        </script>
    @endif

    @if (session()->has('success'))                  
        <script type="text/javascript">
            $(function () {
                toastr.success("","{{session()->get("success")}}");
            });
        </script>
    @endif

    @if (session()->has('warning'))                  
        <script type="text/javascript">
            $(function () {
               toastr.warning("","{{session()->get("warning")}}");
            });
        </script>
    @endif  

    @if (session()->has('error'))                  
        <script type="text/javascript">
            $(function () {
               toastr.error("","{{session()->get("error")}}");
            });
        </script>
    @endif