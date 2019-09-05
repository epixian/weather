<template>
    <div id="hero" class="hero is-info is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="title" v-text="title"></h1>
                <h2 class="subtitle" v-if="subtitle" v-text="subtitle"></h2>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'view-header',

        props: [ 'title', 'subtitle' ]
    }
</script>