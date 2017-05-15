<template>
    <div class="container">
        <form @submit.prevent="register" class="form-auth">
            <h2 class="form-signin-heading">Please Register</h2>
            <label for="inputName" class="sr-only">Full Name</label>
            <input
                type="text"
                v-bind:class="{'form-control-danger': error.name, 'form-control': true}"
                id="inputName"
                placeholder="Full Name"
                v-model="form.name"
                required
                autofocus
            >

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

             <label for="inputPassword_confrimation" class="sr-only">Password</label>
             <input
                 type="password"
                 v-bind:class="{'form-control-danger': error.password_confirmation, 'form-control': true}"
                 id="inputPassword_confrimation"
                 placeholder="Password"
                 v-model="form.password_confirmation"
                 required
                 autofocus
             >

             <button :class="{'loading': isFetching, 'btn btn-lg btn-primary btn-block': true}" type="submit">Register</button>

        </form>
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
