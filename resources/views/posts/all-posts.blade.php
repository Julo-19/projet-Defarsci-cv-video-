@extends('components.navbar')


@section('content')


<div class="m-5 row text-center d-flex align-items-center">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" overflow-hidden shadow-sm sm:rounded-lg">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary b-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Ajouter une video
            </button>
            
            <!-- Modal -->
            <div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Partage CV video</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <form action="{{ route('upload.video') }}" method="post" enctype="multipart/form-data">

                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Description de votre post</label>
                                        <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Choisissez une video</label>
                                        <input type="file" name="video">
                                    </div>
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Publier</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</div>  




@foreach ($videos as $video)
    <div class="container bg-dark" style="width: 50%">
        <div class="row text-center d-flex align-items-center">
            <video width="740" height="460" class="" style="" controls>
                <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
                Votre navigateur ne supporte pas la lecture de vidéos.
            </video>
            <hr>
            <button type="button" class="btn btn-light w-50 rounded-0" style="color:#444D57">
                @auth
                    <div class="d-inline" id="{{$video->id}}">
                        <span class='{{$video->likes->contains("user_id", auth()->id()) ? "text-danger" : "text-dark"}}' id="heart{{$video->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                            </svg>
                        </span>
                    </div>
                @else
                    <a href="/login" class="text-dark text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                        </svg>
                    </a>
                @endauth
                <p class="d-inline" id="count{{$video->id}}">Likes {{$video->likes->count()}}</p>
            </button>
            <button type="button" class="btn btn-light w-50 rounded-0" style="color:#5E5E5E">
                Commenter<i class="bi bi-eye-fill"></i> 
                <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox="0 0 24 24">
                    <title>message_1_line</title>
                    <!-- Votre code SVG ici -->
                </svg>
            </button>
        </div>
    </div>
@endforeach

<script>
    const token = document.querySelector('meta[name="csrf-token"]').content;
    let videos = document.querySelectorAll(".d-inline"); // Utilisez ".d-inline" ici

    videos.forEach(video => {
        document.getElementById(video.id).addEventListener("click", e => {
            fetch("/like", {
                headers: {
                    'X-Requested-with': 'XMLHttpRequest',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                method: 'post',
                body: JSON.stringify({
                    id: video.id
                })
            }).then(response => {
                response.json().then(data => {
                    let count = document.getElementById("count" + video.id)
                    count.innerHTML = " Likes" + data.count

                    let heart = document.getElementById("heart" + video.id)
                    heart.className = ""
                    heart.classList.add(data.color)
                })
            }).catch(error => {
                console.log(error);
            });
        })
    })
</script>







@endsection




