<div>
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-{{$columnas}} gap-6">
            @foreach ($posts as $post)
                <div class="shadow-xl rounded-xl">
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}">
                        <img class="rounded-lg" src="{{ asset('uploads') . '/' . $post->imagen }}"
                            alt="imagen del post {{ $post->titulo }}">
                    </a>
                    <div class="flex justify-center gap-5 px-4 pt-4">
                        <div class="flex gap-2">
                            <p class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>
                                {{ $post->likes->count() }}
                            </p>
                            <p class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                                </svg>
                                {{ $post->comentarios->count() }}
                            </p>
                        </div>
                        <p class="font-bold">
                            {{ $post->titulo }}
                        </p>
                    </div>
                    {{-- @if (!auth()->user->id === $post->user->id) --}}
                    <p class="text-center text-gray-500 text-sm pt-2">
                        publicado por {{ $post->user->username }}
                    </p>
                    {{-- @endif --}}
                </div>
            @endforeach
        </div>

        <div class="my-10">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    @else
        <p class="text-center text-gray-600">No hay Publicaciones, sigue a tus amigos!</p>
    @endif
</div>
