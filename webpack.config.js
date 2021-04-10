const path = require("path")

module.exports = {
  entry: {
    app: "./js/app.js",
    index : "./js/index.js",
  },
  output: {
    filename: "[name].js",
    path: path.resolve(__dirname, "handler/dist")
  }
}
