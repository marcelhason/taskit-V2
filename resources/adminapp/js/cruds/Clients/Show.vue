<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">remove_red_eye</i>
            </div>
            <h4 class="card-title">
              {{ $t('global.view') }}
              <strong>{{ $t('cruds.client.title_singular') }}</strong>
            </h4>
          </div>
          <div class="card-body">
            <back-button></back-button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <div class="table">
                    <tbody>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.client.fields.id') }}
                        </td>
                        <td>
                          {{ entry.id }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.client.fields.company_name') }}
                        </td>
                        <td>
                          {{ entry.company_name }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.client.fields.email') }}
                        </td>
                        <td>
                          {{ entry.email }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.client.fields.phone') }}
                        </td>
                        <td>
                          {{ entry.phone }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.client.fields.adresa_ulica') }}
                        </td>
                        <td>
                          {{ entry.adresa_ulica }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.client.fields.adresa_cislo') }}
                        </td>
                        <td>
                          {{ entry.adresa_cislo }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.client.fields.adresa_mesto') }}
                        </td>
                        <td>
                          {{ entry.adresa_mesto }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.client.fields.adresa_psc') }}
                        </td>
                        <td>
                          {{ entry.adresa_psc }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.client.fields.kontaktna_osoba') }}
                        </td>
                        <td>
                          {{ entry.kontaktna_osoba }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.client.fields.osoba_phone') }}
                        </td>
                        <td>
                          {{ entry.osoba_phone }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.client.fields.poznamka') }}
                        </td>
                        <td>
                          {{ entry.poznamka }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.client.fields.ico') }}
                        </td>
                        <td>
                          {{ entry.ico }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.client.fields.ic_dph') }}
                        </td>
                        <td>
                          {{ entry.ic_dph }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.client.fields.dic') }}
                        </td>
                        <td>
                          {{ entry.dic }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.client.fields.banka') }}
                        </td>
                        <td>
                          {{ entry.banka }}
                        </td>
                      </tr>
                      <tr>
                        <td class="text-primary">
                          {{ $t('cruds.client.fields.ucet') }}
                        </td>
                        <td>
                          {{ entry.ucet }}
                        </td>
                      </tr>
                    </tbody>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {}
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('ClientsSingle', ['entry'])
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.resetState()
        this.fetchShowData(this.$route.params.id)
      }
    }
  },
  methods: {
    ...mapActions('ClientsSingle', ['fetchShowData', 'resetState'])
  }
}
</script>
