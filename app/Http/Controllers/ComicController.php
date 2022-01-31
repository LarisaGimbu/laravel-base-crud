<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::orderBy('id', 'desc')->paginate(4);

        return view ('comics.home', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationData(), $this->validationErrors());

        $data = $request->all();

        $new_comic = new Comic();
        $new_comic->fill($data);
        $new_comic->slug = $this->getUniqueSlug($new_comic->title);
        $new_comic->save();

        return redirect()->route('comics.show', $new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);

        return view ('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);

        return view ('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $request->validate($this->validationData(), $this->validationErrors());

        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');

        $comic->update($data);

        return redirect()-> route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()-> route('comics.index')->with('deleted', "Il fumetto $comic->title è stato eliminato");
    }

    private function getUniqueSlug($title)
    {
        $slug = Str::slug($title, '-');

        $existingCount = Comic::where('slug', 'like', $slug)->count();

        if($existingCount)
        {
          return $slug . '-' . ($existingCount);
        }else{
            return $slug;
        }

        
    }

    private function validationData(){
        return [
            'title'=>'required|max:50|min:2',
            'description'=>'required|min:5',
            'image'=>'required|max:250',
            'price'=>'required|numeric',
            'series'=>'max:50',
            'sale_date'=>'date',
            'type'=>'max:50',
        ];
    }

    private function validationErrors(){
        return [
            'title.required'=>'Il titolo è un campo obbligatiorio',
            'title.max'=>'Il titolo non può avere più di :max caratteri',
            'title.min'=>'Il titolo non può avere meno di :min caratteri',
            'description.required'=>'La descrizione è obbligatioria',
            'description.min'=>'La descrizione deve avere almeno :min caratteri',
            'image.required'=>'L\'immagine è obbligatoria',
            'price.required'=>'Il prezzo è obbligatorio',
            'price.numeric'=>'Il prezzo deve essere un numero',
            'series.max'=>'La serie non deve avere oltre :max caratteri',
            'sale_date.date'=>'Inserire una data',
            'type.max'=>'Inserire non oltre :max caratteri',
        ];
    }
}
