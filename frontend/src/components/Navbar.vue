<script setup>
import { ref, onMounted } from 'vue';

const logoUrl = ref('');
const menuItems = ref([]);

onMounted(async () => {
  try {
    const response = await fetch('http://localhost/nexus/instellingen/');
    const data = await response.json();

    if (data.logo) {
      logoUrl.value = `http://localhost${data.logo}`;
    }

    menuItems.value = data.menu;
  } catch (error) {
    console.error('Fout bij ophalen CMS data:', error);
  }
});
</script>

<template>
  <div
    uk-sticky="sel-target: .nexus-nav; cls-active: uk-navbar-sticky; show-on-up: false"
  >
    <nav class="uk-navbar-container nexus-nav" uk-navbar>
      <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo logo-container" href="#home" uk-scroll>
          <img v-if="logoUrl" :src="logoUrl" alt="Nexus" class="logo-img" />
          <span v-else style="color: #c6c691">NEXUS</span>
        </a>
      </div>

      <div class="uk-navbar-right uk-visible@m">
        <ul
          class="uk-navbar-nav nav-links-container"
          uk-scrollspy-nav="closest: li; scroll: true; offset: 100"
        >
          <li v-for="item in menuItems" :key="item.label">
            <a :href="'#' + item.label.toLowerCase()">{{ item.label }}</a>
          </li>
        </ul>
      </div>

      <div class="uk-navbar-right uk-hidden@m">
        <a
          class="uk-navbar-toggle hamburger-icon"
          uk-navbar-toggle-icon
          uk-toggle="target: #offcanvas-usage"
        ></a>
      </div>
    </nav>
  </div>

  <div id="offcanvas-usage" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar mobile-menu-bar">
      <button class="uk-offcanvas-close" type="button" uk-close></button>
      <ul
        class="uk-nav uk-nav-default"
        uk-scrollspy-nav="closest: li; scroll: true"
      >
        <li class="uk-nav-header" style="color: #f6e3cd; margin-bottom: 20px">
          Menu
        </li>
        <li v-for="item in menuItems" :key="'mob-' + item.label">
          <a
            :href="'#' + item.label.toLowerCase()"
            uk-toggle="target: #offcanvas-usage"
          >
            {{ item.label }}
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<style scoped>
.nexus-nav {
  background-color: #244e3a !important;
  height: 80px;
  padding: 0 140px;
  display: flex;
  align-items: center;
  transition: all 0.3s ease;
}

.uk-navbar-nav > li > a {
  color: #c6c691 !important;
  font-family: 'Poppins', sans-serif;
  text-transform: capitalize;
  font-weight: 400;
  font-size: 16px;
  padding: 0 15px;
  transition: all 0.3s ease;
  opacity: 0.7;
}

.uk-navbar-nav > li > a:hover {
  transform: translateY(-2px);
  opacity: 1;
}

.uk-navbar-nav > li.uk-active > a {
  color: #f3e3cd !important;
  opacity: 1;
  font-weight: 600;
}

.logo-img {
  height: 35px;
  width: auto;
}
.hamburger-icon {
  color: #c6c691 !important;
}
.mobile-menu-bar {
  background-color: #244e3a;
}

:global(section) {
  scroll-margin-top: 80px;
}

.mobile-menu-bar .uk-nav-default > li.uk-active > a {
  color: #f6e3cd !important;
  font-weight: bold;
}

@media (max-width: 959px) {
  .nexus-nav {
    padding: 0 15px;
    height: 70px;
  }
  .logo-img {
    height: 25px;
  }
}

[uk-sticky].uk-active {
  z-index: 1010;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}
</style>
