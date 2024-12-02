import { reactive } from "vue";

interface Toast {
    key: symbol;
    message: string;
    type?: string;
}

interface ToastStore {
    items: Toast[];
    add(toast: Omit<Toast, "key">): void;
    remove(index: number): void;
}

export default reactive<ToastStore>({
    items: [],
    add(toast) {
        this.items.unshift({
            key: Symbol(),
            ...toast,
        });
    },
    remove(index) {
        this.items.splice(index, 1);
    },
});
