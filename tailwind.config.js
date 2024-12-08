import daisyui from 'daisyui';

export default {
    content: [
        // Tambahkan jalur file yang ingin kamu masukkan
        "./resources/**/**/*.{js,blade.php}",
        "./app/View/Components/**/**/*.php",
        "./app/Livewire/**/**/*.php",

        // Tambahkan jalur untuk mary
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
    ],

    // Tambahkan plugin daisyUI
    plugins: [daisyui],
};
