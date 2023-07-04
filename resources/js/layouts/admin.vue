<template>
    <div>
        <TheHeader />
        <div class="container-fuild">
            <div class="row">
                <div class="col-sm-3 d-none d-sm-flex">
                    SIDER BAR
                </div>
                <div class="col-12 col-sm-9">
                    <router-view></router-view>
                </div>
            </div>
        </div>
        Đây là layout Admin
        
    </div>
</template>

<script>
import TheHeader from '../components/TheHeader.vue';
export default {
    components: {
        TheHeader
    }
}
</script>

<style lang="scss" scoped></style>