<!doctype html>
<html lang="en">
  <head>
    <title>singlebook details</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

  <body>
      <div class="container" >
        <div class="row mt-5">
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 60rem; ">
                  <div class="iimg">

                    <img src="{{ asset('img/teal-and-orange-fantasy-book-cover-design-template-056106feb952bdfb7bfd16b4f9325c11.jpg') }}" class="" style="" alt="...">
                  </div>
                    <div class="card-body">
                      <h5 class="card-title">{{$singlebook->name}}</h5>
                      <p class="card-text"><span
                        style="font-size:80%;font-weight:1000; ">Description:: </span><br>{{$singlebook->description}}</p>
                      @forelse($singlebook->relate as $data)
                      <h6 class="card-title"><span
                        style="font-size:80%;font-weight:1000; ">Author:: </span>{{$data->name}}</h6>
                      @empty
                      <span
                      style="font-size:80%;font-weight:1000; ">Author:: </span> <li>not data</li>
                      @endforelse
                        <div class="right-side" style="float:right;">

                      @forelse($singlebook->category as $data)
                      <h6 class="card-title"><span
                        style="font-size:80%;font-weight:1000; ">category::  </span>{{$data->name}}</h6>
                      @empty
                      <span
                      style="font-size:80%;font-weight:1000; ">category::  </span> <li>not data</li>
                      @endforelse
                      @forelse($singlebook->generes as $data)
                      <h6 class="card-title"><span
                        style="font-size:80%;font-weight:1000; ">generes::   </span>{{$data->name}}</h6>
                      @empty
                      <span
                      style="font-size:80%;font-weight:1000; ">generes::  </span> <li>not data</li>
                      @endforelse
                    </div>
      

                      <a href="{{url('review')}}/{{$singlebook->id}}" style="text-decoration: none; color:green" class="">pleas enter the review</a>
                    </div>
                    

                    @foreach ($reviews as $item)
                    <br>
                    <span style="font-weight: 800;">  {{ $item->name }} </span>                   
                    {{ $item->comment }}
                    <br>
                    <div style="display: flex;">
                        @for ($i = 1; $i <= $item->rating; $i++)
                            @if ($i > 5)
                                @break(0);
                            @endif
                          <p>  <i class="bi bi-star-fill" style="color: @if ($item->rating < 3) yellow @else green @endif"></i></p>
                        @endfor
                        
                              </div>
                    @endforeach

  

                  
                   
                  </div>


            </div>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>