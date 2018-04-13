require('vee-validate');
const ko = require('vee-validate/dist/locale/ko');
Vue.use(require('vee-validate'), {
  locale: 'ko',
  dictionary: {
    ko: { messages: ko.messages }
  },
  events: 'blur',
});
