<!doctype html>
<html lang="en">

<head>
    <title>
        my library</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div>
            <h1> libr</h1>
        </div>
        <div class="row mt-5" style="display: flex;">
            {{-- <div class="col-8"> --}}
            @foreach ($data as $item)
                <div class="card mx-3 " style="width: 18rem;">
                    {{-- <img src="{{ asset('img/teal-and-orange-fantasy-book-cover-design-template-056106feb952bdfb7bfd16b4f9325c11.jpg') }}" class="" style="height: ;" alt="..."> --}}
                    <img src="{{ asset('img/world_wildlife_book_cover_template_mountain_scene_species_silhouette_decor_6922327.jpg') }}"
                        class="" alt="...">
                    <a href="{{ url('view/details') }}/{{ $item->id }}"
                        style="text-decoration: unset; color:black;">
                        <div class="card-body">
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
                    </a>{{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
        </div>
        @endforeach

    </div>
    {{-- </div> --}}
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
