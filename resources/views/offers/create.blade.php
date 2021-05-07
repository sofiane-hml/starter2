<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        {{-- boutstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Create(test)
                </div>

                <form method="POST" action="{{url('offers\store')}}">
                    
                     @csrf   
                    {{-- <!-- <input name="_token" value="{{csrf_token()}}"> --> --}}

                    <div class="form-group">
                        <label for="exampleInputEmail">Offer Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter email">
                        @error('name')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    

                    <div class="form-group">
                        <label for="exampleInputEmail">Offer Price</label>
                        <input type="text" class="form-control" name="price" placeholder="Enter price">
                        @error('price')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                        </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Offer Details</label>
                        <input type="text" class="form-control" name="details" placeholder="Enter details">
                        @error('details')
                        <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                    </div>

                    <button type="submit" class="btn btn-dark">Send</button>

                </form>

            </div>
        </div>
    </body>
</html>
