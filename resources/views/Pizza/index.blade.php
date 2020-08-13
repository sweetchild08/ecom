@extends('bubbly.master')
        
        @section('content')
        
                            <div class="col-md-6 offset-md-3 mr-auto ml-auto">
                                <div class="card">
                                    <div class="card-header">
                                       Pizza List
                                    </div>
                                    <div class="card-body card-block">
                                    <div id="demo" class="carousel slide" data-ride="carousel">

                                        <!-- Indicators -->
                                        <ul class="carousel-indicators">
                                        @foreach($pizzas as $pizza)
                                            @if($loop->first)
                                                <li data-target="#demo" data-slide-to="{{ $loop->index }}" class="active"></li>
                                            @else
                                                <li data-target="#demo" data-slide-to="{{ $loop->index }}"></li>
                                            @endif
                                        @endforeach
                                        </ul>
                                        
                                        
                                        <!-- The slideshow -->
                                        <div class="carousel-inner">
                                            @foreach($pizzas as $pizza)
                                                @if($loop->first)
                                                    <div class="carousel-item active">
                                                @else
                                                    <div class="carousel-item">
                                                @endif
                                                        <img src="/images/la.jpg" alt="pic">
                                                        <div class="carousel-caption">
                                                            <h3>{{ $pizza->name }}</h3>
                                                            <p>{{ $pizza->base }} - {{ $pizza->type }} - {{ $pizza->name }}</p>
                                                            <a href="{{ url('pizza').'/'.$pizza->id.'/edit' }}">View</a>
                                                        </div>
                                                    </div>

                                            @endforeach
                                        </div>

                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#demo" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                        </a>    
                                        </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                       
                                    </div>
                                </div>
                            </div>
        @endsection
    
