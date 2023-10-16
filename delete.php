<?php
include "config.php";
$id= $_GET["id"];
mysqli_query($conn, "delete from add_patient where id=$id");

?>

<script type="text/javascript">
    window.location="addpat.php";
</script>