<div class="col-auto mb-3">
    <div wire:loading wire:target='logo'>
        Chargement <div class="spinner-border" role="status"></div>
    </div>
    @if ($logo)
        @if(is_string($logo))
            <img src="{{ $logo }}" alt="" class="avatar rounded avatar-upload">
        @else
            <img src="{{ $logo->temporaryUrl() }}" alt="" class="avatar rounded avatar-upload">
        @endif
        <label for="file" href="#" class="avatar avatar-upload rounded">
            <i class="ti ti-edit text-muted"></i>
            <span class="avatar-upload-text">Modifier</span>
        </label>
    @else
        <label for="file" href="#" class="avatar avatar-upload rounded">
            <i class="ti ti-plus text-muted"></i>
            <span class="avatar-upload-text">Ajouter</span>
        </label>
    @endif
    <input type="file" id="file" accept="image/*" style="display: none" wire:model="logo">
</div>

<div class="col-md mb-3">
    <label class="form-label">Name</label>
    <input type="text" class="form-control" wire:model="name" placeholder="Name">
    @error('name') <span class='text-danger'>{{ $message }}</span> @enderror
</div>
<div class="w-100"></div>
<div class="col-md-12 mb-3">
    <label class="form-label">Lien</label>
    <input type="text" class="form-control" wire:model="lien" placeholder="Lien vers la ressource">
    @error('lien') <span class='text-danger'>{{ $message }}</span> @enderror
</div>

<div class="col-md-12 mb-3">
    <label class="form-label">Description</label>
    <textarea class="form-control" wire:model="description" placeholder="Description" cols="30" rows="5"></textarea>
    @error('description') <span class='text-danger'>{{ $message }}</span> @enderror
</div>
