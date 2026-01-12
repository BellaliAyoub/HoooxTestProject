<script setup>
import { ref, onMounted } from 'vue';

const homeTitle = ref('');
const homeDesc = ref('');
const homeImage = ref('');
const homeSubtitle = ref('');

onMounted(async () => {
  try {
    const response = await fetch('http://localhost/nexus/instellingen/');
    const data = await response.json();

    homeTitle.value = data.home_title;
    homeDesc.value = data.home_desc;
    homeSubtitle.value = data.home_subtitle;

    if (data.home_img) {
      homeImage.value = `http://localhost${data.home_img}`;
    }
  } catch (error) {
    console.error('Fout bij laden home data:', error);
  }
});
</script>

<template>
  <section id="home" class="home-section uk-section">
    <div class="uk-container uk-container-expand section-container">
      <div class="uk-grid-large uk-flex-middle" uk-grid>
        <div class="uk-width-3-5@m uk-flex-last@m">
          <div class="image-wrapper">
            <img
              v-if="homeImage"
              :src="homeImage"
              alt="Nexus Gebouw"
              class="home-image"
            />
            <img
              v-else
              src="../assets/V2_00.jpg"
              alt="Nexus Gebouw"
              class="home-image"
            />
          </div>
        </div>

        <div class="uk-width-2-5@m content-padding">
          <h3 class="section-subtitle">
            <span class="nexus-highlight">NEXUS:</span> {{ homeTitle }}
          </h3>
          <p class="section-description">
            {{ homeDesc }}
          </p>
          <a href="#" class="uk-button nexus-button">Meer over Nexus</a>
        </div>
      </div>

      <div class="uk-text-center bottom-title-wrapper">
        <h2 class="bottom-title">{{ homeSubtitle }}</h2>
      </div>
    </div>
  </section>
</template>

<style scoped>
.home-section {
  background: linear-gradient(180deg, #f6e3cd 0%, #c6c691 100%);
  padding: 80px 5% 120px 5%;
  overflow-x: hidden;
}

.nexus-highlight {
  text-transform: uppercase;
  font-size: 1em;
  font-weight: 700;
  display: block;
}

.section-subtitle {
  font-family: 'Poppins', sans-serif;
  color: #244e3a;
  line-height: 1.1;
  font-size: clamp(32px, 8vw, 48px);
  margin-bottom: 20px;
  word-wrap: break-word;
  overflow-wrap: break-word;
  font-weight: medium;
}

.section-description {
  font-family: 'Poppins', sans-serif;
  color: #244e3a;
  font-weight: 300;
  font-size: clamp(18px, 4vw, 16px);
  line-height: 1.4;
  margin: 25px 0;
}

.nexus-button {
  background-color: #244e3a;
  color: #c6c691;
  text-transform: none;
  font-weight: thin;
  font-size: 24px;
  padding: 12px 35px;
  border-radius: 8px;
}

.image-wrapper {
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.home-image {
  width: 100%;
  display: block;
}

.bottom-title-wrapper {
  margin-top: 150px;
}

.bottom-title {
  font-family: 'Poppins', sans-serif;
  font-weight: 700;
  color: #244e3a;
  font-size: clamp(28px, 5vw, 48px);
}

@media (max-width: 1200px) {
  .home-section {
    padding-top: 40px;
  }
  .content-padding {
    padding-right: 0;
    margin-top: 40px;
  }
  .nexus-highlight {
    font-size: 36px;
  }
  .section-description {
    font-size: 18px;
  }
  .bottom-title-wrapper {
    margin-top: 80px;
  }
  .section-subtitle {
    text-align: left;
    max-width: 100%;
  }
}
</style>
