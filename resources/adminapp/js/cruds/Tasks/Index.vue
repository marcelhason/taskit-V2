<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title">
              {{ $t('global.table') }}
              <strong>{{ $t('cruds.task.title') }}</strong>
            </h4>
          </div>
          <div class="card-body">
            <router-link
              class="btn btn-primary"
              v-if="$can(xprops.permission_prefix + 'create')"
              :to="{ name: xprops.route + '.create' }"
            >
              <i class="material-icons">
                add
              </i>
              {{ $t('global.add') }}
            </router-link>
            <button
              type="button"
              class="btn btn-default"
              @click="fetchIndexData"
              :disabled="loading"
              :class="{ disabled: loading }"
            >
              <i class="material-icons" :class="{ 'fa-spin': loading }">
                refresh
              </i>
              {{ $t('global.refresh') }}
            </button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="table-overlay" v-show="loading">
                  <div class="table-overlay-container">
                    <material-spinner></material-spinner>
                    <span>Loading...</span>
                  </div>
                </div>
                <datatable
                  :columns="columns"
                  :data="data"
                  :total="total"
                  :query="query"
                  :xprops="xprops"
                  :HeaderSettings="false"
                  :pageSizeOptions="[10, 25, 50, 100]"
                >
                  <global-search :query="query" class="pull-left" />
                  <header-settings :columns="columns" class="pull-right" />
                </datatable>
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
import DatatableActions from '@components/Datatables/DatatableActions'
import TranslatedHeader from '@components/Datatables/TranslatedHeader'
import HeaderSettings from '@components/Datatables/HeaderSettings'
import GlobalSearch from '@components/Datatables/GlobalSearch'
import DatatableSingle from '@components/Datatables/DatatableSingle'
import DatatableCheckbox from '@components/Datatables/DatatableCheckbox'
import DatatableList from '@components/Datatables/DatatableList'
import DatatableAttachments from '@components/Datatables/DatatableAttachments'

export default {
  components: {
    GlobalSearch,
    HeaderSettings
  },
  data() {
    return {
      columns: [
        {
          title: 'cruds.task.fields.name',
          field: 'name',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.task.fields.client',
          field: 'client.company_name',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.task.fields.porject_type',
          field: 'porject_type.name',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.task.fields.start_date',
          field: 'start_date',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.task.fields.deadtime',
          field: 'deadtime',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.task.fields.price',
          field: 'price',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.task.fields.costs',
          field: 'costs',
          thComp: TranslatedHeader,
          sortable: true
        },
        {
          title: 'cruds.task.fields.status',
          field: 'status.name',
          thComp: TranslatedHeader,
          tdComp: DatatableSingle,
          sortable: true
        },
        {
          title: 'cruds.task.fields.invoice',
          field: 'invoice',
          thComp: TranslatedHeader,
          tdComp: DatatableCheckbox,
          sortable: true
        },
        {
          title: 'cruds.task.fields.paid',
          field: 'paid',
          thComp: TranslatedHeader,
          tdComp: DatatableCheckbox,
          sortable: true
        },
        {
          title: 'cruds.task.fields.assingned',
          field: 'assingned.name',
          thComp: TranslatedHeader,
          tdComp: DatatableList
        },
        {
          title: 'cruds.task.fields.priloha',
          field: 'priloha',
          thComp: TranslatedHeader,
          tdComp: DatatableAttachments
        },
        {
          title: 'global.actions',
          thComp: TranslatedHeader,
          tdComp: DatatableActions,
          visible: true,
          thClass: 'text-right',
          tdClass: 'text-right td-actions',
          colStyle: 'width: 150px;'
        }
      ],
      query: { sort: 'name', order: 'desc', limit: 100, s: '' },
      xprops: {
        module: 'TasksIndex',
        route: 'tasks',
        permission_prefix: 'task_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('TasksIndex', ['data', 'total', 'loading'])
  },
  watch: {
    query: {
      handler(query) {
        this.setQuery(query)
        this.fetchIndexData()
      },
      deep: true
    }
  },
  methods: {
    ...mapActions('TasksIndex', ['fetchIndexData', 'setQuery', 'resetState'])
  }
}
</script>
