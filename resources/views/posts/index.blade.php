@extends('layouts.app')

@section('title', 'Daftar Post')

@section('content')
    <h1 class="text-3xl font-bold text-slate-900 mb-6">Daftar Post</h1>

    @if ($posts->isEmpty())
        <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-800 p-4 rounded">
            Belum ada post. Klik "Tambah Post" untuk mulai.
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-bold text-slate-800 mb-2 pb-2 border-b">
                        {{ $post->title }}
                    </h3>
                    <p class="text-sm text-slate-500 mb-2">
                        Oleh: {{ $post->user->name ?? 'Anonim' }}
                    </p>
                    <p class="text-slate-700 mb-4">
                        {{ Str::limit($post->body, 120) }}
                    </p>

                    <div class="flex gap-2">
                        <a href="{{ route('posts.show', $post) }}"
                           class="text-sm text-blue-600 hover:underline">Lihat</a>

                        @can('update', $post)
                            <a href="{{ route('posts.edit', $post) }}"
                               class="text-sm text-yellow-600 hover:underline">Edit</a>
                        @endcan

                        @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                  onsubmit="return confirm('Yakin hapus?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-600 hover:underline">
                                    Hapus
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $posts->links() }}
        </div>
    @endif
@endsection