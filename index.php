<!DOCTYPE html>
<html>
<head>
    <title>Webslesson Tutorial | Auto Load More Data on Page Scroll with Jquery & PHP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

    <div class="container">

        <h2 align="center">InfiniteScroll with Jquery & PHP</a></h2>
        <br />
        <br />
    </div>
    <div id="load_data"></div>
    <div id="load_data_message"></div>
</body>
<script>
    $(document).ready(function() {
        var limit = 10;
        var start = 0;
        var action = 'inactive';

        function load_data(limit, start) {
            $.ajax({
                url: "fetch.php",
                method: "POST",
                data: {
                    limit: limit,
                    start: start
                },
                cache: false,
                success: function(data) {
                    $('#load_data').append(data);
                    if (data == '') {
                        $('#load_data_message').html("<button type='button' class='btn btn-info'>No Data Found</button>");
                        action = 'active';
                    } else {
                        $('#load_data_message').html("<center><img src='images/loading.gif' /></center>");
                        action = "inactive";
                    }
                }
            });
        }
        if (action == 'inactive') {
            action = 'active';
            load_data(limit, start);
        }
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive') {
                action = 'active';
                start = start + limit;
                setTimeout(function() {
                    load_data(limit, start);
                }, 1000);
            }
        });
    });
</script>

</html>