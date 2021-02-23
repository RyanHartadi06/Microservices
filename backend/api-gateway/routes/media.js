var express = require("express");
var router = express.Router();

const mediaHandler = require("./handler/media");
const verifyToken = require("../middlewares/verifyToken");

router.post("/", mediaHandler.create);
router.get("/", verifyToken, mediaHandler.getAll);
router.delete("/:id", mediaHandler.destroy);

module.exports = router;
