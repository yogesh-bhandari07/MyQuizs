function data_sent() {
    var qno = document.getElementById('qno').value;
    // alert(qno);
    if (qno == 1) {

        var question = document.getElementById('question').value;
        var ranswer = document.getElementById('ranswer').value;
        var option_1 = document.getElementById('option_1').value;
        var option_2 = document.getElementById('option_2').value;
        var option_3 = document.getElementById('option_3').value;
        var option_4 = document.getElementById('option_4').value;
        if (question == "" && ranswer == "" && option_1 == "" && option_2 == "" && option_3 == "" && option_4 == "") {
            alert("Fill All Fields Carefully !!!");
            // break;
        }
        $.ajax({
            type: "post",
            url: "../code/maketest.php",
            data: {
                question: question,
                ranswer: ranswer,
                option_1: option_1,
                option_2: option_2,
                option_3: option_3,
                option_4: option_4,
                qno: qno
            },
            success: function(x) {
                // alert(x);
                alert('Test Created !!!');
                window.location.href = '../templates/admin.php';
            }
        });
    } else if (qno == 2) {

        var question = document.getElementById('question').value;
        var ranswer = document.getElementById('ranswer').value;
        var option_1 = document.getElementById('option_1').value;
        var option_2 = document.getElementById('option_2').value;
        var option_3 = document.getElementById('option_3').value;
        var option_4 = document.getElementById('option_4').value;
        if (question == "" && ranswer == "" && option_1 == "" && option_2 == "" && option_3 == "" && option_4 == "") {
            alert("Fill All Fields Carefully !!!");
            // break;
        }
        $.ajax({
            type: "post",
            url: "../code/maketest.php",
            data: {
                question: question,
                ranswer: ranswer,
                option_1: option_1,
                option_2: option_2,
                option_3: option_3,
                option_4: option_4,
                qno: qno
            },
            success: function(x) {
                // alert(x);
                document.getElementById('question').value = "";
                document.getElementById('ranswer').value = "";
                document.getElementById('option_1').value = "";
                document.getElementById('option_2').value = "";
                document.getElementById('option_3').value = "";
                document.getElementById('option_4').value = "";
                document.getElementById('qno').value = x;
                document.getElementById('nextbtn').style.display = "none";
                document.getElementById('submitbtn').style.display = "block";
            }
        });
    } else {
        // alert(qno);
        var question = document.getElementById('question').value;
        var ranswer = document.getElementById('ranswer').value;
        var option_1 = document.getElementById('option_1').value;
        var option_2 = document.getElementById('option_2').value;
        var option_3 = document.getElementById('option_3').value;
        var option_4 = document.getElementById('option_4').value;
        $.ajax({
            type: "post",
            url: "../code/maketest.php",
            data: {
                question: question,
                ranswer: ranswer,
                option_1: option_1,
                option_2: option_2,
                option_3: option_3,
                option_4: option_4,
                qno: qno
            },
            success: function(x) {
                // alert(x);
                document.getElementById('question').value = "";
                document.getElementById('ranswer').value = "";
                document.getElementById('option_1').value = "";
                document.getElementById('option_2').value = "";
                document.getElementById('option_3').value = "";
                document.getElementById('option_4').value = "";
                document.getElementById('qno').value = x;

            }
        });
    }

}