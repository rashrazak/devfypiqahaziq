  
  $(document).ready(function() {
 
    $('.latest').on('click',function(){
      var id = $(this).val();
      ajax(id);

    });
    function ajax(id){
        var path = 'http://dev.fypiqa.com/index.php/ajax/prepareItem';
        return $.ajax({
            type: "POST",
            data: {
                id:id
            },
            url: path,
            success: function(data){
                console.log(data);
                location.reload(true);
            }
        });
    }
    $('.cancel').on('click',function(){
      var id = $(this).val();
      var person = prompt("Please enter your reason",);

      if (person != null) {

        ajax2x(id,person);
      }
      

    });
    function ajax2x(id,person){
        var path = 'http://dev.fypiqa.com/index.php/ajax/cancelItem';
        return $.ajax({
            type: "POST",
            data: {
                id:id,
                reason:person
            },
            url: path,
            success: function(data){
                console.log(data);
                location.reload(true);
            }
        });
    }
    $('#previous').click(function(){
      var mainurl = 'http://dev.fypiqa.com/assets/imagex/';
      var url = $(this).val();
      var imgurl = mainurl + url;
      $('.myImg').attr('src', imgurl);
      console.log(imgurl);

    });





  });