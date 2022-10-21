const plugin = require("tailwindcss/plugin");

module.exports = {
    mode: "jit",
    purge: [
        "./resources/**/*.html",
        "./resources/**/*.vue",
        "./resources/**/*.js",
        "./resources/**/*.blade.php"
    ],
    theme: {
        extend: {
            colors: {
                "gray-black": "#1A202C",
                "blue-black": "#050220",
                "red-black": "#30011F",
                "true-black": "#000000",
                white: "#ffffff",
                transparent: "transparent",
                current: "currentColor",
                steel: "#4A5569",
                gray: "#718096",
                silver: "#A0AEC0",
                mint: "#4FD1C5",
                teal: "#319795",
                emerald: "#096866",
                violet: "#657EEA",
                purple: "#5B55CC",
                cabernet: "#97266D",
                merlot: "#702459",
                sea: "#4C50BF",
                lake: "#657EEA",
            },

            container: {
                center: true,
                padding: {
                    DEFAULT: '1rem',
                    md: '1.5rem',
                    lg: '2rem',
                    xl: '2.5rem',
                },
            },

            flex: {
                even: "1 1 100%"
            },

            fontFamily: {
                "work-sans": ["Work\\ Sans", "sans-serif"]
            },

            inset: {
                "1/2": "50%"
            },

            lineHeight: {
                "0": "0",
                inherit: "inherit"
            },

            maxHeight: {
                "0": "0",
                "1000": "1000px",
                none: "none"
            },

            minWidth: (theme, { breakpoints }) => ({
                xs: "20rem",
                ...breakpoints(theme("screens"))
            }),

            opacity: {
                "10": "0.10",
                "20": "0.20",
                "30": "0.30"
            },

            scale: {
                "-100": "-1"
            },

            screens: {
                xs: "345px",
                sm: "640px",
                md: "768px",
                lg: "992px",
                xl: "1200px",
                "2xl": "1440px"
            },

            transitionProperty: {
                height: "height, max-height"
            }
        }
    },

    plugins: [
        plugin(({ addUtilities }) => {
            const newUtilities = {
                ".absolute-center": {
                    top: "50%",
                    left: "50%",
                    transform: "translate(-50%, -50%)"
                },
                ".absolute-y-center": {
                    top: "50%",
                    transform: "translateY(-50%)"
                },
                ".absolute-x-center": {
                    left: "50%",
                    transform: "translatex(-50%)"
                },
                ".h1": {
                    fontSize: "72px",
                    lineHeight: "75px"
                },
                ".h2": {
                    fontSize: "50px",
                    lineHeight: "48px"
                },
                ".h3": {
                    fontSize: "45px",
                    lineHeight: "40px"
                },
                ".h4": {
                    fontSize: "36px",
                    lineHeight: "40px"
                },
                ".h5": {
                    fontSize: "27px",
                    lineHeight: "32px"
                },
                ".text-body": {
                    fontSize: "21px",
                    lineHeight: "30px"
                }
            };
            addUtilities(newUtilities);
        })
    ]
};
