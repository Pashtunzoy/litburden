<template>
  <div class="container">
      <div class="column is-half is-offset-one-quarter">
          <div class="box">
              <h3 class="title is-3">Create An Account</h3>
              <form @submit.prevent="register">

                  <div class="field">
                    <p class="control has-icons-left">
                      <input class="input" type="text" placeholder="Full Name">
                      <span class="icon is-small is-left">
                        <i class="fa fa-id-card" aria-hidden="true"></i>
                      </span>
                    </p>
                  </div>

                  <div class="field">
                    <p class="control has-icons-left">
                      <input class="input" type="email" placeholder="Email">
                      <span class="icon is-small is-left">
                        <i class="fa fa-envelope"></i>
                      </span>
                    </p>
                  </div>

                  <div class="field">
                    <p class="control has-icons-left">
                      <input class="input" type="password" placeholder="Password">
                      <span class="icon is-small is-left">
                        <i class="fa fa-lock"></i>
                      </span>
                    </p>
                  </div>

                  <div class="field">
                    <p class="control">
                      <button class="button is-success">
                        Register
                      </button>
                    </p>
                  </div>

              </form>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    data () {
        return {
                hello: true
        }
    },
    methods: {
      register () {
        console.log('you registered!');
      }
    }
}
</script>
