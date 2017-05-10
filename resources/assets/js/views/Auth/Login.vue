<template>
  <div class="container">
      <div class="column is-half is-offset-one-quarter">
          <div class="box">
              <h3 class="title is-3">Login</h3>
             <form @submit.prevent="login">

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
                   <p class="control has-icons-left">
                     <input class="input" type="password" placeholder="Password Confirmation">
                     <span class="icon is-small is-left">
                       <i class="fa fa-lock"></i>
                     </span>
                   </p>
                 </div>

                 <div class="field">
                   <p class="control">
                     <button class="button is-success">
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
export default {
    data () {
        return {
                hello: true
        }
    },
    methods: {
      login () {
        console.log('you logged in');
      }
    }
}
</script>
