function initialState() {
    return {
        bonuses: {},
    }
}
const actions = {
    fetchData({commit, dispatch}, id) {
        axios.get('/api/v1/actionBonuses/' + id)
            .then(response => {
                commit('setBonuses', response.data.data)
            })
    }
}

const mutations = {
    setBonuses(state, bonuses) {
        state.bonuses = bonuses;
    },
}

const getters = {
    bonuses: state => state.bonuses,
    loading: state => state.loading,
}

export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}