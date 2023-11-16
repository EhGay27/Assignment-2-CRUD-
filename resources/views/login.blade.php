<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Foodlist</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            padding: 100px;
        }
    </style>
</head>

<body>

    <form method="POST" action="">
        <div class="form-group">
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name or Email">
        </div>

        <div class="form-group">
            <input type="text" name="password" id="password" class="form-control" placeholder="Enter Password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</body>

</html>