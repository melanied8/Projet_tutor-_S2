const path = require("path")

module.exports = {
  entry: {
    app: "./js/app.js",
    index : "./js/index.js",
    sidebarList : "./js/sidebarList.js",
    task : "./js/task.js",
  },
  output: {
    filename: "[name].js",
    path: path.resolve(__dirname, "handler/dist")
  }
}
