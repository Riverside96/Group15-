function breakdownDate(createdOnDate) {
    // var dateValue= document.getElementById("date").value;

    var date =  Math.abs((new Date().getTime() / 1000).toFixed(0));
    var date2 = Math.abs((new Date(createdOnDate).getTime() / 1000).toFixed(0));
    var diff = date2 - date;

    var days = Math.floor(diff / 86400);
    var hours = Math.floor(diff / 3600) % 24;
    var mins = Math.floor(diff / 60) % 60;
    var secs = diff % 60;


    // document.getElementById("data").innerHTML = days + " days, " + hours + ":" + mins + ":" + secs;
    if (days>=0) {
        return days + " days, " + hours + ":" + mins + ":" + secs;
    } else {
        return "Passed Due";
    }
}