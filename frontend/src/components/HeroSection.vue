<script setup>
import { ref, onMounted } from 'vue';

const title = ref('');
const description = ref('');
const backgroundImage = ref('');

onMounted(async () => {
  try {
    const response = await fetch('http://localhost/nexus/instellingen/');
    const data = await response.json();

    title.value = data.hero_title;
    description.value = data.hero_desc;
    if (data.hero_img) {
      backgroundImage.value = `http://localhost${data.hero_img}`;
    }
  } catch (error) {
    console.error('Fout bij laden hero data:', error);
  }
});
</script>

<template>
  <section
    class="hero-banner uk-inline uk-width-1-1"
    :style="
      backgroundImage
        ? { backgroundImage: `url(${backgroundImage})` }
        : { backgroundColor: '#244e3a' }
    "
  >
    <div class="hero-frame">
      <div class="hero-content">
        <h1
          class="hero-title"
          uk-scrollspy="cls: uk-animation-slide-bottom-small; delay: 300"
        >
          {{ title }}
        </h1>

        <p
          class="hero-text"
          v-if="description"
          uk-scrollspy="cls: uk-animation-fade; delay: 700"
        >
          {{ description }}
        </p>
      </div>

      <a
        href="#home"
        class="scroll-down-btn float-btn"
        uk-scroll
        uk-scrollspy="cls: uk-animation-scale-up; delay: 1000"
      >
        <span uk-icon="icon: chevron-down; ratio: 1.2"></span>
      </a>
    </div>
  </section>
</template>

<style scoped>
.hero-banner {
  height: 70vh;
  min-height: 500px;

  background-size: cover;
  background-position: center 90%;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;

  animation: bg-zoom 1.5s ease-out;
}

@keyframes bg-zoom {
  from {
    transform: scale(1.1);
  }
  to {
    transform: scale(1);
  }
}

.hero-frame {
  border: 2px solid rgba(198, 198, 145, 0.8);
  width: 95%;
  height: 90%;
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  padding: 40px;
  box-sizing: border-box;
}

.hero-title {
  color: #ffffff;
  font-family: 'Poppins', sans-serif;
  font-weight: 700;
  font-size: clamp(45px, 8vw, 90px);
  line-height: 0.85;
  margin: 0;
}

.hero-text {
  color: #ffffff;
  font-family: 'Poppins', sans-serif;
  font-weight: 300;
  font-size: clamp(14px, 2vw, 18px);
  line-height: 1.4;
  margin: 10px 0 0 0;
  max-width: 450px;
  text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.8);
}

.scroll-down-btn {
  position: absolute;
  bottom: 20px;
  right: 20px;
  background-color: #c6c691;
  color: #244e3a;
  width: 50px;
  height: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 4px;
  transition: 0.3s;
}

.float-btn {
  animation: bounce 2s infinite;
}

@keyframes bounce {
  0%,
  100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
}

.scroll-down-btn:hover {
  background-color: #f3e3cd;
  transform: scale(1.1);
}

@media (max-width: 960px) {
  .hero-frame {
    padding: 20px;
  }
  .scroll-down-btn {
    width: 40px;
    height: 40px;
    bottom: 10px;
    right: 10px;
  }
}
</style>
