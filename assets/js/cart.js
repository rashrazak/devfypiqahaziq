$(document).ready(function() {
    $('.DesDetail').hide();
    $('#UploadReceipt').hide();
    $('.ComDetail').hide();
    $('.showDescription').click(function() {
        var desc = $(this).val();
        $('.DesDetail').show();
        console.log(desc);
        $('.pdes').text(desc);
    });

    $('.proceedx').click(function() {
        $('#UploadReceipt').show();
    });

    $(".deleteCart").click(function(){
        var id = $(this).val();
        console.log(id);
        let answer = confirm('Are you sure you want to remove this item?');
        if (answer){

            ajax2(id);
           
        }else {
            location.reload(true);
        }
        
    });

    $(".deleteSeller").click(function(){
        var id = $(this).val();
        console.log(id);
        let answer = confirm('Are you sure you want to remove this seller?');
        if (answer){

            ajax23(id);
           
        }else {
            location.reload(true);
        }
        
    });



    $('.showCompany').click(function() {
        var comp = $(this).val();
        console.log(comp);
        var path = 'http://dev.fypiqa.com/index.php/ajax/cartCompany';
        return $.ajax({
            type: "POST",
            data: {
                id:comp
            },
            url: path,
            success: function(data){
                console.log(data);
                data = $.parseJSON(data);
                var textx =  data["return"][0];
                comName ='Company Name: '+ textx['companyname'];
                comEmai ='Company Email: '+ textx['emel']; 
                comHp ='Company Phone: '+ textx['hp'];
                comAdd ='Company Address: '+ textx['address'];
                comMbb ='Company Account Payment: 12385199231013';
                    $('.ComDetail').show();
                    $('.pname').text(comName);
                    $('.pemail').text(comEmai);
                    $('.phph').text(comHp);
                    $('.padd').text(comAdd);
                    $('.mbb').text(comMbb);

            }
        });
       
        

    });

    function ajax2(id){
        var path = 'http://dev.fypiqa.com/index.php/ajax/deletecart';
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

    function ajax23(id){
        var path = 'http://dev.fypiqa.com/index.php/ajax/deleteseller';
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