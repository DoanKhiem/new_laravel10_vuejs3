import { defineStore } from 'pinia'

export const useStore = defineStore('menuId', {
  // arrow function recommended for full type inference
  state: () => {
    return {
        selectedKeys: ['admin-users'],
        openKeys: [],
    }
  },
  actions: {
    onSelectKeys(data) {
        this.selectedKeys = data;
    },
    onOpenKeys(data) {
        this.openKeys = data;
    }
  }
})