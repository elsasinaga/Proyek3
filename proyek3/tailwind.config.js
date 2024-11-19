import daisyui from 'daisyui';

export default {
    content: [
        // Path yang akan di-scan oleh Tailwind CSS
        "./resources/**/**/*.{js,blade.php}",
        "./app/View/Components/**/**/*.php",
        "./app/Livewire/**/**/*.php",

        // Path untuk komponen tambahan (misalnya Mary)
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
    ],

    // Tambahkan daisyUI
    plugins: [daisyui],
};

