document.addEventListener('DOMContentLoaded', function() {
        var time_clock = document.getElementById("js-taskbar-time");
        var update_time = function(){
            time_clock.textContent = new Date().toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'});
            time_clock.setAttribute("title", new Date().toLocaleString([], {weekday: 'long', month: 'long', day:'2-digit', minute: '2-digit', hour: '2-digit'}))
            setTimeout(update_time, 1000);
        };
        update_time();

}, false);
