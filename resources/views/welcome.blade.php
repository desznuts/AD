<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Welcome to App Dev</h1>
    </header>
    <main>
        <p>App Dev</p>
        <form action="{{route('store')}}" method="post" >
            @csrf
            <label for="subject">Subject: </label>
            <input type="text" placeholder="CSC" name="subject">
            <label for="Section">Section: </label>
            <input type="text" placeholder="A" name="section">
            <label for="Description" placeholder="" name="description">
            <label for="Units">Units: </label>
            <input type="number" placeholder="1" name="units">
            <label for="day">Day: </label>
            <input type="number" placeholder="" name="day">
            <label for="Time">Time: </label>
            <input type="text" name="time">
            <button type="submit">Go</button>
        </form>

    <!-- @if (isset($fname))
        {{ $fname }} {{ $lname }}

    @endif -->

    </main>
</body>
</html>