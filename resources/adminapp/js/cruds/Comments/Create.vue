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
                <strong>{{ $t('cruds.comment.title_singular') }}</strong>
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
                      'has-items': entry.autor_id !== null,
                      'is-focused': activeField == 'autor'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.comment.fields.autor')
                    }}</label>
                    <v-select
                      name="autor"
                      label="name"
                      :key="'autor-field'"
                      :value="entry.autor_id"
                      :options="lists.autor"
                      :reduce="entry => entry.id"
                      @input="updateAutor"
                      @search.focus="focusField('autor')"
                      @search.blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.description,
                      'is-focused': activeField == 'description'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.comment.fields.description')
                    }}</label>
                    <textarea
                      class="form-control"
                      rows="5"
                      :value="entry.description"
                      @input="updateDescription"
                      @focus="focusField('description')"
                      @blur="clearFocus"
                    ></textarea>
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.task_id !== null,
                      'is-focused': activeField == 'task'
                    }"
                  >
                    <label class="bmd-label-floating">{{
                      $t('cruds.comment.fields.task')
                    }}</label>
                    <v-select
                      name="task"
                      label="name"
                      :key="'task-field'"
                      :value="entry.task_id"
                      :options="lists.task"
                      :reduce="entry => entry.id"
                      @input="updateTask"
                      @search.focus="focusField('task')"
                      @search.blur="clearFocus"
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
    ...mapGetters('CommentsSingle', ['entry', 'loading', 'lists'])
  },
  mounted() {
    this.fetchCreateData()
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('CommentsSingle', [
      'storeData',
      'resetState',
      'setAutor',
      'setDescription',
      'setTask',
      'fetchCreateData'
    ]),
    updateAutor(value) {
      this.setAutor(value)
    },
    updateDescription(e) {
      this.setDescription(e.target.value)
    },
    updateTask(value) {
      this.setTask(value)
    },
    submitForm() {
      this.storeData()
        .then(() => {
          this.$router.push({ name: 'comments.index' })
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
