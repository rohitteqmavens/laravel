

<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('fea8bb5cfc56957f9a90', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('status-liked');
    channel.bind('status-liked', function(data) {
        alert(JSON.stringify(data));

    });







  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
</body>



