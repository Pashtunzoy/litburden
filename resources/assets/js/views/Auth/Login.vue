<template>
  <div class="container">
      <form @submit.prevent="login" class="form-auth">
          <h2 class="form-signin-heading">Please Login</h2>
           <label for="inputEmail" class="sr-only">Email address</label>
           <input
               type="email"
               v-bind:class="{'form-control-danger': error.email, 'form-control': true}"
               id="inputEmail"
               placeholder="Emai"
               v-model="form.email"
               required
               autofocus
           >

           <label for="inputPassword" class="sr-only">Password</label>
           <input
               type="password"
               v-bind:class="{'form-control-danger': error.password, 'form-control': true}"
               id="inputPassword"
               placeholder="Password"
               v-model="form.password"
               required
               autofocus
           >

           <button :class="{'loading': isFetching, 'btn btn-lg btn-primary btn-block': true}" type="submit">Log in</button>

      </form>
  </div>
</template>
<script>
import auth from '../../store/auth';
import flashMessage from '../../helpers/flashMessage';
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
        this.form.email = this.form.email.toLowerCase();
        post(`/api/v1/login`, this.form)
            .then((res) => {
                if (res.data.token) {
                    auth.set(res.data.token, res.data.user_id);
                    flashMessage.setSuccess('You have successfuly logged In!');
                    flashMessage.removeError();
                    this.$router.push('/');
                }
                this.isFetching = false;
            })
            .catch((err) => {
                if (err) {
                    const msg = err.response.data.msg;
                    msg ?
                        flashMessage.setError(msg):
                        flashMessage.setError('Sorry, Something went wrong while loggin In!');
                    flashMessage.removeSuccess();
                    this.error = err.response.data;
                }
                this.isFetching = false;
            })
      }
    }
}
</script>
