// VARIABLES FOR CALENDAR
var months = ["JANUARY","FEBRUARY","MARCH","APRIL","MAY","JUNE","JULY","AUGUST","SEPTEMBER","OCTOBER","NOVEMBER","DECEMBER"];
var days = ["SUN","MON","TUES","WED","THURS","FRI","SAT"];



// var today = new Date();
// var year = today.getFullYear();
// var month = today.getMonth() + 1;
// var days = getNumDays(month,year);

// var dates = [];
// console.log(dates);

// console.log(year);
// console.log(month);
// console.log(days);

function getNumDays(month, year) {
    return new Date(year, month, 0).getDate();
}

function getEventDates(month,year) {

    var eventdates = [];

    console.log("GET EVENTS");

    $date_range = {
        'year': year,
        'month': month,
        'lastday': getNumDays(month,year)
    };

    console.log($date_range);

    $.ajax({
        url: 'getdates',
        type: 'POST',
        data: {
            'year' : year,
            'month' : month + 1,
            'lastday' : getNumDays(month,year)
        },
        success: function(results) {
            // console.log(dates);
            for (var i = 0; i < results.length; i++) {
                var date = results[i].date;
                eventdates.push(date);
            }
            calendarMonth(month, year, eventdates);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus,errorThrown);
        }
    });

    // console.log(dates);
}

function calendarMonth(month, year, dates) {

    console.log("CALENDAR");
    console.log(dates);

    console.log("CALENDAR MONTH: " + month);

    var table = "<tbody><tr>";
    
    for (var d = 0; d < days.length; d++) {
        table += "<th>" + days[d] + "</th>";
    }

    table += "</tr>";
    
    var row = "<tr>";
    
    var date_id;
    var date_class;

    console.log(months[month]);
    
    var firstDay = new Date(months[month] + " 1, " + year + " 00:00:00").getDay();
    
    var i;
    var d;

    console.log("FIRST DAY: " + firstDay);

    // pad empty cells before first of the month
    if (firstDay != 0) {
        for (i = 0; i < firstDay; i++) {
            row += "<td></td>";
        }
    }

    // fill calendar with correct days
    for (i = 1, d = firstDay; i < getNumDays(month,year); i++, d++) {
        // if day count is greater than 6 (SAT), move back to 0 (SUN)
        if (d > 6) {
            d = 0;
            // complete table row, add to table, start new row
            row += "</tr>"
            console.log("ROW " + row);
            table += row;
            row = "<tr>";
        }
        
        date_class = "cal-date";
        date_id = getDateId(i,month,year);

        // console.log(date_id);
        // console.log(dates.includes(date_id));

        // check for event on current date
        if (dates.includes(date_id)) {
            date_class += " event-date";
        }

        // if current date = today, add class for highlight
        var today = new Date();
        var yesterday = new Date();
        yesterday.setDate(today.getDate() - 1);
        var tomorrow = new Date();
        tomorrow.setDate(today.getDate() + 1);

        var today_string = today.toISOString().split('T')[0];
        var yesterday_string = yesterday.toISOString().split('T')[0];
        var tomorrow_string = tomorrow.toISOString().split('T')[0];

        switch(date_id) {
            case today_string:
                date_class += " today";
                // display events for today - if present
                if (dates.includes(date_id)) {
                    $('#no-events').css('display','none');
                    $('.event_box').remove();
                    getEventInfo(date_id);
                }
                break;
            case tomorrow_string:
                date_class += " tomorrow";
                break;
            case yesterday_string:
                date_class += " yesterday";
                break;
            default:
                break;
        }
        
        row += "<td class=\"" + date_class + "\" id=\"" + date_id + "\"><p class='dot'>" + i + "</p></td>";

    }
    
    
    document.getElementById("cal-month").innerHTML = table + row + "</tr></tbody>";

}

// get id for cells
function getDateId(day, month, year) {

    var id = year + "-" + (month + 1) + "-";

    if (day < 10) {
        id += "0" + day;
    }
    else {
        id += day;
    }

    return id;
}

function displaySelectedDate(id) {

    var date = id.split('-');
    var year = date[0];
    var month = date[1];
    var day = date[2];

    var monthName = months[month-1];
    var weekday = new Date(monthName + " " + day + ", " + year + " 00:00:00").getDay();
    var date_string = days[weekday] + " " + day + " " + monthName;

    $('#selected-date').text(date_string);
}

function createEventBox(event) {
    var box = "<div class='event_box' id='" + event.id + "'>" + $('.events_single').html();

    $('.events_list').append(box);

    $('#' + event.id + ' .single_title').text(event.title);
    $('#' + event.id + ' .single_description').text(event.description);
    $('#' + event.id + ' .single_location span').text(event.location);

}

function getEventInfo(id) {
    // console.log(id);

    $.ajax({
        url: 'geteventinfo',
        type: 'POST',
        data: {
            'date' : id
        },
        dataType: 'json',
        success: function(result) {
            for (var i = 0; i < result.length; i++) {
                createEventBox(result[i]);
            }
        }
    })
}

$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var current_month = new Date().getMonth();
    var current_year = new Date().getFullYear();

    $('#display-month').text(months[current_month]);
    $('#display-year').text(current_year);

    $('#back-btn button').text(months[current_month - 1]);
    $('#forward-btn button').text(months[current_month + 1]);

    console.log("READY");

    getEventDates(current_month,current_year);

    $(document).on('click', 'td.cal-date', function() {
        $('.cal-date').removeClass('selected');
        $(this).addClass('selected');

        var selected_id = $(this).attr('id');

        if ($(this).hasClass('yesterday')) {
            $('#selected-date').text("YESTERDAY");
        }
        else if ($(this).hasClass('today')) {
            $('#selected-date').text("TODAY");
        }
        else if ($(this).hasClass('tomorrow')) {
            $('#selected-date').text("TOMORROW");
        }
        else {
            displaySelectedDate(selected_id);
        }

        // if date has events
        if ($(this).hasClass('event-date')) {
            // get event details using date
            // console.log(selected_id);
            $('#no-events').css('display','none');
            $('.event_box').remove();
            getEventInfo(selected_id);
        }
        else {
            $('.event_box').remove();
            $('#no-events').css('display','block');
        }

    })

})

$('#change-back').click(function() {
    var month_id = months.indexOf($('#display-month').text()) - 1;

    var display_year = $('#display-year').text();

    $('#forward-btn button').text($('#display-month').text());

    if (month_id < 0) {
        month_id = 11;
        display_year = parseInt(display_year) - 1;
        $('#display-year').text(display_year);
    }

    var previousmonth = month_id - 1;

    if (previousmonth < 0) {
        previousmonth = 11;
    }

    $('#back-btn button').text(months[previousmonth]);

    $('#display-month').text(months[month_id]);

    getEventDates(month_id,display_year);

})

$('#change-forward').click(function() {
    var month_id = months.indexOf($('#display-month').text()) + 1;

    var display_year = $('#display-year').text();

    $('#back-btn button').text($('#display-month').text());

    if (month_id > 11) {
        month_id = 0;
        display_year = parseInt(display_year) + 1;
        $('#display-year').text(display_year);
    }

    var nextmonth = month_id + 1;

    if (nextmonth > 11) {
        nextmonth = 0;
    }

    $('#forward-btn button').text(months[nextmonth]);

    $('#display-month').text(months[month_id]);

    console.log("MONTH ID: " + month_id);
    getEventDates(month_id,display_year);

})

