<template>
  <div>Hello</div>
</template>

<script>
export default {
    name: 'AutoLogout',
    data: function() {
        return {
            events: ['click', 'mousemove', 'mousedown', 'scroll', 'keypress', 'load']
        }
    },
    mounted() {
        this.events.forEach(function(event) {
            window.addEventListener(event, this.resetTimer);;
        })
        this.setTimers();
    },
    methods: {
        setTimer: function() {
            this.warningTimer = setTimeout(this.warningMessage, 4 * 1000)
        },
        warningMessage: function() {
            alert('warning');
        },
        resetTimer: function() {
            clearTimeout(this.warningTimer);
            this.setTimers();
        }
    }
}
</script>

<style>

</style>