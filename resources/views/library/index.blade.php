@extends('layouts.library_formet')

@section('content')
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{url('library')}}">library </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        <li class="nav-item dropdown">

                            <div class="dropdown">
                                <button class="btn btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  {{-- @if (!Session::get(Auth::user()->name))
                                  {{ Guest}}
                                  @else
                                  {{ Auth::user()->name}}
                                  @endif --}}
                                    {{--   --}}
                                    {{-- {{ Auth::user()->name }} --}}

                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>



                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdowns">

                            </div>
                        </li>
                        {{-- @endguest --}}
                    </ul>
                    {{-- </ul> --}}
                </div>
            </div>
        </nav>
        <div>
            <h1> library box </h1>
        </div>
        <div class="row mt-5" style="display: flex;">
            {{-- <div class="col-8"> --}}
            @foreach ($data as $item)
                <a href="{{ url('view/details') }}/{{ $item->id }}" style="text-decoration: unset; color:black;">
                    <div class="card mx-2 mt-5  " style="width: 12rem; ">
               <img src="{{ asset('images') }}/{{$item->img}}" class="" style="height: ;" alt="...">
               {{-- <img src="{{ asset('img/teal-and-orange-fantasy-book-cover-design-template-056106feb952bdfb7bfd16b4f9325c11.jpg') }}" class="" style="height: ;" alt="..."> --}}
                        {{-- <img src="" --}}
                            {{-- class="" alt="..."> --}}
                        <div class="card-body " >
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text "><span style="font-size:80%;font-weight:1000; ">description::
                                </span><br>
                                {{ $item->description }}</p>
                            @forelse ($item->relate as $auther)
                                <h6 class="card-title"><span style="font-size:80%;font-weight:1000; ">Author::
                                    </span>{{ $auther->name }}</h6>
                            @empty
                                <span style="font-size:80%;font-weight:1000;">Author:: </span>
                                <li>no data</li>
                            @endforelse
                            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
        {{-- </div> --}}
    </div>

  @endsection
