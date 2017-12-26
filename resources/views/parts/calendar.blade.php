<div id='calendar'></div>

<script type="text/javascript">
$('#calendar').fullCalendar({
	allDayDefault: true,
	events: "/catalogue/booking",
    header: {
    	left:   'prev,next',
	    center: '',
	    right:  'title',
    },
    height: 520,
    fixedWeekCount: false,
    showNonCurrentDates: false
});
</script>