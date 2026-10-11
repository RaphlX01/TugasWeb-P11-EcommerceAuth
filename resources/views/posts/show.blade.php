@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="mb-6">
        <a href="{{ route('posts.index') }}" class="text-red-600 hover:underline">
            ← Kembali ke Daftar
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-3xl font-bold text-slate-900 mb-2">{{ $post->title }}</h1>
        <p class="text-sm text-slate-500 mb-6">
            Oleh: {{ $post->user->name ?? 'Anonim' }} ·
            {{ $post->created_at->format('d M Y, H:i') }}
        </p>

        <div class="text-slate-700 whitespace-pre-line leading-relaxed">
            {{ $post->body }}
        </div>

        <div class="mt-8 pt-4 border-t flex gap-2">
            @can('update', $post)
                <a href="{{ route('posts.edit', $post) }}"
                   class="bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600">
                    Edit
                </a>
            @endcan

            @can('delete', $post)
                <form action="{{ route('posts.destroy', $post) }}" method="POST"
                      onsubmit="return confirm('Yakin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">
                        Hapus
                    </button>
                </form>
            @endcan
        </div>
    </div>
@endsection