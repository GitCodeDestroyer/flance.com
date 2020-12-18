<template>
    <div>
        <li>{{ owner }}</li>
        <li>{{ body }}</li>
    </div>
</template>

<script>
    export default {
        props: ['owner', 'body'],
        methods: {
        }
    }
</script>
