var timeoutHandle;
//DEFINING OF SESSION REMAINING !!!!
function timelimit(time) {
    var seconds = time%60;
    var mins = Math.floor(time/60);
    function update() {
        var counter = document.getElementById("timer_text");
        // var current_minutes = mins;
        // seconds--;
        // counter.innerHTML =current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
        // if( seconds > 0 ) {
        //     timeoutHandle=setTimeout(update, 1000);
        // } else {
        //     if(mins > 1){
        //        setTimeout(function () { timelimit(mins - 1); }, 1000);
        //     }
        // }
        counter.innerHTML =mins.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
        seconds--;
        if(seconds>0)
        {
            timeoutHandle=setTimeout(update,1000);
        }
        else if(mins>1)
        {
            setTimeout(function () { timelimit((mins-1)*60-1); }, 1000);
        }
    }
    //UPDATE METHOD TO UPDATE AT REGULAR INTERVALS
    update();
}
