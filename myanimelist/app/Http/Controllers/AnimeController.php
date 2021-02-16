<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AnimeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $data = Anime::where('user_id', $user->id)->paginate(5);
        //dd($data);
        return view('animes.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('animes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // validating
        $this->validate($request, [
            'title' => 'required|max:255',
            'score' => 'required',
            'body' => 'required',
            'file_path' => 'mimes:jpeg,png',
        ]);

        $getPicture = $request->file('picture');
        $filename = $getPicture->getClientOriginalName();
        $getPicture->move('images/', $filename);
        // add anime to db
        $request->user()->anime()->create([
            'title' => $request->title,
            'score' => $request->score,
            'status' => $request->status,
            'body' => $request->body,
            'file_path' => $filename,
        ]);

        return redirect()->route('anime.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anime = Anime::where('id', $id)->first();
        //dd($anime);
        return view('animes.view', ['data' => $anime]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Anime $anime)
    {
        $this->authorize('edit', $anime);
        return view('animes.edit', ['data' => $anime]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $anime = Anime::where('id', $id)->first();
        // check if new image uploaded
        if($request->hasFile('picture'))
        {
            $file_path = base_path().'/public/images/'.$anime->file_path;
            unlink($file_path);
            $getFile = $request->file('picture');
            $filename = $getFile->getClientOriginalName();
            $getFile->move('images/', $filename);
        }
        else
            $filename = $anime->file_path;
        // Update
        Anime::where('id', $anime->id)->update([
            'title' => $request->title,
            'score' => $request->score,
            'status' => $request->status,
            'body' => $request->body,
            'file_path' => $filename,
        ]);

        return redirect()->route('anime.index')->with('SuccessEdit', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anime $anime)
    {
        $this->authorize('edit', $anime);
        $anime->delete();
        $file_path = base_path().'/public/images/'.$anime->file_path;
        unlink($file_path);
        return back()->with('SuccessDelete', 'Successfully deleted');
    }
}
