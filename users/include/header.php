
<?php 
  if ($_SESSION['id'] == '' || empty($_SESSION['id'])) {
    header('Location: ../index');
    exit();
  }
?>

<!-- plugin -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/smoothness/jquery-ui.css">
<!-- custom css -->
<link rel="stylesheet" href="../assets/css/main.css">
<link rel="stylesheet" href="assets/css/main.css">
