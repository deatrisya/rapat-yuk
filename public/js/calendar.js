document.addEventListener("DOMContentLoaded", function () {
    var dashboardCalendarEl = document.getElementById("calendar-dashboard");
    var detailroomCalendarEl = document.getElementById("calendar-detail-room");

    if (dashboardCalendarEl) {
        var book_lists = JSON.parse(
            dashboardCalendarEl.getAttribute("data-book")
        );
        var events = [];

        book_lists.forEach(function (item) {
            events.push({
                title: item.room,
                start: item.start,
                end: item.end,
                extendedProps: {
                    description: item.title,
                    roomId: item.room_id,
                },
            });
        });

        var dashboardCalendarEl = new FullCalendar.Calendar(
            dashboardCalendarEl,
            {
                //timeZone: "Local",
                buttonText: {
                    today: "Hari ini",
                },
                themeSystem: "bootstrap5",
                eventTimeFormat: {
                    hour: "2-digit",
                    minute: "2-digit",
                    meridiem: false,
                    hour12: false,
                },
                // eventDidMount: function (info) {
                //     console.log(info.event.extendedProps);
                // },
                //expandRows: true,
                //eventDisplay: "block",
                dayMaxEventRows: true,
                displayEventEnd: true,
                views: {
                    dayGridMonth: {
                        titleFormat: { year: "numeric", month: "short" },
                    },
                    timeGrid: {
                        dayMaxEventRows: 3,
                    },
                },
                eventContent: function (info) {
                    var eventContent = document.createElement("div");

                    var titleText = info.event.extendedProps.roomId;
                    switch (titleText) {
                        case 1:
                            var eventTitle = document.createElement("div");
                            eventTitle.className =
                                "fc-event-title bg-success rounded text-white text-center";
                            eventTitle.innerText = info.event.title;
                            eventContent.appendChild(eventTitle);
                            break;
                        case 2:
                            var eventTitle = document.createElement("div");
                            eventTitle.className =
                                "fc-event-title bg-warning rounded text-white text-center";
                            eventTitle.innerText = info.event.title;
                            eventContent.appendChild(eventTitle);
                            break;
                        case 3:
                            var eventTitle = document.createElement("div");
                            eventTitle.className =
                                "fc-event-title bg-info rounded text-white text-center";
                            eventTitle.innerText = info.event.title;
                            eventContent.appendChild(eventTitle);
                            break;
                        default:
                            var eventTitle = document.createElement("div");
                            eventTitle.className =
                                "fc-event-title bg-danger rounded text-white text-center";
                            eventTitle.innerText = info.event.title;
                            eventContent.appendChild(eventTitle);
                            break;
                    }

                    var eventTime = document.createElement("div");
                    eventTime.className = "fc-event-time";
                    eventTime.innerText =
                        info.event.start.toLocaleTimeString(
                            [],
                            dashboardCalendarEl.getOption("eventTimeFormat")
                        ) +
                        " - " +
                        info.event.end.toLocaleTimeString(
                            [],
                            dashboardCalendarEl.getOption("eventTimeFormat")
                        );
                    eventContent.appendChild(eventTime);

                    var eventDescription = document.createElement("div");
                    eventDescription.className = "fc-event-description";
                    eventDescription.innerText =
                        info.event.extendedProps.description;
                    eventContent.appendChild(eventDescription);

                    return { domNodes: [eventContent] };
                },
                events: events,
            }
        );
        dashboardCalendarEl.render();
    }
    if (detailroomCalendarEl) {
        var book_lists = JSON.parse(
            detailroomCalendarEl.getAttribute("data-book")
        );
        var events = [];
        book_lists.forEach(function (item) {
            events.push({
                start: item.start,
                end: item.end,
            });
        });
        var detailroomCalendarEl = new FullCalendar.Calendar(
            detailroomCalendarEl,
            {
                //timeZone: "Local",
                displayEventEnd: "true",
                buttonText: {
                    today: "Hari ini",
                },
                initialView: "dayGridMonth",
                themeSystem: "bootstrap5",
                titleFormat: { year: "numeric", month: "short" },
                eventTimeFormat: {
                    hour: "numeric",
                    minute: "2-digit",
                    meridiem: false,
                    hour12: false,
                },
                contentHeight: 200,
                events: events,
                eventDisplay: "block",
                eventDidMount: function (arg) {
                    var eventEl = arg.el;
                    var timeText = arg.event.start.toLocaleTimeString([], {
                        hour: "2-digit",
                        minute: "2-digit",
                    });
                    var tooltipText =
                        timeText +
                        " - " +
                        arg.event.end.toLocaleTimeString([], {
                            hour: "2-digit",
                            minute: "2-digit",
                        });

                    eventEl.setAttribute("title", tooltipText);
                },
            }
        );
        detailroomCalendarEl.render();
    }
});
