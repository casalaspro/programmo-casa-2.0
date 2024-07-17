<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use Illuminate\Http\Request;

class SponsorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsorships = Sponsorship::all();

        return view('admin.sponsorships.index', compact('sponsorships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sponsorships.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'duration'=>'required',  
        ]);

        // recupero i dati dalla richiesta
        $form_data = $request->all();

        // dico di creare nel db un nuovo record prendendi i dati per la creazione da $form_data
        $new_sponsorship = Sponsorship::create($form_data);

        // dico una volta creato il record di ridirigerlo alla show
        return to_route('admin.sponsorships.show', $new_sponsorship);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sponsorship $sponsorship)
    {
        return view('admin.sponsorships.show', compact('sponsorship'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sponsorship $sponsorship)
    {
        return view('admin.sponsorships.edit', compact('sponsorship'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sponsorship $sponsorship)
    {

        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'duration'=>'required',  
        ]);

        // recupero i dati dalla richiesta
        $form_data = $request->all();

        // faccio un update dei dati modificati
        $sponsorship->update($form_data);

        // dico una volta creato il record di ridirigerlo alla show
        return to_route('admin.sponsorships.show', $sponsorship);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sponsorship $sponsorship)
    {
        // implemento la funzione di delete
        $sponsorship->delete();

        // dico di ridirigermi alla index
        return to_route('admin.sponsorships.index');
    }
}
