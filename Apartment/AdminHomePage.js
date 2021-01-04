document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    selectable: true,
    editable: true,
    eventLimit:true,

    events: "getEvents.php",
    
    
    dateClick: function (info) {
      date = info.dateStr;

      var title = prompt("Please enter your event :");

      calendar.addEvent({
        title: title,
        date: date,
        allDay: true
      });

      $.ajax({
        url: 'addEvents.php',
        type: "POST",
        data: { title: title, date: date },
       
      });
      calendar.fullCalendar('unselect');
    },
   
    eventClick: function (info) {

      $.ajax({
        url: 'deleteEvents.php',
       
      });
      calendar.fullCalendar('unselect');
    }
  
   
  }
 
  );


  calendar.render();
});


