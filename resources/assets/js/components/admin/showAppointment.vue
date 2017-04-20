<template>
    <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-yellow">
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><slot name="customer"></slot></h3>
                <h5 class="widget-user-desc"><slot name="status"></slot></h5>
                </div>
                <div class="box-footer">
                <ul class="nav nav-stacked">
                    <li><slot name="date"></slot></li>
                    <li><a href="#">Tasks <span class="pull-right badge bg-aqua">5</span></a></li>
                    <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
                    <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>
                </ul>
                </div>
            </div>
    </div>
</template>
<script>
export default {
    data(){
        return {

        };
    },
    mounted(){
        axios.get('/agenda/datas')
        .then(function (response){
            console.log(response.data);
        }).catch(function(error){
            console.log(error);
        });
    }
}
</script>
<style scoped>
</style>