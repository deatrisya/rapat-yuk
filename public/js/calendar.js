document.addEventListener("DOMContentLoaded", function () {
    var calendarEl = document.getElementById("calendar");
    var book_lists = JSON.parse(calendarEl.getAttribute("data-book"));
    var events = [];
    book_lists.forEach(function (item) {
        events.push({
            title: item.title,
            start: item.start,
            end: item.end,
        });
    });
    var calendar = new FullCalendar.Calendar(calendarEl, {
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
    });
    calendar.render();
});
