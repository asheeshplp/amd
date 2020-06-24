<?php include 'header.php' ?>
<body>
  <div class="d-flex" id="wrapper">
    <?php include 'sidebar.php' ?>
    <body>
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle"><</button>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
    <?php include 'content.php'; ?>
  </div>
<?php include 'footer.php'; ?>
</body>
</html>
