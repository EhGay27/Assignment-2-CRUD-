<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FoodList</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite('resources/css/app.css')

    <style>
        body {
            padding: 100px;

        }
    </style>

</head>

@extends('layouts.food')
@section('content')

<body class="antialiased">
    @if(session('success'))
    <div class="bg-green-200 p-4 rounded-md mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="flex font-sans">
        <div class="flex-none w-48 relative">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h1 class="p-2">Food_List</h1>



                        <a href="{{ url ('/foodlist/create')}}">
                            <button class="btn btn-primary btn-sm float-right mb-2"> <i class="fa-solid fa-circle-plus fa-2xs"></i>Add Product</button>
                        </a>


                        <table class="table table-bordered table-hover text-center ">
                            <thead>

                                <tr>
                                    <th>Name</th>
                                    <th>Item_Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($Foodlists as $foodlist)
                                <tr>
                                    <td>{{$foodlist->name}}</td>
                                    <td>{{$foodlist->itemname}}</td>
                                    <td>{{$foodlist->description}}</td>
                                    <td>{{$foodlist->price}}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="/foodlist/{{$foodlist->id}}/edit">
                                                <button type="button" class="bg-green-400 text-white px-3 py-1 rounded hover:bg-green-400">Edit</button>
                                            </a>

                                            <form action="/foodlist/{{$foodlist->id}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-500" type="submit">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>



                </div>
                @endsection

</body>

</html>