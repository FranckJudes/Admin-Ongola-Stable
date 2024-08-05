<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\suivie_livraison;

use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandeEnLivraisom = suivie_livraison::where('etat', '1')->with('commande')->orderBy('created_at', 'desc')->paginate(50);
        $commandeEnPreparation = suivie_livraison::where('etat', '2')->with('commande')->orderBy('created_at', 'desc')->paginate(50);
        $commandeLivree = suivie_livraison::where('etat', '3')->with('commande')->orderBy('created_at', 'desc')->paginate(50);
        $commandeEnAnnuler = suivie_livraison::where('etat', '4')->with('commande')->orderBy('created_at', 'desc')->paginate(50);
        return view('admin.commande', compact('commandeEnAnnuler','commandeLivree','commandeEnLivraisom','commandeEnPreparation'));
        // return view('admin.commande');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getCommandesByEtat()
    {

    }
    public function save_to_orders_for_delevery(Request $request)
    {



        try {
            $CommandeArray = explode(',', $request->commande_aux_livreurs); // Convertir la chaîne en tableau

            // Supprimer les éléments 'on' du tableau
            $CommandeArray = array_filter($CommandeArray, function($value) {
                return $value !== 'on';
            });


            if ($CommandeArray) {
                # code...
                foreach ($CommandeArray as  $s) {

                    $commande = Commande::find($s);
                    $commande->livreur_id = $request->livreurs;
                    $commande->save();
                    $g = suivie_livraison::where('id_commande',$commande->id)->first();
                    $g->etat ='1';
                    $g->save();

                }
            }
            toastr()->success('Data has been saved successfully!');
            return redirect()->back();

        } catch (\Throwable $th) {
            //dd($th->getMessage());
            toastr()->error('Erreur d\'Attribution!');
            return redirect()->back();

        }
    }

    public function view_detail_order($id){

        try {
            $commande = suivie_livraison::
            whereHas('commande', function($query) use ($id) {
                $query->where('id', $id);
            })
            ->with('commande','commande.receive_client','commande.partenaire','commande.livreurs','commande.produits')->first();

            // return $commande;
            return view('livreurs.detail_commande',['commande' => $commande]);

        } catch (\Throwable $th) {

        }

    }
}
