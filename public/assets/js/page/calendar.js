var today = new Date();
year = today.getFullYear();
month = today.getMonth();
day = today.getDate();
var calendar = $("#myEvent").fullCalendar({
    height: "auto",
    defaultView: "month",
    editable: true,
    selectable: true,
    header: {
        left: "prev,next today",
        center: "title",
        right: "month,agendaWeek,agendaDay,listMonth",
    },
});
$(document).ready(function () {
    var SITEURL = "{{url('/')}}";
    var today = new Date();
    year = today.getFullYear();
    month = today.getMonth();
    day = today.getDate();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var calendar = $("#").fullCalendar({
        height: "auto",
        defaultView: "month",
        header: {
            left: "prev,next today",
            center: "title",
            right: "month,agendaWeek,agendaDay,listMonth",
        },
        editable: true,
        events: SITEURL + "/fullcalendar",
        displayEventTime: true,
        eventRender: function (event, element, view) {
            if (event.allDay === "true") {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt("Event Title:");
            if (title) {
                var start = $.fullCalendar.formatDate(
                    start,
                    "Y-MM-DD HH:mm:ss"
                );
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                $.ajax({
                    url: SITEURL + "/fullcalendar/create",
                    data: "title=" + title + "&start=" + start + "&end=" + end,
                    type: "GET",
                    success: function (data) {
                        displayMessage("Added Successfully");
                    },
                });
                calendar.fullCalendar(
                    "renderEvent",
                    {
                        title: title,
                        start: start,
                        end: end,
                        allDay: allDay,
                    },
                    true
                );
            }
            calendar.fullCalendar("unselect");
        },
        eventDrop: function (event, delta) {
            var start = $.fullCalendar.formatDate(
                event.start,
                "Y-MM-DD HH:mm:ss"
            );
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
            $.ajax({
                url: SITEURL + "/fullcalendar/update",
                data:
                    "title=" +
                    event.title +
                    "&start=" +
                    start +
                    "&end=" +
                    end +
                    "&id=" +
                    event.id,
                type: "POST",
                success: function (response) {
                    displayMessage("Updated Successfully");
                },
            });
        },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: SITEURL + "/fullcalendar/delete",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if (parseInt(response) > 0) {
                            $("#calendar").fullCalendar(
                                "removeEvents",
                                event.id
                            );
                            displayMessage("Deleted Successfully");
                        }
                    },
                });
            }
        },
    });
});
function displayMessage(message) {
    $(".response").html("<div class='success'>" + message + "</div>");
    setInterval(function () {
        $(".success").fadeOut();
    }, 1000);
}

/*$("#myEvent").fullCalendar({
  height: 'auto',
  header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,agendaWeek,agendaDay,listWeek'
  },
  editable: true,
  events: [
    {
      title: 'Conference',
      start: '2018-01-9',
      end: '2018-01-11',
      backgroundColor: "#fff",
      borderColor: "#fff",
      textColor: '#000'
    },
    {
      title: "John's Birthday",
      start: '2018-01-14',
      backgroundColor: "#007bff",
      borderColor: "#007bff",
      textColor: '#fff'
    },
    {
      title: 'Reporting',
      start: '2018-01-10T11:30:00',
      backgroundColor: "#f56954",
      borderColor: "#f56954",
      textColor: '#fff'
    },
    {
      title: 'Starting New Project',
      start: '2018-01-11',
      backgroundColor: "#ffc107",
      borderColor: "#ffc107",
      textColor: '#fff'
    },
    {
      title: 'Social Distortion Concert',
      start: '2018-01-24',
      end: '2018-01-27',
      backgroundColor: "#000",
      borderColor: "#000",
      textColor: '#fff'
    },
    {
      title: 'Lunch',
      start: '2018-01-24T13:15:00',
      backgroundColor: "#fff",
      borderColor: "#fff",
      textColor: '#000',
    },
    {
      title: 'Company Trip',
      start: '2018-01-28',
      end: '2018-01-31',
      backgroundColor: "#fff",
      borderColor: "#fff",
      textColor: '#000',
    },
  ]

});
*/
