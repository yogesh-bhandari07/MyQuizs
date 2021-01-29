function startTimer(duration, display) {
    var start = Date.now(),
        diff,
        minutes,
        seconds;

    function timer() {

        diff = duration - (((Date.now() - start) / 1000) | 0);

        minutes = (diff / 60) | 0;
        seconds = (diff % 60) | 0;

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (diff <= 0) {

            start = Date.now() + 1000;
        }
    };
    timer();
    setInterval(timer, 1000);
}

window.onload = function() {
    var fiveMinutes = document.getElementById('testtime').value,
        display = document.querySelector('#time');
    startTimer(fiveMinutes * 60, display);

};
var tt = document.getElementById('testtime').value;
var ttt = tt * 60000;
// alert(ttt);
setInterval(function() { document.getElementById("submitbtn").click(); }, ttt);