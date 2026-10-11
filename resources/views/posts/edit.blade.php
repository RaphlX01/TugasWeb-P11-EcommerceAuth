@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1 class="text-3xl font-bold text-slate-900 mb-6">Edit Post</h1>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-semibold mb-2">Judul</label>
                <input type="text" name="title" value="{{ old('title', $post->title) }}"
                       class="w-full border rounded-lg px-4 py-2 @error('title') border-red-500 @enderror">
                @error('title')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-2">Isi Post</label>
                <textarea name="body" rows="6"
                          class="w-full border rounded-lg px-4 py-2 @error('body') border-red-500 @enderror">{{ old('body', $post->body) }}</textarea>
                @error('body')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700">
                    Update
                </button>
                <a href="{{ route('posts.index') }}"
                   class="bg-slate-200 text-slate-700 px-6 py-2 rounded-lg hover:bg-slate-300">
                    Batal
                </a>
            </div>
        </form>
    </div>
@endsection