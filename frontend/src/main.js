import { createApp } from 'vue';
import App from './App.vue';

// 1. Importeer de UIkit CSS (deze zorgt voor de styling)
import 'uikit/dist/css/uikit.min.css';

// 2. Importeer de UIkit JS en de Icons (deze zorgt voor de functies en icoontjes)
import UIkit from 'uikit';
import Icons from 'uikit/dist/js/uikit-icons';

// 3. Activeer de icoontjes
UIkit.use(Icons);

const app = createApp(App);
app.mount('#app');
