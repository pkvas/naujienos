<x-base-layout>
    <main class="min-h-screen">
        <section class="container pt-24 mx-auto space-y-4">

            {{-- Header --}}
            <header class="w-full p-3 bg-gray-500 text-center">
                <h2 class="text-white">{{ $post->title }}</h2>
            </header>

            {{-- Livewire ShowPost --}}
            <div class="container">
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-8">
                        <div class="card col-6 mb-6 text-center">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-4 text-muted">{{ $post->updated_at->format("Y-m-d H:i") }}</h6>
                                <h5 class="card-title">{!! $post->meta !!}</h5>
                                <div class="card-text">{!! $post->content !!}</div>
                                @foreach($post->categories as $category)
                                    <span class="card-subtitle mb-2 text-muted">{{ $category->name }}</span>
                                @endforeach

                            </div>
                        </div>

                        <div class="col-6"></div>

                        <div class="card col-6 mt-6">
                            <div class="card-body">
                                <h6 class="card-title">Palikite komentarą</h6>
                                @if ($errors->any())

                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ url('comments') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="post_slug" value="{{ $post->slug }}">
                                    <input type="email" name="email" class="form-control mb-2" placeholder="El. pašto adresas">
                                    <textarea name="message" class="form-control" rows="2" required></textarea>
                                    <span>Iki 150 simboliu</span>
                                    <div class="justify-content-center text-center">
                                        <button type="submit" class="btn bg-primary btn-primary mt-3">Pateikti</button>
                                    </div>

                                </form>
                            </div>
                        </div>

                        <div class="col-6"></div>

                        <div class="card mt-2 col-6">
                            <div class="card-body">
                                @if(!$post->comments->isEmpty())
                                    @foreach($post->comments as $comment)
                                        <div class="detail-area mb-6">
                                            <h6 class="user-name mb-1">
                                                {{ $comment->email }}
                                            </h6>
                                            <small class="text-primary">{{ $comment->created_at->format('Y-m-d H:i') }}</small>
                                            <p class="user-comment mb-1 mt-2 font-bold">
                                                {{ $comment->content }}
                                            </p>
                                        </div>
                                    @endforeach
                                @else
                                    <h5>Nėra komentarų</h5>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-base-layout>
