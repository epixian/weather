<template>
    <div id="add-weather-location" class="container">
        <div class="message">
            <div class="message-header">
                <p>Add a location</p>
            </div>
            <div class="message-body">
                <form @submit.prevent="onSubmit" @keydown="form.errors.clear()">
                    <div class="field">
                        <div class="control">
                            <input class="input" type="text" name="address" id="address" placeholder="Enter a ZIP code" v-model="form.address">
                            <span class="help is-danger" 
                                v-text="form.errors.get('address')" 
                                v-if="form.errors.has('address')"></span>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button class="button is-info" :disabled="form.errors.any()">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'add-weather-location',
        
        data() {
            return {
                form: new Form({ 
                    address: '' 
                })
            };
        },

        methods: {
            onSubmit() {
                this.form.post('/api/weatherlocations')
                    .then(location => this.$emit('location_added', location));
            }
        }
    }
</script>
