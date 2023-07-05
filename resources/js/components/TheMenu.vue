<template>
    <a-menu v-model:openKeys="openKeys" v-model:selectedKeys="selectedKeys" mode="inline">
        <a-menu-item key="admin-users">
            <router-link :to="{ name: 'admin-users' }">
                <span class="d-flex align-items-center">
                    <user-outlined class="me-1"/>TÀI KHOẢN
                </span>
            </router-link>
        </a-menu-item>

        <a-menu-item key="admin-roles">
            <router-link :to="{ name: 'admin-roles' }">
                <span class="d-flex align-items-center">
                    <tags-outlined class="me-1"/>
                    VAI TRÒ
                </span>
            </router-link>
        </a-menu-item>

        <a-menu-item key="admin-settings">
            <router-link :to="{ name: 'admin-settings' }">
                <span class="d-flex align-items-center">
                    <setting-outlined class="me-1"/>
                    BẢNG ĐIỀU KHIỂN
                </span>
            </router-link>
        </a-menu-item>
    </a-menu>
</template>
<script>
import { defineComponent, reactive, toRefs, watch } from 'vue';
import { useStore } from "../stores/use-menu"
import { storeToRefs } from 'pinia'
import { UserOutlined, TagsOutlined, SettingOutlined } from '@ant-design/icons-vue';
export default defineComponent({
    components: {
        UserOutlined, TagsOutlined, SettingOutlined
    },
    setup() {
        const store = useStore();
        return {
            ...storeToRefs(store)
        };
    },
});
</script>