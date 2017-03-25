<template>
    <article class="message" :class="cssclass" v-show="isVisible">
        <div class="message-header"><p>{{ title }}</p>
            <button class="delete" @click="hideMessage"></button>
        </div>
        <div class="message-body">
            <slot></slot>
        </div>
    </article>
</template>

<script>
    export default {
        props: [ 'title', 'cssclass' ],
        data() {
            return {
                isVisible: true
            };
        },
        methods: {
            hideMessage() {
                this.isVisible = false;
            }
        },
        created() {
//            Event.$on('entered', () => alert('entered in message'));
        },
        mounted() {
            console.log('Component jambik-message mounted.')
        }
    }
</script>
