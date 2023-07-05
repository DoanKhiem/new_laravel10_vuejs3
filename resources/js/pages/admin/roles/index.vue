<template>
    <div>
        day la danh sach roles
    </div>
</template>
<script>
import { useStore } from '../../../stores/use-menu';
    export default {
        setup() {
            const store = useStore();
            store.onSelectKeys(['admin-roles'])
        }
    }
</script>

<style lang="scss" scoped>

</style>