<template>
    <nav>
        <ul class="pagination mt-2">
            <li class="page-item" v-for="(link, index) in props.data.links" :key="index" :disabled="!link.url">

                <a class="page-link" v-html="link.label" href="#" @click="$emit('goForPage',link)"
                    :class="[link.active ? 'active' : '']"></a>
            </li>
        </ul>
        <!-- {{props.data.links}} -->
    </nav>
</template>

<script setup>
const props = defineProps({
    data: {
        type: Object,
        required: true
    },

})

defineEmits(['goForPage'])
</script>