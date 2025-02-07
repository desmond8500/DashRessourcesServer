<?php

namespace App\Livewire\Pages;

use App\Models\Ressource;
use App\Models\Type;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class RessourcesPage extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search;
    public $selected;
    public $name, $lien, $description, $logo;

    public function render()
    {
        return view('livewire.pages.ressources-page', [
            'ressources' => Ressource::paginate(20),
            'types' => Type::paginate(20),
        ]);
    }

    function store()
    {
        $ressource = Ressource::create([
            'name' => $this->name,
            'lien' => $this->lien,
            'description' => $this->description,
            // 'logo' => $this->logo,
        ]);

        $dir = "ressources/$ressource->id/logo";

        if ($this->logo) {
            $name = $this->logo->getClientOriginalName();
            $this->logo->storeAS("public/$dir", $name);
            $ressource->logo = "storage/$dir/$name";
            $ressource->save();
        }

        $this->reset();
        $this->dispatch('close-addRessource');
    }

    function delete($id)
    {
        $ressource = Ressource::find($id);

        // if ($ressource) {
        //     Ressource::destroy($id);
        // } else {
            $this->modal_type = "warning";
            $this->modal_title = "Information";
            $this->modal_description = "La ressource n'existe pas";
            $this->dispatch('open-infoModal');
        // }
    }

    // Types

    public $type_name;
    public $description_name;

    function create_type(){
        Type::create([
            'name' => $this->type_name,
            'description' => $this->type_description,
        ]);
    }

    function delete_type($id){
        $type = Type::find($id);

        // if ($type) {
        //     $type->delete();
        // } else {
            $this->modal_type = "success";
            $this->modal_title = "Information";
            $this->modal_description = "La ressource n'existe pas";
            $this->dispatch('open-infoModal');
        // }

    }


    // Info Modal
    public $modal_type = "success";
    public $modal_title = "Information";
    public $modal_description = "Information";

    function info_modal(){
        $this->dispatch('open-infoModal');
        $this->modal_type = "success";
        $this->modal_title = "Information";
        $this->modal_description = "Ressource ajoutée avec succès";
    }

}
