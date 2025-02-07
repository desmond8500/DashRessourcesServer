<?php

use App\Livewire\Pages\RessourcesPage;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('ressources');
});

Route::get('ressources', RessourcesPage::class)->name('ressources');
