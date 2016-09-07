
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('note', require('./components/note.vue'));

const app = new Vue({
    el: 'body',
    data: {
        notes: [],
        notebooks: []
    },
    ready() {
        this.$http.get('notebooks/getnotebooks').then((response) => {
            this.$set('notebooks',response.data);
            this.$http.get('notebooks/getnotes/' + this.notebooks[0].id).then((response) => {
               this.$set('notes',response.data);
            });
        });
        // this.$http.get('/notebooks/getnotes/' + ).then((response) => {
        //     this.notes.push(response.data);
        // });
    },
    methods: {
        fetchNotes(id)
        {
            this.$http.get('notebooks/getnotes/' + id).then((response) => {
                this.$set('notes',response.data);
            });
        },
        saveNotes(note)
        {
            console.log("Note Saving");
        }
    }
});

$(document).ready(function() {
    console.log("jQuery says hello!");
    tinymce.init({
        selector: '#tiny-body',
        toolbar: 'undo redo | bold italic | bullist numlist',
        menubar: false,
        statusbar: false,
        content_css: '/css/tinytweak.css',
        browser_spellcheck: true,
        plugins: 'autoresize'
    });
});
