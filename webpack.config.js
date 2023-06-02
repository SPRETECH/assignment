const path = require('path');

module.exports = {
    entry: './react/src/App.js',
    output: {
        path: path.resolve(__dirname, 'public/js'),
        filename: 'main.js'
    },
    module: {
        rules: [
            {
                exclude: /node_modules/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-react'],
                    }
                }
            }
        ]
    },
    mode: 'development'
}