function initialState() {
  return {
    entry: {
      id: null,
      company_name: '',
      email: null,
      phone: '',
      adresa_ulica: '',
      adresa_cislo: '',
      adresa_mesto: '',
      adresa_psc: '',
      kontaktna_osoba: '',
      osoba_phone: '',
      poznamka: '',
      ico: '',
      ic_dph: '',
      dic: '',
      banka: '',
      ucet: '',
      created_at: '',
      updated_at: '',
      deleted_at: ''
    },
    loading: false
  }
}

const route = 'clients'

const getters = {
  entry: state => state.entry,
  loading: state => state.loading
}

const actions = {
  storeData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      axios
        .post(route, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  updateData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      params.set('_method', 'PUT')
      axios
        .post(`${route}/${state.entry.id}`, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },
  setCompanyName({ commit }, value) {
    commit('setCompanyName', value)
  },
  setEmail({ commit }, value) {
    commit('setEmail', value)
  },
  setPhone({ commit }, value) {
    commit('setPhone', value)
  },
  setAdresaUlica({ commit }, value) {
    commit('setAdresaUlica', value)
  },
  setAdresaCislo({ commit }, value) {
    commit('setAdresaCislo', value)
  },
  setAdresaMesto({ commit }, value) {
    commit('setAdresaMesto', value)
  },
  setAdresaPsc({ commit }, value) {
    commit('setAdresaPsc', value)
  },
  setKontaktnaOsoba({ commit }, value) {
    commit('setKontaktnaOsoba', value)
  },
  setOsobaPhone({ commit }, value) {
    commit('setOsobaPhone', value)
  },
  setPoznamka({ commit }, value) {
    commit('setPoznamka', value)
  },
  setIco({ commit }, value) {
    commit('setIco', value)
  },
  setIcDph({ commit }, value) {
    commit('setIcDph', value)
  },
  setDic({ commit }, value) {
    commit('setDic', value)
  },
  setBanka({ commit }, value) {
    commit('setBanka', value)
  },
  setUcet({ commit }, value) {
    commit('setUcet', value)
  },
  setCreatedAt({ commit }, value) {
    commit('setCreatedAt', value)
  },
  setUpdatedAt({ commit }, value) {
    commit('setUpdatedAt', value)
  },
  setDeletedAt({ commit }, value) {
    commit('setDeletedAt', value)
  },
  fetchEditData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}/edit`).then(response => {
      commit('setEntry', response.data.data)
    })
  },
  fetchShowData({ commit, dispatch }, id) {
    axios.get(`${route}/${id}`).then(response => {
      commit('setEntry', response.data.data)
    })
  },
  resetState({ commit }) {
    commit('resetState')
  }
}

const mutations = {
  setEntry(state, entry) {
    state.entry = entry
  },
  setCompanyName(state, value) {
    state.entry.company_name = value
  },
  setEmail(state, value) {
    state.entry.email = value
  },
  setPhone(state, value) {
    state.entry.phone = value
  },
  setAdresaUlica(state, value) {
    state.entry.adresa_ulica = value
  },
  setAdresaCislo(state, value) {
    state.entry.adresa_cislo = value
  },
  setAdresaMesto(state, value) {
    state.entry.adresa_mesto = value
  },
  setAdresaPsc(state, value) {
    state.entry.adresa_psc = value
  },
  setKontaktnaOsoba(state, value) {
    state.entry.kontaktna_osoba = value
  },
  setOsobaPhone(state, value) {
    state.entry.osoba_phone = value
  },
  setPoznamka(state, value) {
    state.entry.poznamka = value
  },
  setIco(state, value) {
    state.entry.ico = value
  },
  setIcDph(state, value) {
    state.entry.ic_dph = value
  },
  setDic(state, value) {
    state.entry.dic = value
  },
  setBanka(state, value) {
    state.entry.banka = value
  },
  setUcet(state, value) {
    state.entry.ucet = value
  },
  setCreatedAt(state, value) {
    state.entry.created_at = value
  },
  setUpdatedAt(state, value) {
    state.entry.updated_at = value
  },
  setDeletedAt(state, value) {
    state.entry.deleted_at = value
  },
  setLoading(state, loading) {
    state.loading = loading
  },
  resetState(state) {
    state = Object.assign(state, initialState())
  }
}

export default {
  namespaced: true,
  state: initialState,
  getters,
  actions,
  mutations
}
