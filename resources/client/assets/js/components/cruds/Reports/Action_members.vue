<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Количество участников в акции</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Акция</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" ></div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">С</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">По</label>
                                            <input type="text" class="form-control" id="exampleInputPassword1">
                                        </div>
                                        <button type="button" v-on:click="getReport" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>

<script>
    export default {
        name: "Action_members"
    }
</script>

<style scoped>

</style>