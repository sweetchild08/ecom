    @extends('layouts.app')
        @section('content')
        <div class="flex-center position-ref full-height">
          
            <div class="content">
                <div class="title m-b-md">
                    <div class="banner">
                        <span ccontenteditable="true" style="color:white;background-color:black">{{ config('app.name1', 'Laravel') }}
                            <span class="second">{{ config('app.name2', 'Laravel') }}</span>
                        </span>
                        <h3>Home of best Pizza</h3>
                        <div>
                            <p class="msg">{{ session('msg') }}</p>
                            <button class="btn btn-success" onclick="window.location.href='{{ route('order') }}'">Order a pizza</button>
                        </div>
                    </div>
                </div>

                <!-- <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div> -->
            </div>
        </div>
        @endsection
    
