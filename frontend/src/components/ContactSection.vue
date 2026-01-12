<script setup>
import { ref, onMounted } from 'vue';

const emailImage = ref('');

onMounted(async () => {
  try {
    const response = await fetch('http://localhost/nexus/instellingen/');
    const data = await response.json();

    if (data.email_image) {
      emailImage.value = 'http://localhost' + data.email_image;
    }
  } catch (error) {
    console.error('Fout bij laden contact afbeelding:', error);
  }
});

const handleSubmit = () => {
  console.log('Formulier verzonden');
};
</script>

<template>
  <section
    id="contact"
    class="contact-section uk-position-relative uk-overflow-hidden"
  >
    <div class="contact-bg-wrapper">
      <img
        v-if="emailImage"
        :src="emailImage"
        alt="Contact Background"
        class="contact-bg-img"
      />

      <img
        v-else
        src="../assets/V2_00.JPG"
        alt="Contact Background"
        class="contact-bg-img"
      />

      <div class="contact-overlay"></div>
    </div>

    <div
      class="uk-container uk-container-expand uk-position-relative uk-flex uk-flex-center"
    >
      <div class="contact-card">
        <h2 class="contact-title">
          Neem gerust contact met ons op voor meer informatie.
        </h2>

        <form @submit.prevent="handleSubmit" class="uk-grid-large" uk-grid>
          <div class="uk-width-1-2@m contact-col">
            <label class="input-label">Voornaam *</label>
            <input class="custom-input" type="text" required />
          </div>

          <div class="uk-width-1-2@m contact-col">
            <label class="input-label">Naam *</label>
            <input class="custom-input" type="text" required />
          </div>

          <div class="uk-width-1-2@m contact-col">
            <label class="input-label">E-mail *</label>
            <input class="custom-input" type="email" required />
          </div>

          <div class="uk-width-1-2@m contact-col">
            <label class="input-label">Telefoon *</label>
            <input class="custom-input" type="tel" />
          </div>

          <div class="uk-width-1-1">
            <label class="input-label">Bericht *</label>
            <textarea class="custom-textarea" rows="6" required></textarea>
          </div>

          <div class="uk-width-1-1">
            <button class="submit-btn">Verstuur</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</template>

<style scoped>
.contact-section {
  padding: 80px 0;
  min-height: 500px;
  display: flex;
  align-items: center;
}

.contact-bg-wrapper {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 0;
}

.contact-bg-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.contact-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(241, 228, 211, 0.45);
  mix-blend-mode: multiply;
}

.contact-card {
  background-color: #1e4d3b;
  padding: 60px 80px;
  border-radius: 15px;
  width: 100%;
  max-width: 1100px;
  z-index: 1;
  box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
  box-sizing: border-box;
}

.contact-title {
  color: #f3e3cd;
  font-size: 2.2rem;
  font-weight: 500;
  margin-bottom: 50px;
  letter-spacing: -0.5px;
}

.input-label {
  color: #f3e3cd;
  display: block;
  margin-bottom: 10px;
  font-size: 1rem;
}

.custom-input,
.custom-textarea {
  width: 100%;
  background: transparent;
  border: 1px solid rgba(241, 228, 211, 0.4);
  border-radius: 12px;
  padding: 16px;
  color: #f3e3cd;
  outline: none;
  box-sizing: border-box;
  transition: border-color 0.3s ease;
}

.custom-input:focus,
.custom-textarea:focus {
  border-color: #f3e3cd;
}

.submit-btn {
  background-color: #f3e3cd;
  color: #1e4d3b;
  border: none;
  padding: 15px 50px;
  border-radius: 10px;
  font-size: 24px;
  font-weight: light;
  cursor: pointer;
  transition: all 0.3s ease;
}

.submit-btn:hover {
  background-color: #f3e3cd;
  transform: translateY(-2px);
}

form[uk-grid] {
  margin-left: 0 !important;
  width: 100% !important;
}

form[uk-grid] > * {
  padding-left: 20px !important;
}

@media (max-width: 1200px) {
  .contact-card {
    padding: 40px 50px;
    max-width: 95%;
  }
}

@media (max-width: 959px) {
  .contact-card {
    padding: 30px 20px;
    margin: 0 15px;
  }
  .contact-title {
    font-size: 1.6rem;
    margin-bottom: 30px;
  }

  .contact-col {
    width: 100% !important;
  }
}
</style>
