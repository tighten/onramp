module.exports = {
    purge: [
        './resources/**/*.html',
        './resources/**/*.vue',
        './resources/**/*.js',
        './resources/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                'blue-violet': '#4c50bf',
                'cornflower-blue': '#657eea',
                'east-bay': '#4a5569',
                'havelock-blue': '#5967d8',
                'oxford-blue': '#2e3748',
                'persian-green': '#00acad',
                'comet': '#535f76',
                'regent-grey': '#7b8ba2',
                'off-white': '#f8fbfd',
            },

            flex: {
                'even': '1 1 100%',
            },

            fontFamily: {
                'work-sans': ['Work\\ Sans', 'sans-serif'],
            },

            fontSize: {
                'none': '0',
                'xl': '1.313rem',
                '3xl': '1.625rem',
                '4xl': '2rem',
                '5xl': '3rem',
                '6xl': '3.5rem',
            },

            inset: {
                '1/2': '50%',
            },

            lineHeight: {
                '0': '0',
                'inherit': 'inherit',
            },

            maxHeight: {
                '0': '0',
                '1000': '1000px',
                'none': 'none',
            },

            minWidth: (theme, { breakpoints }) => ({
                'xs': '20rem',
                ...breakpoints(theme('screens')),
            }),

            opacity: {
                '10': '0.10',
                '20': '0.20',
                '30': '0.30',
            },

            scale: {
                '-100': '-1',
            },

            screens: {
                'xs': '320px',
                'sm': '640px',
                'md': '768px',
                'lg': '992px',
                'xl': '1200px',
                'xxl': '1440px',
            },

            spacing: {
                '80': '20rem',
                '1/2': '50%',
                '1/3': '33.333333%',
                '2/3': '66.666667%',
                '1/4': '25%',
                '2/4': '50%',
                '3/4': '75%',
                '1/5': '20%',
                '2/5': '40%',
                '3/5': '60%',
                '4/5': '80%',
                '1/6': '16.666667%',
                '2/6': '33.333333%',
                '3/6': '50%',
                '4/6': '66.666667%',
                '5/6': '83.333333%',
                '1/12': '8.333333%',
                '2/12': '16.666667%',
                '3/12': '25%',
                '4/12': '33.333333%',
                '5/12': '41.666667%',
                '6/12': '50%',
                '7/12': '58.333333%',
                '8/12': '66.666667%',
                '9/12': '75%',
                '10/12': '83.333333%',
                '11/12': '91.666667%',
            },

            transitionProperty: {
                'height': 'height, max-height',
            }
        },
    },
    variants: {
        borderWidth: ['responsive', 'last', 'first'],
        margin: ['responsive', 'last', 'first'],
        padding: ['responsive', 'last', 'first'],
        backgroundColor: ['responsive', 'hover', 'focus', 'active'],
        borderColor: ['responsive', 'hover', 'focus', 'active'],
        textColor: ['responsive', 'hover', 'focus', 'active'],
    },
    plugins: [],
};
