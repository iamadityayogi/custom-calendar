<!doctype html>
<html lang="en">

<head>
    <title>jQuer Datepicker Demo</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body>

    <p>Select Date: <input type="text" id="datepicker"></p>

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $("#datepicker").datepicker();
        });

        // restrict user to choose previous date & future date
        // $("#datepicker").datepicker({
        //     minDate: 0, //restrict user to choose previous date
        //     maxDate: 0 //restrict user to choose future date
        // });

        // make an array of disable dates
        // var dates = ["01-06-2022", "15-06-2022", "30-06-2022"];
        // function disableDates(date) {
        //     var string = $.datepicker.formatDate('dd-mm-yy', date);
        //     return [dates.indexOf(string) == -1];
        // }
        // $("#datepicker").datepicker({
        //     beforeShowDay: disableDates
        // });


        //make an array of disable dates ranges
        var date_range = [
            ["2022-06-09", "2022-06-16"],
            ["2022-06-23", "2022-06-25"]
        ];
        console.log(date_range);

        function disableDates(date) {
            var string = $.datepicker.formatDate('yy-mm-dd', date);
            for (var i = 0; i < date_range.length; i++) {
                if (Array.isArray(date_range[i])) {
                    var from = new Date(date_range[i][0]);
                    var to = new Date(date_range[i][1]);
                    var current = new Date(string);
                    if (current >= from && current <= to) return false;
                }
            }
            return [date_range.indexOf(string) == -1]
        }
        $("#datepicker").datepicker({
            beforeShowDay: disableDates
        });
    </script>
</body>

</html>