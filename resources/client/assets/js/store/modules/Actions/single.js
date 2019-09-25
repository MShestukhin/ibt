function initialState() {
    return {
        item: {
            id: null,
            name: null,
            creator: null,
            state: null,
            act_sd: null,
            act_ed: null,
            priority: null,
            is_reserved: null,
            is_started: null,
            is_closed: null
        },
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
}

const actions = {
    fetchData({ commit, dispatch }, id) {
        axios.get('/api/v1/actions/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
}

export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}