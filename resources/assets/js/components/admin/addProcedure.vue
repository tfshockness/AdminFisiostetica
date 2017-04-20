<template>
                    <div id="add-procedure">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title center">Adicionar Procedimento</h3><span class="close" @click="closing">x</span>
                                    <form role="form" class="form-horizontal" action="/procedimentos" method="POST">
                                    
                                    <input type="hidden" name="_token" :value="token">

                                            <div class="form-group" style="padding-top:20px;">
                                                <label for="first_name" class="col-sm-2 control-label">Nome</label>

                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="name" placeholder="Procedimento" value="" name="name" required>
                                                </div>

                                            </div>

                                            <div class="box-footer">
                                                <button type="submit" class="btn btn-primary">Adicionar</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                    </div>
</template>
<script>
    export default {
        props: ['closing'],
        data(){
            return {
                token: ''
            };
        },
        created(){
            this.$on('closeAdd', this.closing);
        },
        mounted(){
            this.token = window.Laravel.csrfToken
        }
    }
</script>