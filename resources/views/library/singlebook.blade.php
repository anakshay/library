@extends('layouts.library_formet')

@section('content')
    <div class="container">

        <div class="row">

            <a href="{{ url('/library') }}" class="btn btn-dark">back</a>
            @if (Session::get('message'))
                <span style="color:red; font-size:100%; margin-left: 25%;">{{ Session::get('message')}}</span>
            @endif
        </div>
        <div class="row ">
            <div class="col d-flex justify-content-center ">
                <div class="card" style="width: 30rem; ">
                    {{-- <div class="iimg"> --}}
                        <img class="card-img-top" src="{{ asset('images') }}/{{$singlebook->img}}" class="" style="height: 20rem;" alt="...">
                        {{-- <img src="{{ asset('img/teal-and-orange-fantasy-book-cover-design-template-056106feb952bdfb7bfd16b4f9325c11.jpg') }}" --}}
                            {{-- class="" style="" alt="..."> --}}
                    {{-- </div> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $singlebook->name }}</h5>
                        <p class="card-text"><span style="font-size:80%;font-weight:1000; ">Description::
                            </span><br>{{ $singlebook->description }}</p>
                        @forelse($singlebook->relate as $data)
                            <h6 class="card-title"><span style="font-size:80%;font-weight:1000; ">Author::
                                </span>{{ $data->name }}</h6>
                        @empty
                            <span style="font-size:80%;font-weight:1000; ">Author:: </span>
                            <li>not data</li>
                        @endforelse
                        <div class="right-side" style="float:right;">

                            @forelse($singlebook->category as $data)
                                <h6 class="card-title"><span style="font-size:80%;font-weight:1000; ">category::
                                    </span>{{ $data->name }}</h6>
                            @empty
                                <span style="font-size:80%;font-weight:1000; ">category:: </span>
                                <li>not data</li>
                            @endforelse
                            @forelse($singlebook->generes as $data)
                                <h6 class="card-title"><span style="font-size:80%;font-weight:1000; ">generes::
                                    </span>{{ $data->name }}</h6>
                            @empty
                                <span style="font-size:80%;font-weight:1000; ">generes:: </span>
                                <li>not data</li>
                            @endforelse
                        </div>


                        <form action="{{ url('review') }}" method="GET" class="pt-4">
                            {!! method_field('post') !!}
                            {!! csrf_field() !!}
                            <input type="hidden" name="book_id" value="{{ $singlebook->id }}">
                            <button type="submit" class="mb-3" style="border: unset;   border-bottom:1px solid rgb(27, 227, 234);"> pleas
                                enter the review</button>
                        </form>
                    <div class="annual">
                        <p style="border-bottom:1px solid black ; font-weight:1000; ">overall rating :  <span>@if(isset($overall_data))
                            
                          {{ $overall_data}}
                          @else
                          {{0}}
                          @endif/5</span></p>
                    </div>
                    @foreach ($reviews as $item)
                        <br>
                        <span style="font-weight:800;"> {{ Auth::user()->name }} </span><br>
                        {{ $item->comment }}
                        <br>
                        <div style="display: flex;">
                            @for ($i = 1; $i <= $item->rating; $i++)
                                {{-- @if ($i > 5)
                                    @break(0);
                                @endif --}}
                                <p> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16"
                                        style="color: @if ($item->rating <= 3) green  @else yellow @endif">
                                        <path
                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />

                                    </svg>
                                </p>
                            @endfor

                        </div>
                        
                        
                        
                        
                        
                        
                        @endforeach
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
