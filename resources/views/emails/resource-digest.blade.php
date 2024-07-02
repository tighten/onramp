<!DOCTYPE html>
<html>

    <head>
        <title>Monthly Resource Digest</title>
    </head>

    <body>
        <h1>Monthly Resource Digest</h1>
        <p>Here are the resources created in the last 30 days:</p>
        <ul>
            @foreach ($data as $resource)
                <li>{{ $resource['title'] }} - {{ $resource['created_at'] }}</li>
            @endforeach
        </ul>
    </body>

</html>
