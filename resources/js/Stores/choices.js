import { defineStore } from "pinia";
import { ref } from "vue";

export const useChoicesStore = defineStore('choices', () => {
    const choices = ref([]);

    const setChoices = (currentChoices) => {
        choices.value = currentChoices;
    }

    const $reset = () => {
        choices.value = [];
    }

    return { choices, setChoices, $reset }
});