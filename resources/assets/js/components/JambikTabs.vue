<template>
    <div>
        <div class="tabs">
            <ul>
                <li :class="{ 'is-active' : tab.isActive }" v-for="tab in tabs"><a :href="tab.href" @click="selectTab(tab)">{{ tab.name }}</a></li>
            </ul>
        </div>

        <div class="tabs-details">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                tabs: []
            };
        },
        methods: {
            selectTab(selectedTab) {
                this.tabs.forEach(tab => {
                    tab.isActive = (tab.name == selectedTab.name);
                });
            }
        },
        created() {
            this.tabs = this.$children;
        },
        mounted() {

        }
    }
</script>
