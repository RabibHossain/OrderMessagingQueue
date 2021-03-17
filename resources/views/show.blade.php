<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNhE263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery3.2.1.slim.min.js" integrity="sha384KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <!-- Styles -->
</head>
<body>
<button name="button" id="button" value=' CLick me'>Click me</button>
<script>
    $(document).on('click', '#button', function () {

        retry(retryCount=1);

    });
    function retry( retryCount)
    {
        var successCount = 0;
        var errorCount = 0;
        // var retryCount = 5;
        $.ajax({
            url: 'http://127.0.0.1:8000/api',
            method: 'get',
            success: function (data) {
                return false;
            },
            error: function (err) {
                if (retryCount > 0) {
                    setTimeout(function () {
                        return retry(retryCount - 1);
                    }, 500);

                }
            },
        });
        console.log('Retry :'+ retryCount);
        // console.log('Success Ateempt:'+ successCount);

    }

</script>
</html>

<script>
    $(document).on('click', '#button', function () {

        retry(retryCount=1);

    });
    function retry( retryCount)
    {
        var successCount = 0;
        var errorCount = 0;
        // var retryCount = 5;
        $.ajax({
            url: 'http://127.0.0.1:8000/api',
            method: 'get',
            success: function (data) {
                return false;
            },
            error: function (err) {
                if (retryCount > 0) {
                    setTimeout(function () {
                        return retry(retryCount - 1);
                    }, 500);

                }
            },
        });
        console.log('Retry :'+ retryCount);
        // console.log('Success Ateempt:'+ successCount);

    }

</script>
