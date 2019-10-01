<template>
    <box>
        <box-body>
            <div class="span" style="margin-bottom:20px">
                <button  data-toggle="modal" data-target="#add_memeber_modal"  class="btn btn-default" type="button"><i class="fa fa-user"></i> Добавить участника</button>
                <button data-toggle="modal" data-target="#add_memeber_list_modal"  class="btn btn-default" type="button"><i class="fa fa-list"></i> Добавить список участников</button>
            </div>
            <h4>В акции ... участников</h4>

            <form>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="imei">IMEI/TAC</label>
                            <input type="text" class="form-control" placeholder="IMEI/TAC" id="imei">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="msisdn">MSISDN</label>
                            <input type="text" placeholder="MSISDN" class="form-control" id="msisdn">
                            <small id="msisdn_small" class="form-text text-muted">7xxxxxxxxxx</small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="imsi">IMSI</label>
                            <input type="text" placeholder="IMSI" class="form-control" id="imsi">
                        </div>
                    </div>
                </div>
                <label for="act_sd">Период участия</label>
                <div class="row " id="act_sd">
                    <div class="col-md-4">
                        <date-picker v-model="date" :config="options" placeholder="дд.мм.гггг чч.мм.сс"/>
                    </div>

                    <div class="col-md-4">
                        <date-picker v-model="date" :config="options"  placeholder="дд.мм.гггг чч.мм.сс"/>
                    </div>
                </div>
                <br>
                <button type="button" class="btn btn-default">Поиск</button>
            </form>
        </box-body>
    </box>

</template>

<script>
    export default {
        name: "ActionMembers",
        data() {
            return {
                options: {
                    format: 'YYYY.MM.DD hh:mm:ss',
                    useCurrent: false,
                }
            }
        }
    }
</script>

<style scoped>

</style>