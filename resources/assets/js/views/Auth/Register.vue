<template>
    <div class="column is-half is-offset-one-quarter">
      <div class="box">
          <h3 class="title is-3">Create An Account</h3>
          <form @submit.prevent="register">

              <div class="field">
                <p class="control has-icons-left">
                  <input v-bind:class="{'is-danger': error.name, input: true}" type="text" placeholder="Full Name"
                  v-model="form.name">
                  <span class="icon is-small is-left">
                    <i class="fa fa-id-card" aria-hidden="true"></i>
                  </span>
                </p>
                <p class="help is-danger" v-if="error.name">
                    {{error.name[0]}}
                </p>
              </div>

              <div class="field">
                <p class="control has-icons-left">
                  <input v-bind:class="{'is-danger': error.email, input: true}" type="email" placeholder="Email"
                  v-model="form.email">
                  <span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                  </span>
                </p>
                <p class="help is-danger" v-if="error.email">
                    {{error.email[0]}}
                </p>
              </div>

              <div class="field">
                <p class="control has-icons-left">
                  <input v-bind:class="{'is-danger': error.password, input: true}" type="password" placeholder="Password"
                  v-model="form.password">
                  <span class="icon is-small is-left">
                    <i class="fa fa-lock"></i>
                  </span>
                </p>
                <p class="help is-danger" v-if="error.password">
                    {{error.password[0]}}
                </p>
              </div>

              <div class="field">
                <p class="control has-icons-left">
                  <input v-bind:class="{'is-danger': error.password_confirmation, input: true}" type="password" placeholder="Password Confirmation"
                  v-model="form.password_confirmation">
                  <span class="icon is-small is-left">
                    <i class="fa fa-lock"></i>
                  </span>
                </p>
                <p class="help is-danger" v-if="error.password_confirmation">
                    {{error.password_confirmation[0]}}
                </p>
              </div>

              <div class="field">
                <p class="control">
                  <button v-bind:class="{'is-loading': isFetching, 'button is-success': true}">
                    Register
                  </button>
                </p>
              </div>

          </form>
      </div>
    </div>
</template>

<script>
import { post } from '../../helpers/api';
import flashMessage from '../../helpers/flashMessage';

export default {
    data () {
        return {
            form: {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
            },
            error: {},
            isFetching: false
        }
    },
    methods: {
      register () {
        this.isFetching = true;
        this.error = {};
        this.form.email = this.form.email.toLowerCase();
        post(`/api/v1/register`, this.form)
            .then((res) => {
                if (res.data.msg === 'registerd') {
                    flashMessage.setSuccess('You have successfuly registered!');
                    this.$router.push('/login');
                } else if (res.data.err) {
                    flashMessage.setError('This user is already registered');
                    this.error.email = [res.data.err];
                }
                this.isFetching = false;
            })
            .catch((err) => {
                if (err) {
                    flashMessage.setError('There was an error while registering You!');
                    this.error = err.response.data;
                }
                this.isFetching = false;
            })
      }
    }
}
</script>
