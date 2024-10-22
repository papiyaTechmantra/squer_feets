@extends('layout.app')
@section('content')

<section class="blog-detail-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-detail-content">
                    <h2 class="title1">{{ $Blog->title }}</h2>
                    <div class="date-time">
                        <span><iconify-icon icon="uil:clock"></iconify-icon>

                             {{date('d M, Y', strtotime($Blog->image))}}</span>
                    </div>
                    <div class="img">
                        <img src="{{ asset($Blog->image) }}" alt="">
                    </div>
                    
                    <div class="blog-text">
                        <p>{!! $Blog->discription !!}</p>
                    </div>

                    <div class="blog-social">
                        <ul class="list-unstyled p-0 m-0">
                            <li><a href=""><iconify-icon icon="gg:facebook"></iconify-icon>
                            </a></li>
                            <li><a href=""><iconify-icon icon="basil:twitter-outline"></iconify-icon>

                            </a></li>
                            <li><a href=""><iconify-icon icon="uil:instagram"></iconify-icon>

                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>

@endsection