<template>
    <li><router-link :to="path">{{ title }}</router-link></li>
</template>

<script>
    export default {
        props: ['path', 'title'],
        methods: {
        }
    }
</script>
