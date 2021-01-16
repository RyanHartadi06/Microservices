const { User , RefreshToken } = require('../../../models');

module.exports = async (req , res) => {

    const userId = req.body.user_id;

    const checkUser = await User.findByPk(userId);

    if(!checkUser) {
        return res.status(400).json({
            status : 'error',
            message : 'invalid user'
        });
    }

    await RefreshToken.destroy({
        where : {user_id : userId}
    });

    return res.json({
        status : 'success',
        message : 'refresh token deleted'
    })
}