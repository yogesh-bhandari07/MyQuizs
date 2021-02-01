function test_delete() {
    var test_name = document.getElementById('test').value;
    alert(test_name);
    $.ajax({
        type: "post",
        url: "../code/deletetest.php",
        data: {
            test_name: test_name
        },
        success: function(x) {

            alert('Test Deleted !!!');
            window.location.href = '../templates/runningtest.php';
        }
    });
}