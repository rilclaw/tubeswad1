<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
            initialView: 'dayGridMonth',
            height: 600,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,dayGridWeek'
            },
            events: "{{ route('calendar.events') }}",
            eventClick: function(info) {
                if (info.event.url) {
                    window.open(info.event.url, "_blank");
                    info.jsEvent.preventDefault();
                }
            }
        });
        calendar.render();
    });
</script>
