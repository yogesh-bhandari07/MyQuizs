function update_data(){
    var email = document.getElementById('stdemail').value;
    var mob =document.getElementById('stdmob').value;
    var enroll=document.getElementById('enroll').value;
        $.ajax({
            type: "post",
            url: "../code/profileupdate.php",
            data: {
                email:email,
                mob:mob,
                enroll:enroll
            },
            success: function(x) {
                alert('Data Updated !!!');
                window.location.href = '../templates/profile.php';
            }
        });
    } 