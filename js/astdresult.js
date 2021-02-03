function search_data(){
    document.getElementById('rdata').innerHTML="";
    var enroll = document.getElementById('enrollment').value;
    var classs = document.getElementById('class').value;
    
        $.ajax({
            type: "post",
            url: "../code/search.php",
            data: {
                enroll:enroll,
                class:classs
                
            },
            success: function(x) {
                document.getElementById('rdata').innerHTML=x;
            }
        });
    } 