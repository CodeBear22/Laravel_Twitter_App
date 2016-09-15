<!DOCTYPE html>
<html>
    <head>
        <title>TwitterApp</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">

    </head>
<body>
    <div class="container-fluid">
        <button type="button" class="alert-info" onclick="refresh()">Refresh</button>
        <div class="col-lg-4">
            @foreach($tweets as $tweet)
                <tweet>
                    <h2>{{$tweet->user}}</h2>
                    <div class="alert-success ">{{$tweet->text}}</div>
                </tweet>
            @endforeach
        </div>
    </div>

    <script src="//code.jquery.com/jquery.js"></script>
    <script>
        function refresh()
        {
            $.ajax({
                url: "/check",
                success: function(result)
                {
                    if(result == 1)
                    {
                        alert("New tweets recieved ");
                        location.reload();
                    }
                    else
                    {
                        alert("No new tweet");
                    }
                }

            })
        }
    </script>
</body>

</html>