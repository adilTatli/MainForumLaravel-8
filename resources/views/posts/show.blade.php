@extends('layouts.layout')

@section('title', 'Markedia - Marketing Blog Template :: Home' . $post->title)

@section('content')

    <div class="page-wrapper">
        <div class="blog-title-area">
            <ol class="breadcrumb hidden-xs-down">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('categories.single', ['slug' => $post->category->slug]) }}">{{ $post->category->title }}</a>
                </li>
                <li class="breadcrumb-item active">{{ $post->title }}</li>
            </ol>

            <span class="color-yellow"><a href="{{ route('categories.single', ['slug' => $post->category->slug]) }}"
                                          title="">{{ $post->category->title }}</a></span>

            <h3>{{ $post->title }}</h3>

            <div class="blog-meta big-meta">
                <small>{{ $post->getPostDate() }}</small>
                <small><a href="{{ route('author.post', $post->user->id) }}" title="">by {{ $post->user->name }}</a></small>
                <small><i class="fa fa-eye"></i> {{ $post->views }}</small>
            </div><!-- end meta -->

            <div class="post-sharing">
                <ul class="list-inline">
                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                class="down-mobile">Share on Facebook</span></a></li>
                    <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                class="down-mobile">Tweet on Twitter</span></a></li>
                    <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                </ul>
            </div><!-- end post-sharing -->
        </div><!-- end title -->

        <div class="single-post-media">
            <img src="{{ $post->getImage() }}" alt="" class="img-fluid">
        </div><!-- end media -->

        <div class="blog-content">
            {!! $post->content !!}
        </div><!-- end content -->

        <div class="blog-title-area">

            @if ($post->tags->count())
                <div class="tag-cloud-single">
                    <span>Tags</span>
                    @foreach($post->tags as $tag)
                    <small><a href="{{ route('tags.single' , ['slug' => $tag->slug]) }}" title="">{{ $tag->title }}</a></small>
                    @endforeach
                </div><!-- end meta -->
            @endif

        </div><!-- end title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="banner-spot clearfix">
                    <div class="banner-img">
                        <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                    </div><!-- end banner-img -->
                </div><!-- end banner -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="invis1">

        <div class="custombox clearfix">
            <h4 class="small-title">You may also like</h4>
            <div class="row">
                <div class="col-lg-6">
                    <div class="blog-box">
                        <div class="post-media">
                            <a href="marketing-single.html" title="">
                                <img src="upload/market_blog_02.jpg" alt="" class="img-fluid">
                                <div class="hovereffect">
                                    <span class=""></span>
                                </div><!-- end hover -->
                            </a>
                        </div><!-- end media -->
                        <div class="blog-meta">
                            <h4><a href="marketing-single.html" title="">We are guests of ABC Design Studio</a></h4>
                            <small><a href="blog-category-01.html" title="">Trends</a></small>
                            <small><a href="blog-category-01.html" title="">21 July, 2017</a></small>
                        </div><!-- end meta -->
                    </div><!-- end blog-box -->
                </div><!-- end col -->

                <div class="col-lg-6">
                    <div class="blog-box">
                        <div class="post-media">
                            <a href="marketing-single.html" title="">
                                <img src="upload/market_blog_03.jpg" alt="" class="img-fluid">
                                <div class="hovereffect">
                                    <span class=""></span>
                                </div><!-- end hover -->
                            </a>
                        </div><!-- end media -->
                        <div class="blog-meta">
                            <h4><a href="marketing-single.html" title="">Nostalgia at work with family</a></h4>
                            <small><a href="blog-category-01.html" title="">News</a></small>
                            <small><a href="blog-category-01.html" title="">20 July, 2017</a></small>
                        </div><!-- end meta -->
                    </div><!-- end blog-box -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end custom-box -->

        <hr class="invis1">

        <div class="custombox clearfix">
            <h4 class="small-title">{{ $post->comments->count() }} {{ Str::plural('Comment', $post->comments->count()) }}</h4>
            <div class="row">
                <div class="col-lg-12">
                    <div class="comments-list">

                        @include('partials.comments', ['comments' => $post->comments])

                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end custom-box -->

        <hr class="invis1">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="custombox clearfix">
            <h4 class="small-title">Leave a Reply</h4>
            <div class="row">
                <div class="col-lg-12">
                    @if(auth()->check())
                        <form class="form-wrapper" action="{{ route('comments.storeOrReply') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <textarea class="form-control" name="content" placeholder="Your comment"></textarea>
                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                        </form>
                    @else
                        <p>Please <a href="{{ route('login') }}">log in</a> to leave a comment.</p>
                    @endif
                </div>
            </div>
        </div>
    </div><!-- end page-wrapper -->

@endsection
