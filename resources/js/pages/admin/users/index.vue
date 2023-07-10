<template>
    <a-card title="Danh sách user" style="width: 100%">
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-end">
                <a-button type="primary">
                    <router-link :to="{ name: 'admin-user-create'}">
                        <plus-outlined />
                    </router-link>
                </a-button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a-table :dataSource="users" :columns="columns" :scroll="{ x: 576 }">
                    <template #bodyCell="{ column, index, record }">
                        <template v-if="column.key === 'index'">
                            <span>{{ index + 1 }}</span>
                        </template>
                        <template v-if="column.key === 'status_id'">
                            <span v-if="record.status_id == 1" class="text-primary">{{ record.name_status }}</span>
                            <span v-if="record.status_id == 2" class="text-danger">{{ record.name_status }}</span>
                        </template>
                    </template>
                </a-table>
            </div>
        </div>
    </a-card>
</template>

<script>
import { defineComponent, ref } from 'vue'
import { useStore } from '../../../stores/use-menu';
import { PlusOutlined } from '@ant-design/icons-vue';
export default defineComponent({
    components: {
        PlusOutlined,
    },
    setup() {
        const store = useStore();
        store.onSelectKeys(['admin-users'])
        const users = ref([])
        const columns = [
            {
                title: 'STT',
                key: 'index',
            },
            {
                title: 'Avatar',
                key: 'avatar',
            },
            {
                title: 'Tài khoản',
                dataIndex: 'user_name',
                key: 'user_name',
            },
            {
                title: 'Họ và tên',
                dataIndex: 'name',
                key: 'name',
            },
            {
                title: 'Phòng ban',
                dataIndex: 'name_department',
                key: 'name_department',
            },
            {
                title: 'Vai trò',
                dataIndex: 'roles',
                key: 'roles',
            },
            {
                title: 'Trạng thái',
                dataIndex: 'status_id',
                key: 'status_id',
            },
            {
                title: 'Công cụ',
                key: 'action',
                fixed: 'right'
            },
        ]
        const getUsers = () => {
            axios.get('http://127.0.0.1:8000/api/users')
                .then(function (response) {
                    // xử trí khi thành công
                    console.log(response);
                    users.value = response.data
                })
                .catch(function (error) {
                    // xử trí khi bị lỗi
                    console.log(error);
                })
                .finally(function () {
                    // luôn luôn được thực thi
                });
        }
        getUsers();
        return {
            users, columns,
        }
    }
});
</script>

<style lang="scss" scoped></style>