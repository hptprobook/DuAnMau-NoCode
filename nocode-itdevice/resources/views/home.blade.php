@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="home__sidebar">
                    <ul class="home__sidebar--list list-unstyled">
                        @foreach ($mainCats as $mainCat)
                            <li class="home__sidebar--item">
                                <a href="">
                                    {{ $mainCat->name }}
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>

                                <div class="home__sidebar--child">
                                    <div class="row">
                                        @foreach ($mainCat->categories as $category)
                                            <div class="col-custom">
                                                <div class="sidebar__child--list">
                                                    <h5><a href="" class="text-dark">{{ $category->name }}</a></h5>
                                                    <ul class="list-unstyled">
                                                        @foreach ($category->childCategories as $childCategory)
                                                            <li class="sidebar__child--item">
                                                                <a href="">{{ $childCategory->name }}</a>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>

            <div class="col-md-9">
                <div class="home__slider">

                </div>
            </div>

        </div>
    </div>
@endsection
