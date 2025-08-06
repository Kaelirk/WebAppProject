<?php
  include_once "header.php";
  
  ?>

<body class="bg-secondary-subtle">
<?php if(isset($_SESSION["userid"])){?>
<section class="invoices d-flex flex-column justify-content-center align-items-center min-vh-100">
    <a href="https://cns.public.lu/de/assure/remboursements.html"><img src="/images/cns-logo.png" alt="Logo" width="468" height="468"></a>
    <p>Click here for information regarding reimbursement</p>
</section>
<?php }else{ ?>
    <h2>Access denied.<h2>
    <p>Please return to the home page and login.</p>
  <?php } ?>
</body>