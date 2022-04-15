
<?php
    $timelimit = '1 hour 10 mins';
    $createdon = new DateTime("2022-04-15 15:07:33");
    $createdon->modify('+'.$timelimit.'');
    $date= $createdon->format('Y-m-d H:i:s');
    ?>

<div id="data">

</div>
<input type="hidden" id="date" value="<?php echo $date; ?>">

<script>
    function func() {
        var dateValue= document.getElementById("date").value;

        var date =  Math.abs((new Date().getTime() / 1000).toFixed(0));
        var date2 = Math.abs((new Date(dateValue).getTime() / 1000).toFixed(0));
        var diff = date2 - date;



        var days = Math.floor(diff / 86400);
        var hours = Math.floor(diff / 3600) % 24;
        var mins = Math.floor(diff / 60) % 60;
        var secs = diff % 60;

        if (hours < 10) {
            hours = "0" + hours;    // add leading zeros
        }
        if (mins < 10) {
            mins = "0" + mins;    // add leading zeros
        }
        if (secs < 10) {
            secs = "0" + secs;    // add leading zeros
        }

        document.getElementById("data").innerHTML = days + " days, " + hours + ":" + mins + ":" + secs;
    }
    func();
    setInterval(func, 1000)
</script>
