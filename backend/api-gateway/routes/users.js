var express = require('express');
var router = express.Router();
const {APP_NAME} = process.env;
/* GET users listing. */

const userHandler = require('./handler/users')
const verifyToken = require('../middlewares/verifyToken');

router.post('/register', userHandler.register);
router.post('/login', userHandler.login);
router.put('/',verifyToken, userHandler.update);

module.exports = router;
