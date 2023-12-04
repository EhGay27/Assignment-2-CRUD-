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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    @if(session('error'))
    <div class="bg-red-200 p-4 rounded-md mb-4">
        {{ session('error') }}
    </div>
    @endif


    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6"></div>
            <h4>Update</h4>

            <form action="{{route('foodlist.update', $foodlist->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group my-2">
                    <input type="text" name="name" id="name" value="{{$foodlist->name}}" class="form-control" placeholder="Enter Name">
                    @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p><br>
                    @enderror
                </div>

                <div class="form-group my-2 ">
                    <input type="text" name="itemname" id="itemname" value="{{$foodlist->itemname}}" class="form-control" placeholder="Enter Item_Name">
                    @error('itemname')
                    <p class="text-red-500 text-sm">{{ $message }}</p><br>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <textarea type="text" name="description" id="description" rows="3" class="form-control" placeholder="Enter Description....">{{$foodlist->description}}</textarea>
                    @error('description')
                    <p class="text-red-500 text-sm">{{ $message }}</p><br>
                    @enderror
                </div>

                <div class="form-group my-2">
                    <input type="text" name="price" id="price" value="{{$foodlist->price}}" class="form-control" placeholder="Enter Price">
                    @error('price')
                    <p class="text-red-500 text-sm">{{ $message }}</p><br>
                    @enderror
                </div>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
            </form>


            <div class="col-md-3"></div>
        </div>
    </div>
    @endsection

</body>

</html>