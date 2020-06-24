
  <!-- Bootstrap core JavaScript -->
  <script src="assest/vendor/jquery/jquery.min.js"></script>
  <script src="assest/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
</script>
<script>
  
    var input = document.querySelector("#mobile-number");
    window.intlTelInput(input, {
	hiddenInput: "full_number",
    utilsScript: "assest/build/js/utils.js",
    });
	
 </script>
 <script>
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
  </script>
  

  