function initialState() {
    return {
        item: {},
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
}


const actions = {
    fetchData({ commit, dispatch }, id) {
        axios.get('/api/v1/actionParams/' + id)
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