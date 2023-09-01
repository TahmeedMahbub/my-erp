<script>
    setInterval(function() {
        var currentDate = new Date();
        var formattedWeek = currentDate.toLocaleString('en-US', { weekday: 'long' });
        var formattedDate = currentDate.toLocaleString('en-US', { day: 'numeric', month: 'long', year: 'numeric' });
        var formattedTime = currentDate.toLocaleString('en-US', { hour: '2-digit', minute: '2-digit', second: '2-digit' });

        document.getElementById('time').innerText = formattedWeek+' | '+formattedDate+' | '+formattedTime;
    }, 1000);

</script>

@yield('script')

<script src="{{asset('assets/js/app.js')}}"></script>

<script src="{{asset('assets/plugins/select/selectr.min.js')}}"></script>
<script src="{{asset('assets/plugins/huebee/huebee.pkgd.min.js')}}"></script>
<script src="{{asset('assets/plugins/datepicker/datepicker-full.min.js')}}"></script>
<script src="{{asset('assets/plugins/moment/moment.js')}}"></script>
<script src="{{asset('assets/plugins/imask/imask.js')}}"></script>
<script src="{{asset('assets/pages/forms-advanced.js')}}"></script>
