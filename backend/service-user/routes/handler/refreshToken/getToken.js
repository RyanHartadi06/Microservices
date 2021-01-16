const {RefreshToken} = require('../../../models');

module.exports = async (req , res) => {
    const Rtoken = req.query.refresh_token;

    const getToken = await RefreshToken.findOne({
        where : {token : Rtoken }
    });

    if(!getToken){
        return res.status(400).json({
            status : 'error',
            message : 'token not found'
        })
    }   

    return res.json({
        status : 'success',
        getToken
    })
}