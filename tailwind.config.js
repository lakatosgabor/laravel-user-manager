import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/* @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/protonemedia/laravel-splade/resources/views/**/*.blade.php",
        "./vendor/protonemedia/laravel-splade/lib/**/*.vue",
        "./resources/views/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/scripts/**/*.vue",
    ],

    theme: {
        extend: {},
    },

    plugins: [forms, typography, require("daisyui"), require('@tailwindcss/forms')],

    // daisyUI config (optional - here are the default values)
    daisyui: {
        themes: ["dark", "light"], // true: all themes | false: only light + dark | array: specific themes like this ["light", "dark", "cupcake"]
        darkTheme: "dark", // name of one of the included themes for dark mode
        base: true, // applies background color and foreground color for root element by default
        styled: true, // include daisyUI colors and design decisions for all components
        utils: true, // adds responsive and modifier utility classes
        rtl: false, // rotate style direction from left-to-right to right-to-left. You also need to add dir="rtl" to your html tag and install `tailwindcss-flip` plugin for Tailwind CSS.
        prefix: "", // prefix for daisyUI classnames (components, modifiers and responsive class names. Not colors)
        logs: false, // Shows info about daisyUI version and used config in the console when building your CSS
    },

};
