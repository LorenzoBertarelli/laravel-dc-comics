<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\comic;
use Illuminate\Support\Facades\Validator;


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|min:4|max:30',
        //     'thumb' => 'required',
        //     'price' => 'required|min:4|max:10',
        //     'series' => 'required|min:5|max:30',
        //     'sale_date' => 'required',
        //     'type' => 'required',
        // ]);
        $data = $this->validation($request->all());

        $comic = new Comic();
        $comic->fill($data);
        $comic->save();

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.edit', compact('comic'));
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
        // $request->validate([
        //     'title' => 'required|min:4|max:30',
        //     'thumb' => 'required',
        //     'price' => 'required|min:4|max:10',
        //     'series' => 'required|min:5|max:30',
        //     'sale_date' => 'required',
        //     'type' => 'required',
        // ]);
        $form_data = $this->validation($request->all());

        $form_data = $request->all();
        $comic = Comic::FindOrFail($id);
        $comic->update($form_data);
        return view('comics.show', compact('comic'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::FindOrFail($id);
        $comic->delete();
        return redirect()->route('comics.index');
    }

    private function validation($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|min:4|max:30',
            'thumb' => 'required',
            'price' => 'required|min:4|max:10',
            'series' => 'required|min:5|max:30',
            'sale_date' => 'required',
            'type' => 'required',
        ], [
            'title.required' => 'Il titolo deve essere inserito',
            'title.min' => 'Il titolo deve avere una lunghezza minima di almeno :min caratteri',
            'title.max' => 'Il titolo deve avere una lunghezza massima di almeno :max caratteri',
            'thumb.required' => "L'immagine deve essere inserita",
            'price.required' => "Il prezzo deve essere inserito",
            'price.min' => 'Il prezzo deve avere una lunghezza minima di almeno :min caratteri compreso di ,00',
            'price.max' => 'Il prezzo deve avere una lunghezza massima di almeno :max caratteri compreso di ,00',
            'series.required' => "La serie deve essere inserita",
            'series.min' => 'La serie deve avere una lunghezza minima di almeno :min caratteri',
            'series.max' => 'La serie deve avere una lunghezza massima di almeno :max caratteri',
            'sale_date.required' => "La data deve essere inserita",
            'type.required' => "La tipologia deve essere inserita",
        ]);
        $validated_data = $validator->validate();
        return $validated_data;
    }
}
