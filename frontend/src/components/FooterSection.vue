<script setup>
import { ref, onMounted } from 'vue';

const footerLogo = ref('');
const footerEmail = ref('');

onMounted(async () => {
  try {
    const response = await fetch('http://localhost/nexus/instellingen/');
    const data = await response.json();

    if (data.footer_logo) {
      footerLogo.value = `http://localhost${data.footer_logo}`;
    }

    if (data.footer_email) {
      footerEmail.value = data.footer_email;
    }
  } catch (error) {
    console.error('Fout bij laden footer data:', error);
  }
});
</script>

<template>
  <footer class="footer-section">
    <div class="uk-container">
      <div class="footer-content">
        <div class="footer-logo-wrapper">
          <img
            :src="footerLogo"
            alt="Nexus Logo"
            class="footer-logo-img"
            v-if="footerLogo"
          />
        </div>

        <a
          :href="`mailto:${footerEmail}`"
          class="footer-email"
          v-if="footerEmail"
        >
          {{ footerEmail }}
        </a>
      </div>
    </div>
  </footer>
</template>

<style scoped>
.footer-section {
  background-color: #c5c696;
  padding: 60px 0;
  text-align: center;
}

.footer-content {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
}

.footer-logo-wrapper {
  max-width: 250px;
  width: 100%;
}

.footer-logo-img {
  width: 100%;
  height: auto;
  display: block;
}

.footer-email {
  color: #1e4d3b;
  font-size: 1rem;
  text-decoration: none;
  font-weight: 400;
  transition: opacity 0.3s ease;
}

.footer-email:hover {
  opacity: 0.7;
}

@media (max-width: 640px) {
  .footer-section {
    padding: 40px 0;
  }

  .footer-logo-wrapper {
    max-width: 180px;
  }
}
</style>
