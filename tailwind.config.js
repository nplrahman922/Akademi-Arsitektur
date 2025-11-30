/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'system-ui', 'sans-serif'],
                serif: ['Merriweather', 'serif'],
                heading: ['Poppins', 'sans-serif'],
                custom: ['YourCustomFont', 'sans-serif'],
                'alan-sans': ['Alan Sans', 'sans-serif'],
                'suse-mono': ['SUSE Mono', 'monospace'],
                'red-hat-mono': ['Red Hat Mono', 'monospace'],
                'grenze': ['Grenze Gotisch', 'sans-serif'],
                'Monoton': ['Monoton', 'sans-serif'],
                'Major-Mono-Display': ['Major Mono Display', 'monospace'],
                'annie': ['"Annie Use Your Telescope"', 'cursive'],
            },
        },
    },
    plugins: [],
}
