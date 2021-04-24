const path = require("path")

module.exports = {
  entry: {
    sidebarList : "./js/sidebarList.js",
    task : "./js/task.js",
  },
  output: {
    filename: "[name].js",
    path: path.resolve(__dirname, "handler/dist")
  }
}
