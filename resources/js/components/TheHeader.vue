<template>
    <div class="container-fuild">
        <div class="row p-2" style="background-color: #0c713d;">
            <div class="col-1 d-flex d-sm-none align-items-center justify-content-center">
                <span @click="showDrawer">
                    <menu-outlined :style="{ color: 'white', fontSize: '25px', marginLeft: '10px'}"/>
                </span>
            </div>
            <div class="col-10 col-sm-9 d-flex align-items-center justify-content-center justify-content-sm-start">
                <img src="../../../public/assets/logo.png" alt="Logo" height="50">
                <span class="d-none d-sm-flex">QUẢN TRỊ</span>
            </div>
            <div class="col-sm-3 d-none d-sm-flex align-items-center justify-content-sm-end">
                <span>ADMIN</span>
            </div>
            <div class="col-1 d-flex d-sm-none align-items-center justify-content-center">
                <span @click="showDrawerUser">
                    <user-outlined :style="{ color: 'white', fontSize: '25px', marginRight: '10px'}"/>
                </span>
            </div>
        </div>
    </div>
    <a-drawer v-model:visible="visible" class="custom-class" style="color: red" title="danh mục" placement="left">
        <TheMenu/>
    </a-drawer>
    <a-drawer v-model:visible="visibleUser" class="custom-class" style="color: red" title="admin" placement="right">
        <p>Some contents...</p>
        <p>Some contents...</p>
        <p>Some contents...</p>
    </a-drawer>
</template>

<script>
import TheMenu from './TheMenu.vue';
import { defineComponent, ref } from 'vue';
import { MenuOutlined, UserOutlined } from '@ant-design/icons-vue';
export default defineComponent({
    components: {
        TheMenu,
        MenuOutlined,
        UserOutlined,
    },
    setup() {
        const visible = ref(false);
        const visibleUser = ref(false);

        const showDrawer = () => {
            visible.value = true;
        };
        const showDrawerUser = () => {
            visibleUser.value = true;
        };

        return {
            visible,
            showDrawer,
            visibleUser, showDrawerUser
        };
    },
});
</script>

<style lang="scss" scoped></style>