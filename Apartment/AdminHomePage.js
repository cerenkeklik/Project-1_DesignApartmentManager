document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    selectable: true,
    editable: true,
    eventLimit: true,

    events: "getEvents.php",


    dateClick: function (info) {
      date = info.dateStr;

      var title = prompt("Please enter your event :");


      if (title != null) {
        calendar.addEvent({
          title: title,
          date: date,
          allDay: true
        });
        $.ajax({
          url: 'addEvents.php',
          type: "POST",
          data: { title: title, date: date },
          success: function () {

            calendar.fullCalendar('rerenderEvents');
          }
        });

      }
    },

    eventClick: function (events) {
      
      $.ajax({
        url: "deleteEvents.php",
        type: "POST",
      

        success: function () {

          events.event.remove();
          alert("Deleted Successfully");

        }
      });
    },
  }
  );
  calendar.render();
});


