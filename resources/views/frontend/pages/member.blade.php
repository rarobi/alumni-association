@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <h4 class="text-info m-t-125">CSTE MEMBERS</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner Area End ***** -->

    <section class="single_blog_area p-t-70">
        <div class="row">
            <div class="col-sm-4 offset-8">
                <!-- Search form -->
                {!! Form::open(['url'=>'/member/search','method'=>'GET']) !!}
                <div class="row">
                    <div class="col-sm-8">
                        <input class="form-control my-0 py-1 red-border" name="skill" type="text" placeholder="Search by skill [Ex. php]" aria-label="Search">
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-sm btn-success"><i class="icon-search"></i>Search</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div><br>
        <div class="container">
            <div class="row">
                @foreach($batches as $batch)
                <div class="col-sm-4 m-b-15">
                    <div class="center member-box">
                        <a href="{{ url('/alumni-list', $batch->id) }}">
                            <div class="img-thumbnail image" >
                                <h4 class="text-center">{!! $batch->name !!} </h4>
                                <img class="album-img" width="100%" src="{{asset('frontend/img/bg-img/convocation.jpg')}}" alt="">
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row m-b-20">
                <div>
                    {!! $batches->render() !!}
                </div>
            </div>
        </div>
    </section>

@endsection