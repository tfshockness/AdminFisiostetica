<template>
    <div class="list-group">
        <a class="list-group-item" v-for="user in results" @click.prevent="bindName(user.id, user.first_name, user.last_name )"> {{user.first_name}}  {{user.last_name}}</a>
    </div>
</template>

<script>
    export default{
        props: ['results'],
        data() {
            return {
                name: ''
            };
        },
        methods:{
            bindName(id, first_name, last_name){
                //when click in a name, this name should be bind to a v-model in the input
                //for create, the id should be bind into the hidden input too
                //I need to communicate this component with outside (parent) $emit
                //bind $event.target.value
                //console.log($event.target.value);
                this.$emit('setid', id, first_name, last_name);
                console.log(id);
            }
        }
    }
</script>