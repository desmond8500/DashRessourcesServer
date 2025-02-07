<div>
    <div class="modal fade" id="infoModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-{{ $type ?? "success" }}"></div>
                <div class="modal-body text-center py-4">
                    @if ($type == 'danger')
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M12 9v2m0 4v.01" /> <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /> </svg>
                    @elseif ($type == 'error')

                    @elseif ($type == 'warning')

                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <circle cx="12" cy="12" r="9" /> <path d="M9 12l2 2l4 -4" /> </svg>
                    @endif

                    <h3>{{ $title ?? "Title" }}</h3>
                    <div class="text-secondary">
                        {{ $slot }}
                        {{ $description ?? '' }}
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col">
                                <a href="#" class="btn w-100" data-bs-dismiss="modal">
                                    Annuler
                                </a>
                            </div>
                            <div class="col">
                                <a href="#" class="btn btn-{{ $type ?? "success" }} w-100" wire:click="{{ $action ?? "" }}">
                                    Valider
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script> window.addEventListener('open-infoModal', event => { window.$('#infoModal').modal('show'); }) </script>
    <script> window.addEventListener('close-infoModal', event => { window.$('#infoModal').modal('hide'); }) </script>
</div>
