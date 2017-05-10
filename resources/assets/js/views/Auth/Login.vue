<template>
  <div class="container">
      <div class="column is-half is-offset-one-quarter">
          <div class="box">
              <h3 class="title is-3">Login</h3>
             <form @submit.prevent="login">

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
                   <p class="control">
                     <button v-bind:class="{'is-loading': isFetching, 'button is-success': true}">
                       Login
                     </button>
                   </p>
                 </div>

             </form>
          </div>
      </div>
  </div>
</template>
<script>
import { post } from '../../helpers/api';

export default {
    data () {
        return {
            form: {
                email: '',
                password: ''
            },
            error: {},
            isFetching: false
        }
    },
    methods: {
      login () {
        this.isFetching = true;
        this.error = {};
        post(`/api/v1/login`, this.form)
            .then((res) => {
                if (res.data.token) {
                    this.$router.push('/');
                }
                this.isFetching = false;
            })
            .catch((err) => {
                if (err) {
                    this.error = err.response.data;
                    console.log(err.response.data);
                }
                this.isFetching = false;
            })
      }
    }
}
</script>
