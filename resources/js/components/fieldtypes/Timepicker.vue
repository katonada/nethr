<template>
    <vue-timepicker
        v-model="time"
        :format="'HH:mm'"
        :minute-interval="15"
        :hour-range="[0, 23]"
        @input="updateTime"
    />
</template>

<script>
import VueTimepicker from "vue2-timepicker";
import "vue2-timepicker/dist/VueTimepicker.css";

export default {
    components: {
        VueTimepicker,
    },
    props: {
        value: String,
        meta: Object,
    },
    data() {
        return {
            time: this.value || this.meta.default_time,
        };
    },
    methods: {
        updateTime(value) {
            this.$emit("input", value); // Sync with Statamic backend
        },
    },
};
</script>
