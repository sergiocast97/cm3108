// VARIABLES FOR CALENDAR
var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
var days = ["Sun","Mon","Tues","Wed","Thurs","Fri","Sat"];

/**
 * Returns number of days in a given month
 * @param {int} month
 * @param {int} year
 */
function getNumDays(month, year) {
    // Use JS Date() function
    return new Date(year, month, 0).getDate();
}

/**
 * Retrieve all event dates for given month.
 * To display which dates have events on the Calendar
 * @param {int} month 
 * @param {int} year 
 */
function getEventDates(month,year) {

    var eventdates = [];

    // data for ajax call
    $date_range = {
        'year': year,
        'month': month,
        'lastday': getNumDays(month,year)
    };

    // AJAX - POST REQUEST
    // Return all event dates
    $.ajax({
        url: 'getdates',
        type: 'POST',
        data: {
            'year' : year,
            'month' : month + 1,
            'lastday' : getNumDays(month,year)
        },
        success: function(results) {
            // Add dates to array
            for (var i = 0; i < results.length; i++) {
                var date = results[i].date;
                eventdates.push(date);
            }

            // Build calendar for given month, using returned event dates
            // to display dates correctly
            calendarMonth(month, year, eventdates);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus,errorThrown);
        }
    });

    // console.log(dates);
}

/**
 * Build calendar monthly view for given month and year
 * @param {int} month 
 * @param {int} year 
 * @param {String[]} dates 
 */
function calendarMonth(month, year, dates) {

    // Use table to display dates under correct 'Day of Week' headings
    var table = "<tbody><tr>";
    
    // Add headings (Days of Week)
    for (var d = 0; d < days.length; d++) {
        table += "<th>" + days[d] + "</th>";
    }

    table += "</tr>";
    
    var row = "<tr>";
    
    var date_id;
    var date_class;
    
    // find weekday of first day of month
    var firstDay = new Date(months[month] + " 1, " + year + " 00:00:00").getDay();
    
    var i;
    var d;

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
            // console.log("ROW " + row);
            table += row;
            row = "<tr>";
        }
        
        // add clas; date as ID
        date_class = "cal-date";
        date_id = getDateId(i,month,year);

        // check for event on current date
        if (dates.includes(date_id)) {
            date_class += " event-date";
        }

        // if current date = today, add class for highlight
        var today = new Date();

        // define 'yesterday' for text date display
        var yesterday = new Date();
        yesterday.setDate(today.getDate() - 1);

        // define 'tomorrow' for text date display
        var tomorrow = new Date();
        tomorrow.setDate(today.getDate() + 1);

        // change date to String
        var today_string = today.toISOString().split('T')[0];
        var yesterday_string = yesterday.toISOString().split('T')[0];
        var tomorrow_string = tomorrow.toISOString().split('T')[0];

        // check current date iteration against 'today'/'tomorrow'/'yesterday'
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
        
        // add row of dates to calendar month table
        row += "<td class=\"" + date_class + "\" id=\"" + date_id + "\"><p class='dot'>" + i + "</p></td>";

    }
    
    // add finished month table to DOM
    document.getElementById("cal-month").innerHTML = table + row + "</tr></tbody>";

}

/**
 * Get ID for each date, in format YYYY-MM-DD
 * @param {int} day 
 * @param {int} month 
 * @param {int} year 
 */
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

/**
 * Display selected date on side panel using date ID
 * @param {int} id 
 */
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
    var box = "<div class='box event_box' id='" + event.id + "'>" + $('.events_single').html();

    $('.events_list').append(box);

    $('#' + event.id + ' .single_title').text(event.title);
    $('#' + event.id + ' .single_description').text(event.description);
    $('#' + event.id + ' .single_location span').text(event.location);
    $('#' + event.id + ' input[name="event_id"]').val(event.id);

}

function showEventInfo(event) {
    var box = "<div class='box event_box' id='" + event.id + "'>" + $('.events_single').html();

    $('.events_list').append(box);

    $('#' + event.id + ' .single_title').text(event.title);
    $('#' + event.id + ' .single_description').text(event.description);
    $('#' + event.id + ' .single_location span').text(event.location);
    $('#' + event.id + ' input[name="event_id"]').val(event.id);
}

