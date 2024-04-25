import './bootstrap';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
// import Alpine from 'alpinejs';
// import focus from '@alpinejs/focus';
import intersect from '@alpinejs/intersect'




// Alpine.plugin(focus);
Alpine.plugin(intersect)

// Alpine.start();
// window.Livewire = Livewire;
Livewire.start();
