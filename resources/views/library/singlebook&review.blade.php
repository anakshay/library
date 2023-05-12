<!doctype html>
<html lang="en">
  <head>
    <title>singlebook details</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container" >
        <div class="row mt-5">
            <div class="col d-flex justify-content-center">
                <div class="card" style="width: 60rem; ">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$singlebook->name}}</h5>
                      <p class="card-text"><span
                        style="font-size:80%;font-weight:1000; ">Description:: </span><br>{{$book_review->description}}</p>
                      @forelse($book_review->relate as $data)
                      <h6 class="card-title"><span
                        style="font-size:80%;font-weight:1000; ">Author:: </span>{{$data->name}}</h6>
                      @empty
                      <span
                      style="font-size:80%;font-weight:1000; ">Author:: </span> <li>not data</li>
                      @endforelse
                        <div class="right-side" style="float:right;">

                      @forelse($book_review->category as $data)
                      <h6 class="card-title"><span
                        style="font-size:80%;font-weight:1000; ">category::  </span>{{$data->name}}</h6>
                      @empty
                      <span
                      style="font-size:80%;font-weight:1000; ">category::  </span> <li>not data</li>
                      @endforelse
                      @forelse($book_review->generes as $data)
                      <h6 class="card-title"><span
                        style="font-size:80%;font-weight:1000; ">generes::   </span>{{$data->name}}</h6>
                      @empty
                      <span
                      style="font-size:80%;font-weight:1000; ">generes::  </span> <li>not data</li>
                      @endforelse
                    </div>

                      <a href="{{url('review')}}/{{$singlebook->id}}" style="text-decoration: none; color:green" class="">pleas enter the review</a>
                    </div>
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