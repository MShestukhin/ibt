<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Actions</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">

                        <div class="box-header with-border">
                            <div class="btn-group">
                                <router-link :to="{ name: xprops.route + '.create' }" class="btn btn-success btn-sm">
                                    <i class="fa fa-plus"></i> Add new
                                </router-link>
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
                { title: 'Actions',field: 'name', visible: true },
                { title: 'Ed', field: 'act_sd', visible: true },
                { title: 'Sd', field: 'act_ed', visible: true },
                { title: 'Priority', field: 'priority',  visible: true },
                { title: 'Members', field: 'act_members', visible: true },
                { title: 'Creator', field: 'user_name', visible: true },
                { title: 'On/off predbonus', field: 'pre_bonus_on', visible: true },
                { title: 'On/off bonus', field: 'bonus_switch_off', visible: true },
                { title: 'Folder name', field: 'folder_name', visible: true },
                { title: 'Status', field: 'state', visible: true },
                { title: '', tdComp: DatatableActions}

            ],
            query: { sort: 'id', order: 'desc' },
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