/**
 * Get event information for selected event
 * @param {int} id 
 */
function getEventInfo(id) {

    // AJAX - POST
    // Get event information from Server
    $.ajax({
        url: 'geteventinfo',
        type: 'POST',
        data: {
            'date' : id
        },
        dataType: 'json',
        success: function(result) {
            if (result.length > 1) {
                for (var i = 0; i < result.length; i++) {
                    createEventBox(result[i]);
                }
            }
            else {
                showEventInfo(result[0]);
            }            
        }
    })
}

/**
 * DOCUMENT READY FUNCTION
 */
$(document).ready(function() {

    // Setup for AJAX headers
    // Add CSRF token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Get current month and year using JS Date() function
    var current_month = new Date().getMonth();
    var current_year = new Date().getFullYear();

    // Change title to correct month/year
    // $('#display-month').text(months[current_month]);
    // $('#display-year').text(current_year);

    $('.date-picker').val(months[current_month] + " " + current_year);

    // Change navigation buttons to correct months
    $('#back-btn button').text(months[current_month - 1]);
    $('#forward-btn button').text(months[current_month + 1]);

    // Get event dates and build calendar
    getEventDates(current_month,current_year);

    // Add 'Click' listener to table cells
    $(document).on('click', 'td.cal-date', function() {

        // Change selected box
        $('.cal-date').removeClass('selected');
        $(this).addClass('selected');

        var selected_id = $(this).attr('id');

        // Set Date Text on side panel
        if ($(this).hasClass('yesterday')) {
            $('#selected-date').text("Yesterday");
        }
        else if ($(this).hasClass('today')) {
            $('#selected-date').text("Today");
        }
        else if ($(this).hasClass('tomorrow')) {
            $('#selected-date').text("Tomorrow");
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
            // No events
            $('.event_box').remove();
            $('#no-events').css('display','block');
        }

    })

})

/**
 * Click Listener for Back Navigation
 * Change calendar to display previous month
 */

$('#change-back').click(function() {
    var month_id = months.indexOf($('.date-picker').val().split(" ")[0]) - 1;

    var display_year = $('.date-picker').val().split(" ")[1];

    // Set forward button to current month
    $('#forward-btn button').text($('#display-month').text());

    // If current month = Jan
    // Change to Dec
    if (month_id < 0) {
        month_id = 11;
        display_year = parseInt(display_year) - 1;
        $('#display-year').text(display_year);
    }

    var previousmonth = month_id - 1;

    // Calculate new previous month
    if (previousmonth < 0) {
        previousmonth = 11;
    }

    $('#back-btn button').text(months[previousmonth]);

    $('#display-month').text(months[month_id]);

    // Display updated calendar view
    getEventDates(month_id,display_year);
});

/**
 * Click Listener for Forward Navigation
 * Change calendar to display next month
 */
$('#change-forward').click(function() {

    var month_id = months.indexOf($('.date-picker').val().split(" ")[0]) - 1;

    var display_year = $('.date-picker').val().split(" ")[1];

    // Change back button to current month
    $('#back-btn button').text($('#display-month').text());

    // If current month = Dec
    // Change to Jan
    if (month_id > 11) {
        month_id = 0;
        display_year = parseInt(display_year) + 1;
        $('#display-year').text(display_year);
    }

    var nextmonth = month_id + 1;

    // Calculate next month
    if (nextmonth > 11) {
        nextmonth = 0;
    }

    $('#forward-btn button').text(months[nextmonth]);

    $('#display-month').text(months[month_id]);

    // Display updated calendar view
    getEventDates(month_id,display_year);
});
    

$(function() {
    $('.date-picker').datepicker(
    {
        dateFormat: "MM yy",
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        onClose: function(dateText, inst){
            var m = Math.abs($("#ui-datepicker-div .ui-datepicker-month :selected").val()) + 1;
            console.log(m);
            var y = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate',new Date(y,m,null));
            $(this).datepicker('refresh');

            if (m == 12) {
                $('#forward-btn button').text(months[0]);
            }
            else {
                $('#forward-btn button').text(months[m]);
            }

            if (m == 1) {
                $('#back-btn button').text(months[11]);
            }
            else {
                $('#back-btn button').text(months[m-2]);
            }            

            getEventDates(m-1,y);
        }
    });
})