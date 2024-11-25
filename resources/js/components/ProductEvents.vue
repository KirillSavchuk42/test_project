<template>
    <div>
        <h1>Product Events</h1>
        <ul>
            <li v-for="event in events" :key="event.id">
                {{ event.action }}: {{ event.product.name }}
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            events: [],
        };
    },
    mounted() {
        window.Echo.channel('products')
            .listen('.product.event', (event) => {
                this.events.push({
                    id: Date.now(),
                    action: event.action,
                    product: event.product,
                });
            });
    },
};
</script>

<style scoped>
h1 {
    font-size: 24px;
    margin-bottom: 16px;
}
ul {
    list-style: none;
    padding: 0;
}
li {
    margin-bottom: 8px;
}
</style>
