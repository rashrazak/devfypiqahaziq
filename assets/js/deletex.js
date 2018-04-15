$(document).ready(function() {
        $(".deletex").click(function(){
            var id = $(this).val();
            console.log(id);
            let answer = confirm('Are you sure you want to delete this item?');
            if (answer){
                ajax(id);
            }else {
                location.reload(true);
            }
            
        });

        $(".showx").click(function(){
            var id = $(this).val();
            console.log(id);
            let answer = confirm('Are you sure you want to show this item?');
            if (answer){
                ajax2(id);
            }else {
                location.reload(true);
            }
            
        });

        $(".hidex").click(function(){
            var id = $(this).val();
            console.log(id);
            let answer = confirm('Are you sure you want to hide this item?');
            if (answer){
                ajax3(id);
            }else {
                location.reload(true);
            }
            
        });
    
        
    
    
        function ajax(id){
            var path = 'http://dev.fypiqa.com/index.php/ajax/showitem';
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

        function ajax2(id){
            var path = 'http://dev.fypiqa.com/index.php/ajax/showitem';
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

        function ajax3(id){
            var path = 'http://dev.fypiqa.com/index.php/ajax/hideitem';
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
        
    

   




});
