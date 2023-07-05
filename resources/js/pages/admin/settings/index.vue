<template>
    <div>
        day la danh sach setting
    </div>
</template>

<script>
import { useStore } from '../../../stores/use-menu';
    export default {
        setup() {
            const store = useStore();
            store.onSelectKeys(['admin-settings'])
        }
    }
</script>

<style lang="scss" scoped>

</style>