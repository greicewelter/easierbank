<?php


 $menssage =unserialize($_SESSION['alert']);
 if(isset($_SESSION['alert'])){
     unset($_SESSION['alert']);
 }
 

 //alert-success 
// alert-warning 
// alert-info 

if (!empty($menssage)) {
?>

    <div class="alert alert-dismissible fade show notification <?php echo $menssage['tipo'] ?>" role="alert">
        <div class="text-center">
            <?php echo $menssage['mensagem'] ?>
        </div>
        <button id="btn-close-info" type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <script type="text/javascript">
        window.addEventListener('load', function() {
            setTimeout(() => {
                $('#btn-close-info').click();
            }, 1500);
        })
    </script>

<?php } ?>