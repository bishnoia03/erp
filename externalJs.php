<!-- include js files -->
    <script src="http://localhost/erp/js/jquery.js"></script>
    <script src="http://localhost/erp/js/popover.js"></script>
    <script src="http://localhost/erp/js/bootstrap.min.js"></script>
    <script src="http://localhost/erp/js/fontAwesome.js"></script>
     <script>
        //  this function open logout confirmation modal
        function openLogoutModal(){
            $('#logoutModal').modal({
                backdrop: 'static',
                keyboard: false
           });
        }

        const openInfoModal=()=>{
            $('#infoModal').modal({
                backdrop: 'static',
                keyboard: false
           });
        }
     </script>