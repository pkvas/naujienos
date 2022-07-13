<x-base-layout>
    <main class="min-h-screen">
        <section class="container pt-24 mx-auto space-y-4">

            <header class="w-full p-3 bg-gray-500">
                <h2 class="text-white">Naujienos</h2>
            </header>

                <div class="container">
                    <div class="row ">

                                @foreach($posts as $post)
                                    <div class="col-3 mb-3">
                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">{{ $post->updated_at->format("Y-m-d H:i") }}</h6>
                                                <p class="card-text">{{ strip_tags($post->meta) }}</p>
                                                <div>
                                                    @foreach($post->categories as $category)
                                                        <span class="card-subtitle mb-2 text-muted">{{ $category->name }}</span>
                                                    @endforeach
                                                </div>
                                                <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-primary btn-sm">Skaityti</a>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                    </div>
                </div>


        </section>
    </main>
</x-base-layout>
