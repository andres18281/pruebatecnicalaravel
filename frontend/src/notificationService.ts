import { useToast } from 'vue-toastification';

const toast = useToast();

export function showSuccess(message:string) {
  toast.success(message);
}

export function showError(message:string) {
  toast.error(message);
}