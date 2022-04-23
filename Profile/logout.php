<?php
session_start();
session_destroy();
echo "<script>
  window.close()
</script>";
?>