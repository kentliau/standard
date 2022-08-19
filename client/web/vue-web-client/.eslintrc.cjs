/* eslint-env node */
require("@rushstack/eslint-patch/modern-module-resolution");

module.exports = {
  root: true,
  extends: [
    // "plugin:vue/vue3-essential",
    // "eslint:recommended",
    // "@vue/eslint-config-typescript/recommended",
    // "@vue/eslint-config-prettier",
    'plugin:vue/vue3-recommended',
  ],
  parserOptions: {
    ecmaVersion: "latest",
  },
  rules: {
    "indent": ["error", 2],
    "linebreak-style": ["error", "unix"],
    "semi": ["error", "always"],
    "vue/no-mutating-props": [0, "always"],
    'vue/no-unused-vars': 'error',
    'vue/no-v-html': [0, 'always'],
    'vue/multi-word-component-names': [0, 'always'],
    'vue/valid-next-tick': [0, 'always']
  },
};
