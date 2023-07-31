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
                title: item.title,
                start: item.start,
                end: item.end,
            });
        });
        var dashboardCalendarEl = new FullCalendar.Calendar(
            dashboardCalendarEl,
            {
                timeZone: "UTC",
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
                },
                aspectRatio: 1.75,
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
                title: item.title,
                start: item.start,
                end: item.end,
            });
        });
        var detailroomCalendarEl = new FullCalendar.Calendar(
            detailroomCalendarEl,
            {
                timeZone: "UTC",
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
                },
                contentHeight: 200,
                events: events,
            }
        );
        detailroomCalendarEl.render();
    }
});
