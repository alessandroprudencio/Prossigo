<template>
  <div>
    <header>
      <app-navbar />
    </header>
    <main>
      <section class="mt-4">
        <transition name="slide-fade" mode="out-in">
          <router-view />
        </transition>
      </section>
    </main>
    <footer>
      <app-footer />
    </footer>
  </div>
</template>

<script>
import AppNavbar from "./layout/navbar";
import AppFooter from "./layout/footer";

export default {
  components: { AppNavbar, AppFooter }
};
</script>

<style lang="scss">
@import "../../sass/app.scss";
</style>