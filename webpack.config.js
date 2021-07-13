const path = require('path');

module.exports = {
    mode: 'production',
    watch: true,
    entry: './resources/js/app.js',
    output: {
        filename: 'app.js',
        path: path.resolve(__dirname, 'public/assets')
    },
    devServer: {
        contentBase: './dist',
    },
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/i,
                use: [
                    // Creates `style` nodes from JS strings
                    'style-loader',
                    // Translates CSS into CommonJS
                    'css-loader',
                    // Compiles Sass to CSS
                    'sass-loader',
                    {
                        loader: 'postcss-loader',
                        options: {
                            postcssOptions: {
                                ident: 'postcss',
                                plugins: [
                                    require('tailwindcss'),
                                    require('autoprefixer'),
                                ],
                            },
                        }
                    },
                ],
            },
        ],
    }
};
