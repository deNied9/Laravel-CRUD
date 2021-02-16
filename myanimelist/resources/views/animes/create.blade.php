@extends('layouts.app')

@section('title', 'MyAnimeList')

@section('content')
<div class="flex justify-center font-mono">
    <div class="w-4/12 border-2 border-gray-50 p-6 rounded-lg">
        <h1 class="text-2xl font-bold text-gray-700 mb-6">Add new anime!</h1>
        
            <form class="" action="{{ route('anime.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="mb-4">
                <label class="block text-gray-600 text-sm font-semibold mb-2 " for="title">
                  Anime Title
                </label>
                <input
                  name="title"
                  id="title"
                  type="text"
                  placeholder="Title"
                  class="bg-gray-100 appearance-none border rounded w-full py-2 px-3
                  text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('title') border-red-500 @enderror"
                />
                @error('title')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="flex items-center ">
                  <div class="flex flex-col mb-4">
                      <label class="block text-gray-600 text-sm font-semibold mb-2 " for="title">Score
                    </label> 
                    <input
                    name="score"
                    id="score"
                    type="number"
                    max="10"
                    min="0"
                    placeholder="0-10"
                    class="bg-gray-100 appearance-none border rounded w-20 py-2 px-3
                    text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('score') border-red-500 @enderror"
                    />
                    @error('score')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                  <div class="flex flex-col mb-4 ml-4">
                    <label class="block text-gray-600 text-sm font-semibold mb-2 " for="title">Status
                  </label> 
                  <select
                    name="status"
                    id="status"
                    class="bg-gray-100 border rounded w-30 py-2 px-3
                    text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('status') border-red-500 @enderror">
                    <option>Watching</option>
                    <option>Completed</option>
                    <option>On-Hold</option>
                    <option>Dropped</option>
                    <option>Plan to Watch</option>
                  </select>
                  @error('status')
                      <div class="text-red-500 mt-2 text-sm">
                          {{ $message }}
                      </div>
                  @enderror
              </div>
              </div>
              
              <div class="mb-4">
                <label
                  class="block text-gray-600 text-sm font-semibold mb-2"
                  for="body"
                >
                  Description
                </label>
                <textarea
                  rows="4"
                  cols="50"
                  name="body"
                  id="body"
                  type="text"
                  class="bg-gray-100 p-1 appearance-none border rounded w-full text-gray-700
                  focus:outline-none focus:shadow-outline @error('body') border-red-500 @enderror"
                ></textarea>
                @error('body')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-4">
                <label
                    class="block text-gray-600 text-sm font-semibold mb-2"
                    for="body">Upload image</label>
                <input type="file" name="picture" class="focus:outline-none focus:shadow-outline @error('picture') border-red-500 @enderror">
                @error('picture')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
              </div>
                  <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                  Create
                </button>
              </div>
            </form>

    </div>       
</div>
@endsection