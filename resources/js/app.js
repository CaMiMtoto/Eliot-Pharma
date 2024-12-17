

import './bootstrap';
/*import { createApp } from 'vue';


const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

app.mount('#app');*/


document.addEventListener('DOMContentLoaded', () => {
    const observer = lozad(); // lazy loads elements with default selector as '.lozad'
    observer.observe();

    Livewire.hook('morph.updated', ({ el, component }) => {
        observer.observe(); // Re-observe new images after Livewire updates
    })
});
