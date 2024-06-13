<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHeroResquest;

class HeroController extends Controller
{
    public function index()
    {
        $heros = Hero::all();
        return view('hero.index', compact('heros'));
    }

    public function create()
    {
        $skills = Skill::all();
        return view('hero.create', compact('skills'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg, JPG',
            'gender' => 'required',
            'race' => 'required',
            'content' => 'required',
            'skill_id' => 'required',
        ]);

        $filename = "";
        if (
            $request->hasFile('image')
        ) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"   
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"   
            $extension = $request->file('image')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg"   
            $filename = $filenameWithExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin /storage/app   
            $request->file('image')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }

        Hero::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'race' => $request->race,
            'image' => $filename,
            'skill_id' => $request->skill_id,
            'content' => $request->content
        ]);

        return redirect()->route('hero.index')
            ->with('success', 'Héro crée avec succès!');
    }

    public function show(Hero $hero)
    {
        return view('hero.show', compact('hero'));
    }

    public function edit(Hero $hero)
    {
        $skills = Skill::all();
        return view('hero.edit', compact('hero', 'skills'));
    }

    public function update(Request $request, Hero $hero)
    {

        $request->validate([
            'name' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg, JPG',
            'gender' => 'required',
            'race' => 'required',
            'content' => 'required',
            'skill_id' => 'required',
        ]);

        $filename = "";
        if (
            $request->hasFile('image')
        ) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"   
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filenameWithExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"   
            $extension = $request->file('image')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $filename :"jeanmiche_20220422.jpg"   
            $filename = $filenameWithExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin /storage/app   
            $request->file('image')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }

        $hero->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'race' => $request->race,
            'image' => $filename,
            'skill_id' => $request->skill_id,
            'content' => $request->content
        ]);

        return redirect()->route('heros.show', $hero)
            ->with('success', 'Héro modifié avec succès!');
    }

    public function destroy(Hero $hero)
    {
        $hero = Hero::findOrFail($hero);
        $hero->delete();

        return redirect()->route('hero.index')
            ->with('success', 'Héro supprimé avec succès!');
    }
}
