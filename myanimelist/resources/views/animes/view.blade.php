@extends('layouts.app')

@section('title', 'MyAnimeList')

@section('content')
<div class="flex justify-center font-mono">

        
        <div class="max-w-3xl w-full lg:flex border-2 border-gray-50 p-6 rounded-lg">
            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden">
                <img src="{{ asset('images/' . $data->file_path) }}">
            </div>
            <div class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
              <div class="mb-8">
                <p class="text-sm text-grey-dark flex items-center">
                    Score - {{ $data->score }}
                  </p>
                <div class="text-black font-bold text-xl mb-2">{{$data->title}}</div>
                <p class="text-grey-darker text-base">{{$data->body}}</p>
              </div>
              <a href="{{ URL::previous() }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 w-16 rounded focus:outline-none focus:shadow-outline" type="submit">
                Back
            </a>
            </div>

          </div>
        
           
</div>
@endsection