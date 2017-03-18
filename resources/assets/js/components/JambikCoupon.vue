<template>
    <div>
        <input class="form-control" name="coupon" id="coupon" @blur="onCouponEntered">
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
            onCouponEntered() {
                Event.$emit('entered');
            }
        },
        created() {
            console.log('created');
        },
        mounted() {
            console.log('mounted');
        }
    }
</script>
