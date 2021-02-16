@extends('layouts.app')

@section('title', 'MyAnimeList')

@section('content')
<h1 class="text-2xl font-bold text-gray-700 mb-6 flex justify-center">
    My anime list
</h1>
    @if(session('SuccessDelete'))
    <div class="flex bg-green-200 p-4">
        <div class="flex justify-center w-full">
          <div class="text-green-600">
            <p class="mb-2 font-bold">
                <a href="{{ route('anime.index') }}">{{session('SuccessDelete')}}</a>
            </p>
          </div>
        </div>
      </div>
    @endif
    @if(session('SuccessEdit'))
    <div class="flex bg-green-200 p-4">
        <div class="flex justify-center w-full">
          <div class="text-green-600">
            <p class="mb-2 font-bold">
                <a href="{{ route('anime.index') }}">{{session('SuccessEdit')}}</a>
            </p>
          </div>
        </div>
      </div>
    @endif
    <div class="flex justify-center font-mono">
        <div class="w-10/12 border-2 border-gray-50 p-6 rounded-lg flex justify-center">

            <table class="w-10/12 text-md bg-white shadow-md rounded mb-4 flex-col">
                <tbody>
                    <tr class="border-b">
                        <th class="text-left p-3 px-5">#</th>
                        <th class="text-left p-3 px-5">Image</th>
                        <th class="text-left p-3 px-5">Title</th>
                        <th class="text-left p-3 px-5">Score</th>
                        <th class="text-left p-3 px-5">Status</th>
                        <th class="text-left p-3 px-5">Action</th>
                    </tr>
                    @auth

                            @foreach ($data as $key=>$value)
                            <tr class="border-b hover:bg-orange-100 bg-gray-100">
                                <td class="p-3 px-5">{{$key+1}}</td>
                                <td class="p-3 px-5 ">
                                    <a href="{{ route('anime.show', $value->id) }}">
                                        <img src="{{ asset('images/' . $value->file_path) }}" width="50px" height="50px" alt="">
                                    </a>                         
                                </td>
                                <td class="p-3 px-5">{{$value->title}}</td>
                                <td class="p-3 px-5">{{$value->score}}</td>
                                <td class="p-3 px-5">{{$value->status}}</td>
                                <td class="p-3 px-5 ">
                                    <form action="{{ route('anime.edit', $value ) }}" method="get" style="display: inline;" >
                                        @csrf
                                        <button type="submit"
                                        class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2
                                        rounded focus:outline-none focus:shadow-outline">Edit</button>
                                    </form>
                                    <form action="{{ route('anime.destroy', $value) }}" method="post" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit"
                                            class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded
                                            focus:outline-none focus:shadow-outline">Delete
                                            </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    @endauth
                                        
                </tbody>
            </table>   
        </div>
        
    </div>
    <div class="flex justify-center">
        <div class="w-8/12">
                {{$data->links()}}
            </div> 
        </div>
    </div>
    
@endsection
