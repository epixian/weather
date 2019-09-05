<template>
    <div id="view-customers">
        <view-header
            :title="title"
            :subtitle="subtitle"></view-header>

        <router-view></router-view>
    </div>
</template>

<script>
    import ViewHeader from '../components/ViewHeader.vue';

    export default {
        components: { ViewHeader },

        data() {
            return {
                title: 'Customers',
                subtitle: 'Leads, clients, vendors, and any other organizations you do business with'
            }
        }
    }
</script>