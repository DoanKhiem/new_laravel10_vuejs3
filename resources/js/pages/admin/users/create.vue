<template>
    <a-card title="Tạo mới tài khoản" style="width: 100%;">
        <form @submit.prevent="createUser()">
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
                                <span :class="{
                                    'text-danger': errors.status_id
                                }">Tình trạng: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-9">
                            <a-select show-search placeholder="Lựa chọn tình trạng" style="width: 100%"
                                v-model:value="status_id" :class="{
                                    'select-danger': errors.status_id
                                }" :options="user_status" :filter-option="filterOption" allow-clear></a-select>
                            <small v-if="errors.status_id" class="text-danger"> {{ errors.status_id[0] }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label for="">
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.user_name
                                }">Tên tài khoản: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-9">
                            <a-input placeholder="Nhập tên tài khoản" allow-clear v-model:value="user_name" :class="{
                                'select-danger': errors.user_name
                            }" />
                            <small v-if="errors.user_name" class="text-danger"> {{ errors.user_name[0] }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label for="">
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.name
                                }">Họ và tên: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-9">
                            <a-input placeholder="Nhập họ và tên" allow-clear v-model:value="name" :class="{
                                'select-danger': errors.name
                            }" />
                            <small v-if="errors.name" class="text-danger"> {{ errors.name[0] }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label for="">
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.email
                                }"> Email: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-9">
                            <a-input placeholder="Nhập họ và tên" allow-clear v-model:value="email" :class="{
                                'select-danger': errors.email
                            }" />
                            <small v-if="errors.email" class="text-danger"> {{ errors.email[0] }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label for="">
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.department_id
                                }">Phòng ban: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-9">
                            <a-select show-search placeholder="Lựa chọn phòng ban" style="width: 100%"
                                v-model:value="department_id" :options="departments" :filter-option="filterOption"
                                allow-clear :class="{
                                    'select-danger': errors.department_id
                                }"></a-select>
                            <small v-if="errors.department_id" class="text-danger"> {{ errors.department_id[0] }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label for="">
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.password
                                }">Mật khẩu: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-9">
                            <a-input-password placeholder="Nhập mật khẩu" allow-clear v-model:value="password" :class="{
                                'select-danger': errors.password
                            }" />
                            <small v-if="errors.password" class="text-danger"> {{ errors.password[0] }}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-3 text-start text-sm-end">
                            <label for="">
                                <span class="text-danger me-1">*</span>
                                <span :class="{
                                    'text-danger': errors.password_confirmation
                                }"> Xác thực mật khẩu: </span>
                            </label>
                        </div>
                        <div class="col-12 col-sm-9">
                            <a-input-password placeholder="Nhập mật khẩu xác thực" allow-clear
                                v-model:value="password_confirmation" :class="{
                                    'select-danger': errors.password_confirmation
                                }" />
                            <small v-if="errors.password_confirmation" class="text-danger"> {{
                                errors.password_confirmation[0] }}</small>
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
                    <a-button type="primary" html-type="submit">
                        <span>Lưu</span>
                    </a-button>
                </div>
            </div>
        </form>
    </a-card>
</template>

<script>
import { useStore } from '../../../stores/use-menu';
import { UserOutlined, PlusOutlined } from '@ant-design/icons-vue';
import { defineComponent, reactive, ref, toRefs } from 'vue'
import { message } from 'ant-design-vue';
import { useRouter } from 'vue-router';
export default defineComponent({
    components: {
        UserOutlined,
        PlusOutlined
    },
    setup() {
        const router = useRouter()
        const store = useStore();
        store.onSelectKeys(['admin-users'])

        const user_status = ref([])
        const departments = ref([])
        const users = reactive({
            user_name: '',
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            department_id: [],
            status_id: [],
        })
        const errors = ref({})
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
        const createUser = () => {

            axios.post('http://127.0.0.1:8000/api/users/create', users)
                .then(function (response) {
                    // xử trí khi thành công
                    console.log(response);
                    if (response) {
                        message.success('Tao moi thanh cong');
                        router.push({ name: 'admin-users' })
                    }
                    // user_status.value = response.data.user_status
                    // departments.value = response.data.departments
                })
                .catch(function (error) {
                    // xử trí khi bị lỗi
                    console.log(error);
                    errors.value = error.response.data.errors
                })
                .finally(function () {
                    // luôn luôn được thực thi
                });
            // alert('hihih')
        }
        const filterOption = (input, option) => {
            return option.label.toLowerCase().indexOf(input.toLowerCase()) >= 0;
        };
        return {
            user_status, departments, filterOption,
            createUser,
            errors,
            ...toRefs(users),
        }
    }

})
</script>

<style lang="css" scoped>
.select-danger {
    border: 1px solid red;
}
</style>