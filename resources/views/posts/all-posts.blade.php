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




<ul>
    @foreach ($videos as $video)
        {{-- <li>{{ $video->video }}</li>  --}}
        {{-- <li>   <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4"></li> --}}
            <div class="container bg-dark" style="width: 50%">
                <li class="row text-center d-flex align-items-center">
                    <video width="740" height="460" class="" style="" controls>
                        <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
                        Votre navigateur ne supporte pas la lecture de vidéos.
                    </video>
                    <hr>
                    <button type="button" class="btn btn-light w-50 rounded-0" style="color:#444D57">
                        J'aime<i class="bi bi-eye-fill"></i> 
                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox="0 0 24 24"><title>thumb_up_2_line</title><g id="thumb_up_2_line" fill='none' fill-rule='evenodd'><path d='M24 0v24H0V0h24ZM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01-.184-.092Z'/><path fill='#5E5E5EFF' d='M9.821 3.212c.296-.69 1.06-1.316 2.024-1.13 1.474.283 3.039 1.401 3.149 3.214L15 5.5V8h2.405a4 4 0 0 1 3.966 4.522l-.03.194-.91 5a4 4 0 0 1-3.736 3.28l-.199.004H6a3 3 0 0 1-2.995-2.824L3 18v-6a3 3 0 0 1 2.824-2.995L6 9h1.34l2.481-5.788ZM7 11H6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h1v-8Zm4.625-6.92-2.544 5.937a1 1 0 0 0-.072.259L9 10.41V19h7.496a2 2 0 0 0 1.933-1.486l.035-.156.91-5a2 2 0 0 0-1.82-2.353L17.405 10H15a2 2 0 0 1-1.995-1.85L13 8V5.5c0-.553-.434-1.116-1.205-1.37l-.17-.05Z'/></g></svg>
                    <button type="button" class="btn btn-light w-50 rounded-0" style="color:#5E5E5E">
                        Commenter<i class="bi bi-eye-fill"></i> 
                        <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox="0 0 24 24"><title>message_1_line</title><g id="message_1_line" fill='none' fill-rule='nonzero'><path d='M24 0v24H0V0h24ZM12.593 23.258l-.011.002-.071.035-.02.004-.014-.004-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01-.017.428.005.02.01.013.104.074.015.004.012-.004.104-.074.012-.016.004-.017-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113-.013.002-.185.093-.01.01-.003.011.018.43.005.012.008.007.201.093c.012.004.023 0 .029-.008l.004-.014-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014-.034.614c0 .012.007.02.017.024l.015-.002.201-.093.01-.008.004-.011.017-.43-.003-.012-.01-.01-.184-.092Z'/><path fill='#5E5E5EFF' d='M19 3a3 3 0 0 1 2.995 2.824L22 6v10a3 3 0 0 1-2.824 2.995L19 19h-3.697l-2.61 1.74a1.25 1.25 0 0 1-1.257.075l-.13-.075L8.698 19H5a3 3 0 0 1-2.995-2.824L2 16V6a3 3 0 0 1 2.824-2.995L5 3h14Zm0 2H5a1 1 0 0 0-.993.883L4 6v10a1 1 0 0 0 .883.993L5 17h3.697a2 2 0 0 1 .965.248l.145.088L12 18.798l2.193-1.462a2 2 0 0 1 .941-.329l.169-.007H19a1 1 0 0 0 .993-.883L20 16V6a1 1 0 0 0-.883-.993L19 5ZM8.5 10a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm7 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z'/></g></svg>
                    </button>
                </li>
            </div>
           
    @endforeach
</ul>

@endsection



