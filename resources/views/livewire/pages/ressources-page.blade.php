<div>

    <div class="row g-2">
        <div class="col">
            <div class="input-icon">
                <input type="text" class="form-control form-control-rounded" wire:model.live="search" placeholder="Chercher une ressource...">
                <span class="input-icon-addon">
                    <i class="ti ti-search"></i>
                </span>
            </div>
        </div>
        <div class="col-auto">
            <button class='btn btn-primary' wire:click="$dispatch('open-addRessource')"><i class='ti ti-plus'></i>
                Ressource
            </button>
        </div>

        <div class="w-100"></div>

        <div class="col-md-8">
            <div class="row g-2">
                @foreach ($ressources as $ressource)
                    <div class="col-md-6">
                        @if ($selected == $ressource->id)


                        @else
                            <div class="card p-2 ">
                                <div class="row g-2">
                                    <div class="col-auto">
                                        <img src="{{ asset($ressource->logo) }}" alt="L" class="avatar">
                                    </div>
                                    <div class="col">
                                        <div class="fw-bold">{{ $ressource->name }}</div>
                                        <div class="text-muted">{{ $ressource->description }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-primary btn-icon" >
                                            <i class="ti ti-eye"></i>
                                        </button>
                                        <button class="btn btn-primary btn-icon" wire:click="edit({{ $ressource->id }})">
                                            <i class="ti ti-edit"></i>
                                        </button>
                                        <button class="btn btn-danger btn-icon" wire:click="delete({{ $ressource->id }})">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary" >
                <i class="ti ti-plus"></i>
                Tag
            </button>

            @foreach ($types as $type)
                <div class="card p-2">
                    <div class="row">
                        <div class="col-auto">
                            <img src="" alt="A" class="avatar avatar-md">
                        </div>
                        <div class="col">
                            <div class="card-title">Titre</div>
                            <div class="text-muted">Description</div>
                        </div>
                        <div class="col-auto">
                          <button class="btn btn-outline-primary btn-icon" wire:click="edit_type('{{ $type->id }}')">
                            <i class="ti ti-edit"></i>
                          </button>
                          <button class="btn btn-outline-danger btn-icon" wire:click="delete_type('{{ $type->id }}')">
                            <i class="ti ti-trash"></i>
                          </button>
                      </div>
                    </div>
                </div>
            @endforeach


        </div>

        <div class="col-md-4">
        <button class="btn btn-success" wire:click="info_modal">Success</button>

        @component('components.infomodal', [
            "title"=>$modal_title,
            "type"=>$modal_type,
            "description"=>$modal_description,
            "action"=>"info_modal_action"
            ])
        @endcomponent
        </div>
    </div>

    @component('components.modal', ["id"=>'addRessource', 'title' => 'Ajouter une ressource'])
        <form class="row" wire:submit="store">
            @include('_form.ressource_form')
            <div sty="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
        <script> window.addEventListener('open-addRessource', event => { window.$('#addRessource').modal('show'); }) </script>
        <script> window.addEventListener('close-addRessource', event => { window.$('#addRessource').modal('hide'); }) </script>
    @endcomponent

    @component('components.infomodal', ["id"=>'infoModal', 'title'=> 'Titre', 'type'=>'success'])

        {!! nl2br($description ?? "Description") !!}

        <script> window.addEventListener('open-infoModal', event => { $('#infoModal').modal('show'); }) </script>
        <script> window.addEventListener('close-infoModal', event => { $('#infoModal').modal('hide'); }) </script>
    @endcomponent
</div>
