<template>
    <a-card title="Tạo mới tài khoản" style="width: 100%;">
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center mb-3">
                        <a-avatar shape="square" :size="200">
                            <template #icon>
                                <UserOutlined />
                            </template>
                        </a-avatar>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <a-button type="primary">
                            <plus-outlined class="" />
                            <span>chọn ảnh</span>
                        </a-button>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-5">
                <div class="row mb-3">
                    <div class="col-12 col-sm-3 text-start text-sm-end">
                        <label for="">
                            <span class="text-danger me-1">*</span>
                            <span>Tình trạng: </span>
                        </label>
                    </div>
                    <div class="col-12 col-sm-9">
                        <a-select show-search placeholder="Lựa chọn tình trạng" style="width: 100%" :options="user_status"
                            :filter-option="filterOption" allow-clear></a-select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-3 text-start text-sm-end">
                        <label for="">
                            <span class="text-danger me-1">*</span>
                            <span>Tên tài khoản: </span>
                        </label>
                    </div>
                    <div class="col-12 col-sm-9">
                        <a-input placeholder="Nhập tên tài khoản" allow-clear />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-3 text-start text-sm-end">
                        <label for="">
                            <span class="text-danger me-1">*</span>
                            <span>Họ và tên: </span>
                        </label>
                    </div>
                    <div class="col-12 col-sm-9">
                        <a-input placeholder="Nhập họ và tên" allow-clear />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-3 text-start text-sm-end">
                        <label for="">
                            <span class="text-danger me-1">*</span>
                            <span>Email: </span>
                        </label>
                    </div>
                    <div class="col-12 col-sm-9">
                        <a-input placeholder="Nhập họ và tên" allow-clear />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-3 text-start text-sm-end">
                        <label for="">
                            <span class="text-danger me-1">*</span>
                            <span>Phòng ban: </span>
                        </label>
                    </div>
                    <div class="col-12 col-sm-9">
                        <a-select show-search placeholder="Lựa chọn phòng ban" style="width: 100%" :options="user_status"
                            :filter-option="filterOption" allow-clear></a-select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-3 text-start text-sm-end">
                        <label for="">
                            <span class="text-danger me-1">*</span>
                            <span>Mật khẩu: </span>
                        </label>
                    </div>
                    <div class="col-12 col-sm-9">
                        <a-input-password placeholder="Nhập mật khẩu" allow-clear />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-sm-3 text-start text-sm-end">
                        <label for="">
                            <span class="text-danger me-1">*</span>
                            <span>Xác thực mật khẩu: </span>
                        </label>
                    </div>
                    <div class="col-12 col-sm-9">
                        <a-input-password placeholder="Nhập mật khẩu xác thực" allow-clear />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-grid d-sm-flex justify-content-sm-end mx-auto">
                <a-button class="me-0 me-sm-2 mb-3 mb-sm-0">
                    <router-link :to="{ name: 'admin-users' }">
                        <span>Hủy</span>
                    </router-link>
                </a-button>
                <a-button type="primary">
                    <span>Lưu</span>
                </a-button>
            </div>
        </div>
    </a-card>
</template>

<script>
import { useStore } from '../../../stores/use-menu';
import { UserOutlined, PlusOutlined } from '@ant-design/icons-vue';
import { defineComponent, ref } from 'vue'
export default defineComponent({
    components: {
        UserOutlined,
        PlusOutlined
    },
    setup() {
        const store = useStore();
        store.onSelectKeys(['admin-users'])

        const user_status = ref([])
        const departments = ref([])
        const getUsersCreate = () => {
            axios.get('http://127.0.0.1:8000/api/users/create')
                .then(function (response) {
                    // xử trí khi thành công
                    user_status.value = response.data.user_status
                    departments.value = response.data.departments
                })
                .catch(function (error) {
                    // xử trí khi bị lỗi
                    console.log(error);
                })
                .finally(function () {
                    // luôn luôn được thực thi
                });
        }
        getUsersCreate();
        const filterOption = (input, option) => {
            return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };
        return {
            user_status, departments, filterOption,
        }
    }

})
</script>

<style lang="scss" scoped></style>