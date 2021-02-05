<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">add</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.create') }}
                <strong>{{ $t('cruds.client.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="row">
                <div class="col-md-12">
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.company_name,
                      'is-focused': activeField == 'company_name'
                    }"
                  >
                    <label class="bmd-label-floating required">{{
                      $t('cruds.client.fields.company_name')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.company_name"
                      @input="updateCompanyName"
                      @focus="focusField('company_name')"
                      @blur="clearFocus"
                      required
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.email,
                      'is-focused': activeField == 'email'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.client.fields.email')
                    }}</label>
                    <input
                      class="form-control"
                      type="email"
                      :value="entry.email"
                      @input="updateEmail"
                      @focus="focusField('email')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.phone,
                      'is-focused': activeField == 'phone'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.client.fields.phone')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.phone"
                      @input="updatePhone"
                      @focus="focusField('phone')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.adresa_ulica,
                      'is-focused': activeField == 'adresa_ulica'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.client.fields.adresa_ulica')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.adresa_ulica"
                      @input="updateAdresaUlica"
                      @focus="focusField('adresa_ulica')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.adresa_cislo,
                      'is-focused': activeField == 'adresa_cislo'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.client.fields.adresa_cislo')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.adresa_cislo"
                      @input="updateAdresaCislo"
                      @focus="focusField('adresa_cislo')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.adresa_mesto,
                      'is-focused': activeField == 'adresa_mesto'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.client.fields.adresa_mesto')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.adresa_mesto"
                      @input="updateAdresaMesto"
                      @focus="focusField('adresa_mesto')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.adresa_psc,
                      'is-focused': activeField == 'adresa_psc'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.client.fields.adresa_psc')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.adresa_psc"
                      @input="updateAdresaPsc"
                      @focus="focusField('adresa_psc')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.kontaktna_osoba,
                      'is-focused': activeField == 'kontaktna_osoba'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.client.fields.kontaktna_osoba')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.kontaktna_osoba"
                      @input="updateKontaktnaOsoba"
                      @focus="focusField('kontaktna_osoba')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.osoba_phone,
                      'is-focused': activeField == 'osoba_phone'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.client.fields.osoba_phone')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.osoba_phone"
                      @input="updateOsobaPhone"
                      @focus="focusField('osoba_phone')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.poznamka,
                      'is-focused': activeField == 'poznamka'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.client.fields.poznamka')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.poznamka"
                      @input="updatePoznamka"
                      @focus="focusField('poznamka')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.ico,
                      'is-focused': activeField == 'ico'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.client.fields.ico')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.ico"
                      @input="updateIco"
                      @focus="focusField('ico')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.ic_dph,
                      'is-focused': activeField == 'ic_dph'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.client.fields.ic_dph')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.ic_dph"
                      @input="updateIcDph"
                      @focus="focusField('ic_dph')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.dic,
                      'is-focused': activeField == 'dic'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.client.fields.dic')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.dic"
                      @input="updateDic"
                      @focus="focusField('dic')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.banka,
                      'is-focused': activeField == 'banka'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.client.fields.banka')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.banka"
                      @input="updateBanka"
                      @focus="focusField('banka')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.ucet,
                      'is-focused': activeField == 'ucet'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.client.fields.ucet')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      :value="entry.ucet"
                      @input="updateUcet"
                      @focus="focusField('ucet')"
                      @blur="clearFocus"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      status: '',
      activeField: ''
    }
  },
  computed: {
    ...mapGetters('ClientsSingle', ['entry', 'loading'])
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('ClientsSingle', [
      'storeData',
      'resetState',
      'setCompanyName',
      'setEmail',
      'setPhone',
      'setAdresaUlica',
      'setAdresaCislo',
      'setAdresaMesto',
      'setAdresaPsc',
      'setKontaktnaOsoba',
      'setOsobaPhone',
      'setPoznamka',
      'setIco',
      'setIcDph',
      'setDic',
      'setBanka',
      'setUcet'
    ]),
    updateCompanyName(e) {
      this.setCompanyName(e.target.value)
    },
    updateEmail(e) {
      this.setEmail(e.target.value)
    },
    updatePhone(e) {
      this.setPhone(e.target.value)
    },
    updateAdresaUlica(e) {
      this.setAdresaUlica(e.target.value)
    },
    updateAdresaCislo(e) {
      this.setAdresaCislo(e.target.value)
    },
    updateAdresaMesto(e) {
      this.setAdresaMesto(e.target.value)
    },
    updateAdresaPsc(e) {
      this.setAdresaPsc(e.target.value)
    },
    updateKontaktnaOsoba(e) {
      this.setKontaktnaOsoba(e.target.value)
    },
    updateOsobaPhone(e) {
      this.setOsobaPhone(e.target.value)
    },
    updatePoznamka(e) {
      this.setPoznamka(e.target.value)
    },
    updateIco(e) {
      this.setIco(e.target.value)
    },
    updateIcDph(e) {
      this.setIcDph(e.target.value)
    },
    updateDic(e) {
      this.setDic(e.target.value)
    },
    updateBanka(e) {
      this.setBanka(e.target.value)
    },
    updateUcet(e) {
      this.setUcet(e.target.value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'clients.index' })
          this.$eventHub.$emit('create-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
