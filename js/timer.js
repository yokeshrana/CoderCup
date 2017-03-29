var timeoutHandle;
//DEFINING OF SESSION REMAINING !!!!
function timelimit(time) {

    if(time<=0)
    {
        alert('Time Up');
        self.location = "logout.php";
    }

 if(time>10 && time <=11)
    {
        alert('time is going to expire in minute ');
        
    }

    var seconds = time%60;
    var mins = Math.floor(time/60);
    function update() {
        var counter = document.getElementById("timer_text");
        counter.innerHTML =mins.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
        seconds--;
        if(seconds>0)
        {
            timeoutHandle=setTimeout(update,1000);
        }
        else
        {
            setTimeout(function () { timelimit(mins*60-1); }, 1000);
        }
    }
    //UPDATE METHOD TO UPDATE AT REGULAR INTERVALS
    update();
}
