
var timeoutHandle;
function timelimit(minutes) {
    var seconds = 60;
    var mins = minutes;
    function update() {
        var counter = document.getElementById("timer_text");
        var current_minutes = mins-1
        seconds--;
        counter.innerHTML =
        current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
        if( seconds > 0 ) {
            timeoutHandle=setTimeout(update, 1000);
        } else {

            if(mins > 1){
               setTimeout(function () { timelimit(mins - 1); }, 1000);

            }
        }
    }
    update();
}

timelimit(2);
