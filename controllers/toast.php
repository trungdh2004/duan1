    


<?php 
    function toast($status,$content) {
        echo "
        <script>
            const toastLiveExample = document.getElementById('liveToast')

            if (toastTrigger) {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
            }
            const toastbody = document.querySelector('#toast-content');

            toastbody.innerHTML = '$content';
            toastBootstrap.show()
        </script>

        ";
    }
?>