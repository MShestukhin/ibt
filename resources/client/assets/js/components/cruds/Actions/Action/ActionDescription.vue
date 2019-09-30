<template>
<form>
    <div class="row-fluid">
        <div class="col-md-4 mb-4">
            <label for="act_name">Наименование акции</label>
                <div class="input-group" id="act_name">
                    <span class="input-group-addon"><i class="glyphicon">{{action.id}}</i></span>
                    <input  style="width:250px" id="name"  name="act_name" type="text" class="form-control" placeholder="Наименование акции" :value="action.name">
                </div>
        </div>
        <div class="col-md-2 mb-3">
            <label class="form-check-label" for="autoSizingCheck2">
            Создал акцию
            </label>
            <h4 id="autoSizingCheck2">{{action.creator}}</h4>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-check-label" for="autoSizingCheck2">
            Статус акции
            </label>
                <p><span :class="alert_status[action.state]"><h5>{{action.state}}</h5></span></p>

        </div>
    </div>

            <label class="col-md-12" for="act_sd">Срок действия акции</label>
    		<div class="row-fluid " id="act_sd">
                <div class="col-md-4">
                    <date-picker v-model="action.act_sd" :config="options"/>
			    </div>

			    <div class="col-md-4">
                    <date-picker v-model="date" :config="options"/>
				</div>
			</div>

        <div class="form-row">
            <div class="col-md-12">
                <label for="validationDefault01">Приоритет акции</label>
                <input type="text" style="width: 230px;" class="form-control" id="validationDefault01" placeholder="First name" :value="action.priority">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="for_only_new_devices" :checked="item[1].for_only_new_devices.checked">
                    <label class="form-check-label" for="for_only_new_devices">
                        {{item[1].for_only_new_devices.dsc}}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="only_this" :checked="action.only_this">
                    <label class="form-check-label" for="only_this">
                        Запрещено совместное участие в других акциях
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="no_eir" :checked="item[1].no_eir.checked">
                    <label class="form-check-label" for="no_eir">
                        {{item[1].no_eir.checked}}
                        Отключение триггера EIR
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="pre_bonus_on" :checked="item[1].pre_bonus_on.checked">
                    <label class="form-check-label" for="pre_bonus_on">
                        {{item[1].pre_bonus_on.dsc}}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="bonus_switch_on" :checked="item[1].bonus_switch_on.checked">
                    <label class="form-check-label" for="bonus_switch_on">
                        {{item[1].bonus_switch_on.dsc}}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="bonus_switch_off" :checked="item[1].bonus_switch_off.checked">
                    <label class="form-check-label" for="bonus_switch_off">
                        {{item[1].bonus_switch_off.dsc}}
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Условия акции</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Сохранить</button>
            <button type="submit" class="btn btn-warning">Закрыть акцию</button>
            <button type="submit" class="btn">Выгрузить настройки</button>
        </div>
    </form>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
export default {
    props: ["action"],
    name: "ActionDescription",
    data() {
        return {
            alert_status: {'Зарезервирована' : 'label label-warning', 'Запущена': 'label label-success', 'Завершена': 'label label-default'},
            options: {
                format: 'YYYY.MM.DD hh:mm:ss',
                useCurrent: false,
            }
        }
    },
    computed: {
        ...mapGetters('ActionParams', ['item']),
    },
    watch: {
        "$route.params.id": function () {
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('ActionParams', ['fetchData']),
    },
    created() {
        this.fetchData(this.$route.params.id);
    },
}
</script>