/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('jambik-message', require('./components/JambikMessage.vue'));
Vue.component('jambik-modal', require('./components/JambikModal.vue'));
Vue.component('jambik-tabs', require('./components/JambikTabs.vue'));
Vue.component('jambik-tab', require('./components/JambikTab.vue'));
Vue.component('jambik-coupon', require('./components/JambikCoupon.vue'));

window.Event = new Vue();

const app = new Vue({
    el: '#app',
    data: {
        newName: '',
        message: 'Hello world',
        names: ['Jambik', 'Kamilla', 'Alim', 'Adel'],
        tasks: [
            { description: 'First task', completed: false },
            { description: 'Second task', completed: true },
            { description: 'Third task', completed: false },
            { description: 'Fourth task', completed: true },
            { description: 'Fifth task', completed: false },
            { description: 'Sixth task', completed: true },
            { description: 'Seventh task', completed: true }
        ],
        isPressed: false,
        showModal: false,
    },
    methods: {
        addName() {
            this.names.push( this.newName );
            this.newName = '';
        },

        toggleButton() {
            this.isPressed = true;
        },
        closeModal() {
            this.showModal = false;
        }
    },
    computed: {
        incompletedTasks() {
            return this.tasks.filter(task => ! task.completed);
        }
    },
    created() {
        Event.$on('entered', () => alert('entered yeah'));
    },
    mounted() {

    }
});