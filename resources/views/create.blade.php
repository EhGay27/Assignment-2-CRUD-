<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CreateList</title>

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

<body class="antialiased">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>



    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6"></div>
            <h4>Create_Foodlist</h4>

            <form method="POST" action="/foodlist/create">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <input type="text" name="itemname" id="itemname" class="form-control" placeholder="Enter Item_Name">
                </div>

                <div class="form-group">
                    <textarea type="text" name="description" id="description" rows="3" class="form-control" placeholder="Enter Description...."></textarea>
                </div>

                <div class="form-group">
                    <input type="text" name="price" id="price" class="form-control" placeholder="Enter Price">
                </div>

                <div class="form-group">
                    <input type="submit" name="Upload File" id="file" class="form-control" placeholder="Choose File">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


            <div class="col-md-3"></div>
        </div>
    </div>

</body>

</html>