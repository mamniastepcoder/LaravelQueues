@extends('layouts.app')
@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
   <div class="container">
        <h1>Hello, {{ $data['name'] }}!</h1>
        <p>Thank you for contacting us. We will get back to you shortly.</p>
        <p><br>testing</p>
    </div>
@endsection
