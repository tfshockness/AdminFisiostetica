<template>
    <div>
        <div class="col-md-2">
            <select class="form-control" v-model="searchOption" @blur="getDateInput">
                <option value="nome" selected>Nome</option>
                <option value="data">Data</option>
            </select>
        </div>
        <!-- Date range -->
        <div class="col-md-4" v-if="searchOption == 'data'">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="date" class="form-control" id="datepick" >
            </div>
            <!-- /.input group -->
        </div>

        <!-- /.form group -->
        <div class="form-group col-md-4" v-if="searchOption == 'nome'">
            <input type="text" class="form-control" id="search" name="name" placeholder="Buscar por Nome">
        </div>
        <div class="col-md-2">
            <input type="submit" class="btn bg-blue form-control" name="btn" value="buscar" >
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                searchOption: 'nome'
            }
        },
        methods:{
            getDateInput(){
                    getDate();
            }
        }
    }
</script>

<style>
</style>