<template>
    <a-menu v-model:openKeys="openKeys" v-model:selectedKeys="selectedKeys" mode="inline">
        <a-menu-item key="admin-users">
            <router-link :to="{ name: 'admin-users' }">
                <span>TÀI KHOẢN</span>
            </router-link>
        </a-menu-item>

        <a-menu-item key="admin-roles">
            <router-link :to="{ name: 'admin-roles' }">
                <span>VAI TRÒ</span>
            </router-link>
        </a-menu-item>

        <a-menu-item key="admin-settings">
            <router-link :to="{ name: 'admin-settings' }">
                <span>BẢNG ĐIỀU KHIỂN</span>
            </router-link>
        </a-menu-item>
    </a-menu>
</template>
<script>
import { defineComponent, reactive, toRefs, watch } from 'vue';
import { useStore } from "../stores/use-menu"
import { storeToRefs } from 'pinia'
export default defineComponent({
    components: {
    },
    setup() {
        const store = useStore();
        return {
            ...storeToRefs(store)
        };
    },
});
</script>