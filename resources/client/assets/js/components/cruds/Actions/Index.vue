<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Акции</h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <div class="box-header with-border">
                            <div class="btn-group">
                                <!--<router-link :to="{ name: xprops.route + '.create' }" class="btn btn-success btn-sm">-->
                                    <!--<i class="fa fa-plus"></i> Add new-->
                                <!--</router-link>-->
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-plus"></i> Добавить акцию
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Создание акции</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group" id="act_name">
                                                    <span class="input-group-addon"><i class="glyphicon">1788</i></span>
                                                    <input  style="width:250px" id="name"  name="act_name" type="text" class="form-control" placeholder="Наименование акции">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Зарезервировать</button>
                                                <router-link :to="{ name: xprops.route + '.create' }" class="btn btn-success btn-sm">
                                                Создать
                                                </router-link>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-default btn-sm" @click="fetchData">
                                    <i class="fa fa-refresh" :class="{'fa-spin': loading}"></i> Refresh
                                </button>
                            </div> 

                            <div class="box-body">
                                <div class="row" v-if="loading">
                                    <div class="col-xs-4 col-xs-offset-4">
                                        <div class="alert text-center">
                                            <i class="fa fa-spin fa-refresh"></i> Loading
                                        </div>
                                    </div>
                                </div>

                            <datatable
                                    v-if="!loading"
                                    :columns="columns"
                                    :data="data"
                                    :total="total"
                                    :query="query"
                                    :xprops="xprops"
                                    />
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </section>
    </section>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import DatatableActions from '../../dtmodules/DatatableActions'
import DatatableSingle from '../../dtmodules/DatatableSingle'
import DatatableList from '../../dtmodules/DatatableList'
import DatatableCheckbox from '../../dtmodules/DatatableCheckbox'

export default {
    data() {
        return {
            columns: [
                { title: '#', field: 'id', sortable: true, colStyle: 'width: 50px;' },
                { title: 'Акция',field: 'name',sortable: true, visible: true },
                { title: 'Ed', field: 'act_sd',sortable: true, visible: true },
                { title: 'Sd', field: 'act_ed',sortable: true, visible: true },
                { title: 'Приоритет', field: 'priority', sortable: true, visible: true },
                { title: 'Участники', field: 'act_members', sortable: true, visible: true },
                { title: 'Создал акцию', field: 'user_name', sortable: true,visible: true },
                { title: 'On/off предбонуса', field: 'pre_bonus_on', sortable: true,visible: true },
                { title: 'On/off bonus', field: 'bonus_switch_off', sortable: true,visible: true },
                { title: 'Каталог акции', field: 'folder_name', sortable: true,visible: true },
                { title: 'Статус', field: 'state', sortable: true,visible: true },
                { title: '', tdComp: DatatableActions}

            ],
            query: { sort: ['id','name'],  order: 'desc' },
            xprops: {
                module: 'ActionsIndex',
                route: 'actions'
            },
        }
    },
    created() {
                this.$root.relationships = this.relationships
                this.fetchData()
            },
    destroyed() {
        this.resetState()
    },
    computed: {
        ...mapGetters('ActionsIndex', ['data', 'total', 'loading', 'relationships']),
    },
        watch: {
        query: {
            handler(query) {
                this.setQuery(query)
            },
            deep: true
        }
    },
    methods: {
        ...mapActions('ActionsIndex', ['fetchData', 'setQuery', 'resetState']),
    }    
}
</script>
