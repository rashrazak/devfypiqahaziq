
    <!-- Bootstrap core JavaScript -->
    <!-- <script src="<?php echo base_url();?>assets/jquery/jquery.min.js"></script> -->
    <!-- <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> -->
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCsT8dtpnQGF9ud-t69HWoued8aEjss338",
    authDomain: "test2-5698d.firebaseapp.com",
    databaseURL: "https://test2-5698d.firebaseio.com",
    projectId: "test2-5698d",
    storageBucket: "test2-5698d.appspot.com",
    messagingSenderId: "948114249723"
  };
  firebase.initializeApp(config);


</script>
 
 <script src="<?php echo base_url();?>assets/js/firebase.js"></script>
 <script src="<?php echo base_url();?>assets/js/deletex.js"></script>
 <script src="<?php echo base_url();?>assets/js/cart.js"></script>
 <script src="<?php echo base_url();?>assets/js/SellerOrder.js"></script>
 <script>
  if (document.getElementsByClassName("mySlides").length > 0) {
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 9000);    
    }
  }
   
 </script>
 <script>

 
 </script>
  </body>

</html>
