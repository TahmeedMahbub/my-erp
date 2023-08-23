<script>
    setInterval(function() {
        var currentDate = new Date();
        var formattedWeek = currentDate.toLocaleString('en-US', { weekday: 'long' });
        var formattedDate = currentDate.toLocaleString('en-US', { day: 'numeric', month: 'long', year: 'numeric' });
        var formattedTime = currentDate.toLocaleString('en-US', { hour: '2-digit', minute: '2-digit', second: '2-digit' });

        document.getElementById('time').innerText = formattedWeek+' | '+formattedDate+' | '+formattedTime;
    }, 1000);

</script>

<script src="assets/plugins/apexcharts/apexcharts.min.js"></script>
<script src="assets/pages/analytics-index.init.js"></script>
<!-- App js -->
<script src="assets/js/app.js"></script>
