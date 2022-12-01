const HtmlWebPackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CopyPlugin = require("copy-webpack-plugin");
const path = require('path');
const filesHTML = [
    {
        filename: 'index.html',
        chunks: ['index']
    }, 
    {   
        filename: './html/interfazHumano.html',
        chunks: ['interfazHumano']
    },
    {   
        filename: './html/interfazDios.html',
        chunks: ['interfazDios']
    },
    {
        filename: './html/crearPruebas.html',
        chunks: ['crearPruebas']
    }
]



module.exports = {
    mode: 'development',
    devServer: {
        historyApiFallback: true,
        allowedHosts: 'all',
        static: {
            directory: path.join(__dirname, '/')
        },
        hot: true,
        open:true
    },
    output: {
        clean: true
    },
    module: {
        rules: [
            {
                test: /\.html$/,
                loader: 'html-loader',
                options: {
                    sources: false
                }
            },       
            {
                test: /\.(c|sc|sa)ss$/,
                use: [ MiniCssExtractPlugin.loader, 
                    'css-loader',
                    'sass-loader',
                    {
                        loader: 'postcss-loader',
                        options: {
                            postcssOptions: {
                                plugins: () => {
                                    require('autoprefixer')
                                }
                            }
                        }
                    }
                ]
            },
            {
                test: /\.(png|jpe?g|gif)$/,
                loader: 'file-loader'
            }
        ]
    },
    entry: {
        index: './src/index.js',
        interfazHumano: './src/js/initInterfaces/interfazHumano.js',
        interfazDios: './src/js/initInterfaces/interfazDios.js',
        crearPruebas: './src/js/initInterfaces/crearPruebas.js'
    },
    optimization: {},
    plugins: [
        new MiniCssExtractPlugin({
            filename: '[name].css',
            ignoreOrder: false
        }),
        new CopyPlugin({
            patterns: [
                {from: 'src/assets/', to: 'assets/'},
                {from: 'src/html/*', to: 'html/[name].[ext]'}
            ]
        })
    ].concat(filesHTML.map((templateFile) => new HtmlWebPackPlugin({
        filename: templateFile.filename,
        template: './src/'+templateFile.filename,
        chunks: templateFile.chunks,
        inject: (templateFile.chunks.length==0) ? false: true
    })))
};