<script>
import Navbar from './components/Navbar.vue';
import HeroSection from './components/HeroSection.vue';
import HomeSection from './components/HomeSection.vue';
import ServicesSection from './components/ServicesSection.vue';
import LocatieSection from './components/LocatieSection.vue';
import GallerySection from './components/GallerySection.vue';
import ContactSection from './components/ContactSection.vue';
import FooterSection from './components/FooterSection.vue';
export default {
  components: {
    Navbar,
    HeroSection, // Registreren
    HomeSection,
    ServicesSection,
    LocatieSection,
    GallerySection,
    ContactSection,
    FooterSection,
  },
};
</script>

<template>
  <div id="app">
    <Navbar />
    <HeroSection />
    <HomeSection />
    <ServicesSection />
    <LocatieSection />
    <GallerySection />
    <ContactSection />
    <FooterSection />
  </div>
</template>

<style>
body,
html {
  margin: 0;
  padding: 0;
  width: 100%;
  background-color: #f3e3cd;
}

#app {
  width: 100%;
  min-height: 100vh;
}
</style>
