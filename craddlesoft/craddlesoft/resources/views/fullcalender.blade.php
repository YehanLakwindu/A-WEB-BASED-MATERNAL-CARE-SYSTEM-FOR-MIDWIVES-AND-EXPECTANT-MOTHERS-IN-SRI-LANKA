<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments Calendar | CraddleSoft</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            padding: 15px;
            border-radius: 12px 12px 0 0;
        }
        .card-body {
            padding: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 15px;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        #calendar {
            margin-top: 20px;
        }
        .fc-toolbar h2 {
            font-size: 1.25rem;
            font-weight: bold;
        }
        .fc-button {
            background-color: #007bff !important;
            border: none !important;
            color: white !important;
            padding: 6px 12px !important;
            border-radius: 6px !important;
            font-size: 0.875rem !important;
        }
        .fc-button:hover {
            background-color: #0056b3 !important;
        }
        .fc-event {
            background-color: #007bff !important;
            color: white !important;
            border: none !important;
            border-radius: 6px !important;
        }
        .toastr-success {
            background-color: #007bff !important;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card">
        <div class="card-header">
            Appointments Calendar
        </div>
        <div class="card-body">
            <div id="calendar"></div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    var SITEURL = "{{ url('/') }}";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: SITEURL + "/fullcalender",
        displayEventTime: false,
        editable: true,
        eventRender: function (event, element) {
            element.attr('title', event.title);
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end) {
            var title = prompt('Event Title:');
            if (title) {
                var startFormatted = $.fullCalendar.formatDate(start, "Y-MM-DD");
                var endFormatted = $.fullCalendar.formatDate(end, "Y-MM-DD");
                $.ajax({
                    url: SITEURL + "/fullcalenderAjax",
                    data: {
                        title: title,
                        start: startFormatted,
                        end: endFormatted,
                        type: 'add'
                    },
                    type: "POST",
                    success: function (data) {
                        displayMessage("Event Created Successfully");
                        calendar.fullCalendar('renderEvent',
                            {
                                id: data.id,
                                title: title,
                                start: startFormatted,
                                end: endFormatted,
                                allDay: true
                            },
                            true
                        );
                        calendar.fullCalendar('unselect');
                    }
                });
            }
        },
        eventDrop: function (event) {
            var startFormatted = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
            var endFormatted = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

            $.ajax({
                url: SITEURL + '/fullcalenderAjax',
                data: {
                    title: event.title,
                    start: startFormatted,
                    end: endFormatted,
                    id: event.id,
                    type: 'update'
                },
                type: "POST",
                success: function () {
                    displayMessage("Event Updated Successfully");
                }
            });
        },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: SITEURL + '/fullcalenderAjax',
                    data: {
                        id: event.id,
                        type: 'delete'
                    },
                    success: function () {
                        calendar.fullCalendar('removeEvents', event.id);
                        displayMessage("Event Deleted Successfully");
                    }
                });
            }
        }
    });
});

function displayMessage(message) {
    toastr.success(message, 'Success');
}
</script>

</body>
</html>
