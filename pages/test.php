<?php 
require '../config/init.php';
require '../inc/header.php';
?>

<button class="btn btn-primary p-2" onclick="callPhpFunction()">Click Me</button>
<?php require '../inc/footer.php';?>

<script>
    function callPhpFunction(){
        const formData=new URLSearchParams('action=fill')
        fetch('../api/users.php',{
            method:'POST',
            body:formData
        })
        .then(res=>res.text())
        .then(data=>{
            console.log(data);
        })
    }
</script>