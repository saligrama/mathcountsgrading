troll

<script>
var sec = 0;
var bold = true;
function timers()
{
        var timer = document.getElementById("timer");

        timer.innerHTML="<h4 style='font-weight:'" + bold ? "bold" : "normal" + "';'>gg noob u wasted " + (sec++) + " milliseconds by doing this!</h4>";

        bold = !bold;
}

window.setInterval(timers, 1);

</script>

<div id="timer"></div>

@keyframes wheel-spin {
    0% { transform: rotate(-30deg);
         -ms-transform: rotate(-30deg);
         -webkit-transform: rotate(-30deg);
       }
    50% { transform: rotate(60deg);
          -ms-transform: rotate(60deg);
         -webkit-transform: rotate(60deg);
        }
    100% { transform: rotate(-30deg);
         -ms-transform: rotate(-30deg);
         -webkit-transform: rotate(-30deg);
         }
}
